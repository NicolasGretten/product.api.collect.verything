<?php

namespace App\Http\Controllers;

use App\Jobs\AddToCartJob;
use App\Jobs\ProductImageJob;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Traits\FiltersTrait;
use App\Traits\IdTrait;
use App\Traits\LocaleTrait;
use App\Traits\PaginationTrait;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use InvalidArgumentException;
use OpenApi\Annotations as OA;
use PDOException;

class ProductController extends Controller
{
    /**
     * @OA\Info(title="Products API Collect&Verything", version="0.1")
     */
    use IdTrait, FiltersTrait, PaginationTrait, LocaleTrait;

    /**
     * @OA\Get(
     *      path="/api/products/{id}",
     *      operationId="retrieve",
     *      tags={"Products"},
     *      summary="Get product information",
     *      description="Returns product data",
     *      @OA\Parameter(name="locale",description="Locale", required=false, in="query"),
     *      @OA\Parameter(name="id",description="Product id", required=true, in="query"),
     *      @OA\Parameter(name="store_id",description="Store Id", required=true, in="query"),
     *      @OA\Response(response=200, description="successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Product not found."),
     *      @OA\Response(response=409, description="Conflict"),
     *      @OA\Response(response=500, description="Servor Error"),
     * )
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {

            $request->validate([
                'store_id' => 'required|string',
            ]);

            $this->setLocale();

            $resultSet = Product::select('products.*')
                ->where('products.id', $request->id)->where('store_id', $request->get('store_id'));

            $product = $resultSet->first();
            if ($product == null) {
                $product = [];
            }
            return response()->json($product);
        } catch (ValidationException|ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/api/products",
     *      operationId="list",
     *      tags={"Products"},
     *      summary="Get all products information",
     *      description="Returns product data",
     *      @OA\Parameter(name="locale",description="Locale", required=false, in="query"),
     *      @OA\Parameter(name="store_id",description="Store Id", required=true, in="query"),
     *      @OA\Parameter(name="category_id",description="Category Id", required=false, in="query"),
     *      @OA\Response(response=200, description="successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=403, description="Forbidden"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      @OA\Response(response=409, description="Conflict"),
     *      @OA\Response(response=500, description="Servor Error"),
     * )
     */
    public function list(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'store_id' => 'required|string',
                'category_id' => 'string|exists:categories,id'
            ]);

            $this->setLocale();

            if($request->get('category_id')){
                $resultSet = Product::select('products.*')->where('store_id', $request->get('store_id'))->where('category_id', $request->get('category_id'));
            } else {
                $resultSet = Product::select('products.*')->where('store_id', $request->get('store_id'));
            }

            $this->paginate($resultSet);

            $products = $resultSet->get();
            return response()->json($products, 200, ['pagination' => $this->pagination]);
        } catch (ValidationException|ModelNotFoundException|Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/products",
     *      operationId="create",
     *      tags={"Products"},
     *      summary="Post a new product",
     *      description="Create a product",
     *      @OA\Parameter(name="locale", description="Locale", required=true, in="query"),
     *      @OA\Parameter(name="text", description="Description", required=true, in="query"),
     *      @OA\Parameter(name="category_id", description="Category Id", required=true, in="query"),
     *      @OA\Parameter(name="store_id", description="Store Id", required=true, in="query"),
     *      @OA\Parameter(name="image_id", description="Image Id", required=true, in="query"),
     *      @OA\Parameter(name="available", description="Available", required=true, in="query"),
     *      @OA\Parameter(name="ht", description="HT", required=true, in="query"),
     *      @OA\Parameter(name="tva_rate", description="TVA rate", required=false, in="query"),
     *      @OA\Response(response=201,description="Product created"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found")
     * )
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'locale' => 'in:' . env('LOCALES_ALLOWED'),
                'text' => 'string|nullable',
                'category_id' => 'string|required|exists:categories,id',
                'store_id' => 'string|required',
                'image_id' => 'string',
                'available' => 'boolean|required',
                'ht' => 'required|integer',
                'tva_rate' => 'required|integer',
            ]);

            if (!empty($request->input('locale'))) {
                $this->setLocale();
            }

            $category = Category::where('id', $request->input('category_id'))->first();

            if ($category->store_id !== $request->input('store_id')) {
                throw new ModelNotFoundException('Store Id is not the same.', 404);
            }

            DB::beginTransaction();

            $request->product_translation_id = substr('prodtrad-' . md5(Str::uuid()), 0, 25);

            $product = new Product;
            $id = $this->generateId('prod', $product);
            $product->id = $id;
            $product->store_id = $request->store_id;
            $product->image_id = $request->image_id;
            $product->category_id = $request->category_id;
            $product->available = $request->available;

            if (!empty($request->input('locale'))) {
                $product->translateOrNew($request->input('locale'))->fill(['id' => $request->product_translation_id])->text = $request->input('text');
            }

            $product->save();

            $ttc = $request->ht + ($request->ht * ($request->tva_rate / 10000));
            $tva_value = $request->ht * ($request->tva_rate / 10000);

            $price = new ProductPrice();
            $price->id = $this->generateId('prodprice', $price);
            $price->product_id = $id;
            $price->ttc = (int)$ttc;
            $price->ht = (int)$request->ht;
            $price->tva_value = (int)$tva_value;
            $price->tva_rate = (int)$request->tva_rate;
            $price->save();
            $product->price = $price;

            DB::commit();

            if($product->image_id){
                ProductImageJob::dispatch($product)->onQueue('product_image');
            }

            return response()->json($product);
        }  catch (ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), $e->getCode());
        } catch (ValidationException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Patch (
     *      path="/api/products/{id}",
     *      operationId="update",
     *      tags={"Products"},
     *      summary="Patch a product",
     *      description="Update a product",
     *      @OA\Parameter(name="id",description="Product id", required=true, in="query"),
     *      @OA\Parameter(name="available", description="available", required=false, in="query"),
     *      @OA\Parameter(name="category_id", description="Category Id", required=false, in="query"),
     *      @OA\Parameter(name="image_id", description="Image Id", required=false, in="query"),
     *      @OA\Response(
     *          response=200,
     *          description="Store updated"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'available' => 'string',
                'category_id' => 'string|exists:categories,id',
                'image_id' => 'string',
            ]);

            DB::beginTransaction();

            $resultSet = Product::select('products.*')
                ->where('products.id', $request->id);

            $product = $resultSet->first();

            if(empty($product)) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            $product->available = $request->input('available', $product->getOriginal('available'));
            $product->category_id = $request->input('category_id', $product->getOriginal('category_id'));
            $product->image_id = $request->input('image_id', $product->getOriginal('image_id'));

            $product->save();

            DB::commit();

            if($request->input('image_id')){
                ProductImageJob::dispatch($product)->onQueue('product_image');
            }

            return response()->json($product, 200);
        }
        catch(ModelNotFoundException | JsonEncodingException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), $e->getCode());
        }
        catch(ValidationException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        }
        catch(Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Delete  (
     *      path="/api/products/{id}",
     *      operationId="delete",
     *      tags={"Products"},
     *      summary="Delete a product",
     *      description="Soft delete a product",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="query",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Product deleted"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function delete(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $resultSet = Product::where('products.id', $request->product_id);

            if ($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            $product = $resultSet->first();

            $product->delete();

            DB::commit();

            return response()->json($product->fresh());
        }  catch (ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), $e->getCode());
        } catch (ValidationException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/products/{id}/translate",
     *      operationId="addTranslation",
     *      tags={"Products Translations"},
     *      summary="Post a new product translation",
     *      description="Create a new translation",
     *      @OA\Parameter(name="id", description="Product id", required=true, in="query"),
     *      @OA\Parameter(name="locale", description="Locale", required=true, in="query"),
     *      @OA\Parameter(name="text", description="Description", required=true, in="query"),
     *      @OA\Response(response=201,description="Translation created"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found")
     * )
     */
    public function addTranslation(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'locale' => 'required|string|in:' . env('LOCALES_ALLOWED'),
                'text' => 'required|string'
            ]);

            DB::beginTransaction();

            $resultSet = Product::where('products.id', $request->product_id);

            if ($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            $product = $resultSet->first();

            if ($product->hasTranslation($request->input('locale'))) {
                $product->deleteTranslations($request->input('locale'));
            }

            $request->productTranslation_id = substr('prodtrad-' . md5(Str::uuid()), 0, 25);

            $product->translateOrNew($request->input('locale'))->fill(['id' => $request->productTranslation_id])->text = $request->input('text');

            $product->save();

            DB::commit();

            return response()->json($product->translate($request->input('locale'))->fresh());
        } catch (ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 404);
        } catch (ValidationException|InvalidArgumentException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Delete  (
     *      path="/api/products/{id}/translate",
     *      operationId="removeTranslation",
     *      tags={"Products Translations"},
     *      summary="Delete a product translation",
     *      description="Soft delete a translation",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="query",
     *      ),
     *     @OA\Parameter(
     *          name="locale",
     *          description="Locale",
     *          required=true,
     *          in="query",
     *      ),
     *      @OA\Response(response=200, description="Translation deleted"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function removeTranslation(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'locale' => 'required|string|in:' . env('LOCALES_ALLOWED')
            ]);

            DB::beginTransaction();

            $resultSet = Product::where('products.id', $request->product_id);

            $product = $resultSet->first();
            if (empty($product)) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            if (strtolower($request->input('locale')) === strtolower(env('DEFAULT_LOCALE'))) {
                throw new Exception('You cannot remove the default translation.');
            }
            $translationDeleted = $product->translate($request->input('locale'));
            if ($product->hasTranslation($request->input('locale'))) {
                $product->deleteTranslations($request->input('locale'));
            } else {
                throw new ModelNotFoundException('Translation not found.', 404);
            }

            $product->save();

            DB::commit();

            return response()->json($translationDeleted->fresh());
        } catch (ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 404);
        } catch (ValidationException|InvalidArgumentException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Patch (
     *      path="/api/products/{id}/price",
     *      operationId="updatePrice",
     *      tags={"Products"},
     *      summary="Patch a product price",
     *      description="Update a product price",
     *      @OA\Parameter(name="id",description="Product id", required=true, in="query"),
     *      @OA\Parameter(name="ht", description="HT", required=true, in="query"),
     *      @OA\Parameter(name="tva_rate", description="TVA rate", required=true, in="query"),
     *      @OA\Response(
     *          response=200,
     *          description="Store updated"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function updatePrice(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'ht' => 'required|integer',
                'tva_rate' => 'required|integer',
            ]);

            DB::beginTransaction();

            $product = Product::where('products.id', $request->id)->first();

            if (empty($product)) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            $resultSet = ProductPrice::where('products_prices.product_id', $request->id)->where('deleted_at', null);


            $price = $resultSet->first();

            if (empty($price)) {
                throw new Exception('The product price doesn\'t exist.', 404);
            }

            $price->delete();


            $ttc = $request->ht + ($request->ht * ($request->tva_rate / 10000));
            $tva_value = $request->ht * ($request->tva_rate / 10000);

            $productPrice = new ProductPrice();
            $productPrice->id = $this->generateId('prodprice', $price);
            $productPrice->product_id = $request->id;
            $productPrice->ttc = (int)$ttc;
            $productPrice->ht = (int)$request->ht;
            $productPrice->tva_value = (int)$tva_value;
            $productPrice->tva_rate = (int)$request->tva_rate;
            $productPrice->save();

            DB::commit();

            return response()->json($productPrice);
        }  catch (ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), $e->getCode());
        } catch (ValidationException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Post (
     *      path="/api/products/{id}/cart",
     *      operationId="addToCart",
     *      tags={"Products"},
     *      summary="Add a product to a shopping cart",
     *      description="Send pub to cart API",
     *      @OA\Parameter(name="id",description="Product id", required=true, in="query"),
     *      @OA\Parameter(name="quantity",description="Quantity", required=true, in="query"),
     *      @OA\Parameter(name="cart_id", description="Cart Id", required=true, in="query"),
     *      @OA\Response(
     *          response=200,
     *          description="Added to Cart updated"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function addToCart(Request $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $product = Product::where('products.id', $request->id)->first();

            if (empty($product)) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            AddToCartJob::dispatch([
                'cart_id' => $request->cart_id,
                'product_id' => $product->id,
                'store_id' => $product->store_id,
                'category_id' => $product->category_id,
                'ttc' => $product->original_pricing->ttc,
                'ht' => $product->original_pricing->ht,
                'tva_rate' => $product->original_pricing->tva_rate,
                'tva_value' => $product->original_pricing->tva_value,
                'text' => $product->text,
                'quantity' => $request->quantity,
            ])->onQueue('add_to_cart');

            DB::commit();

            return response()->json($product);
        }  catch (ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), $e->getCode());
        } catch (ValidationException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch (Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }
}
