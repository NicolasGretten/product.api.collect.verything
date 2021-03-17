<?php

namespace App\Http\Controllers;

use App\Product;
use App\Exceptions\PgSqlException;
use App\ProductAvailability;
use App\ProductCategory;
use App\ProductPrice;
use App\Traits\FiltersTrait;
use App\Traits\IdTrait;
use App\Traits\LocaleTrait;
use App\Traits\PaginationTrait;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use InvalidArgumentException;
use PDOException;

class ProductController extends ControllerBase
{
    use IdTrait, FiltersTrait, PaginationTrait, LocaleTrait;

    public function __construct() {

    }

    /**
     * Retrieve a product
     *
     * Retrieve all product details.
     *
     * @group   Products
     *
     * @urlParam    product_id          required        Product ID                          Example: product_9f71793f1bff89227
     *
     * @bodyParam   filters[relations]                   Add a relation in the response     Example: ["compositeProducts","availabilities","prices","discounts","categories","translationsList"]
     *
     * @responseFile /responses/products/retrieve.json
     * @responseFile scenario="Relations filter" /responses/products/relations-retrieve.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'filters.relations'     => 'json|relations:compositeProducts,availabilities,prices,discounts,categories,translationsList',
            ]);

            $this->setLocale();

            $resultSet = Product::select('products.*')
                ->where('products.id', $request->product_id);

            $this->filter($resultSet, ['relations']);

            $product = $resultSet->get();

            return response()->json($product);
        }
        catch(PDOException $e) {
            throw new PgSqlException($e);
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * List all products
     *
     * List all the products.
     *
     * @group   Products
     *
     * @queryParam  items_id                               The items ID list to retrieve.                               Example: ["product_9f71793f1bff89227","product_d66672dd6b9052218"]
     * @queryParam  limit                                  Number of results per pagination page                        Example: 10
     * @queryParam  page                                   Current page number for pagination                           Example: 1
     *
     * @bodyParam   filters[created][gt]                   Creation datetime is Greater Than this value.                Example: 1602688060
     * @bodyParam   filters[created][gte]                  Creation datetime is Greater Than or Equal to this value     Example: 1602688060
     * @bodyParam   filters[created][lt]                   Creation datetime is Less Than this value                    Example: 1602688060
     * @bodyParam   filters[created][lte]                  Creation datetime is Less Than or Equal to this value        Example: 1602688060
     * @bodyParam   filters[created][order]                Sort the results in the order given                          Example: ASC
     *
     * @bodyParam   filters[updated][gt]                   Update datetime is Greater Than this value.                  Example: 1602688060
     * @bodyParam   filters[updated][gte]                  Update datetime is Greater Than or Equal to this value       Example: 1602688060
     * @bodyParam   filters[updated][lt]                   Update datetime is Less Than this value                      Example: 1602688060
     * @bodyParam   filters[updated][lte]                  Update datetime is Less Than or Equal to this value          Example: 1602688060
     * @bodyParam   filters[updated][order]                Sort the results in the order given                          Example: ASC
     *
     * @bodyParam   filters[deleted][gt]                   Deletion datetime is Greater Than this value.                Example: 1602688060
     * @bodyParam   filters[deleted][gte]                  Deletion datetime is Greater Than or Equal to this value     Example: 1602688060
     * @bodyParam   filters[deleted][lt]                   Deletion datetime is Less Than this value                    Example: 1602688060
     * @bodyParam   filters[deleted][lte]                  Deletion datetime is Less Than or Equal to this value        Example: 1602688060
     * @bodyParam   filters[deleted][order]                Sort the results in the order given                          Example: ASC
     *
     * @bodyParam   filters[relations]                     Add a relation in the response                               Example: ["compositeProducts","availabilities","prices","discounts","categories","translationsList"]
     *
     * @responseFile /responses/products/list.json
     * @responseFile scenario="Relations Filter" /responses/products/relations-list.json
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'limit'                 => 'int|required_with:page',
                'page'                  => 'int|required_with:limit',
                'filters.relations'     => 'json|relations:compositeProducts,availabilities,prices,discounts,categories,translationsList',
                'items_id'              => 'json'
            ]);

            $this->setLocale();

            $resultSet = Product::select('products.*');

            $this->filter($resultSet, ['date', 'relations', 'itemsId']);
            $this->paginate($resultSet);

            $products = $resultSet->get();

            return response()->json($products, 200,['pagination' => $this->pagination]);
        }
        catch(PDOException $e) {
            throw new PgSqlException($e);
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(ModelNotFoundException | Exception $e) {
            return response()->json($e->getMessage(), 409);
        }
    }

    /**
     * Create a product
     *
     * Allows you to create a new product.
     *
     * @group   Products
     *
     * @queryParam  title                           required        Title of the description        Example: Traduction française
     * @queryParam  locale                          required        Locale                          Example: fr-FR
     * @queryParam  text                            required        Description                     Example: spa
     * @queryParam  price_including_taxes           required        New price including taxes       Example: 120
     * @queryParam  price_excluding_taxes           required        New price excluding taxes       Example: 100
     * @queryParam  vat_value                       required        New vat value                   Example: 20
     * @queryParam  vat_rate                        required        New vat rate                    Example: 20
     * @queryParam  day                             required        day available                   Example: ["monday","tuesday","wednesday"]
     * @queryParam  hour_start                      required        Hour start                      Example: 08:00:00
     * @queryParam  hour_end                        required        Hour end                        Example: 10:00:00
     * @queryParam  category_id                     required        Category ID                     Example: cat_d10be1a57a0fddafc85b5
     *
     * @responseFile /responses/products/create.json
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        try {
            $this->validate($request, [
                'title'                         => 'string',
                'locale'                        => 'in:'. env('LOCALES_ALLOWED'),
                'text'                          => 'string',

                'category_id'                   => 'string|exists:categories,id',

                'day'                           => 'json',
                'hour_start'                    => 'date_format:H:i:s',
                'hour_end'                      => 'date_format:H:i:s',

                'price_including_taxes'         => 'integer',
                'price_excluding_taxes'         => 'integer',
                'vat_value'                     => 'integer',
                'vat_rate'                      => 'integer',
            ]);

            if(!empty($request->input('locale'))) {
                $this->setLocale();
            }

            DB::beginTransaction();

            $request->product_translation_id = substr('producttrad_' . md5(Str::uuid()),0 ,25);

            $product = new Product;
            $id = $this->generateId('product', $product);
            $product->id = $id;

            if(!empty($request->input('locale'))) {
                $product->translateOrNew($request->input('locale'))->fill(['id' => $request->product_translation_id])->title   = $request->input('title');
                $product->translateOrNew($request->input('locale'))->fill(['id' => $request->product_translation_id])->text    = $request->input('text');
            }

            $product->save();

            $availability = new ProductAvailability();
            $availability->id           = $this->generateId('pa', $availability);
            $availability->product_id   = $id;
            $availability->day          = $request->day;
            $availability->hour_start   = $request->hour_start;
            $availability->hour_end     = $request->hour_end;
            $availability->save();
            $product->availability = $availability;

            $price = new ProductPrice();
            $price->id                      = $this->generateId('productprc', $price);
            $price->product_id              = $id;
            $price->price_including_taxes   = $request->price_including_taxes;
            $price->price_excluding_taxes   = $request->price_excluding_taxes;
            $price->vat_value               = $request->vat_value;
            $price->vat_rate                = $request->vat_rate;
            $price->save();
            $product->price = $price;

            $category = new ProductCategory();
            $category->id               = $this->generateId('prodcat', $category);
            $category->product_id       = $id;
            $category->category_id      = $request->category_id;
            $category->save();
            $product->category = $category;

            DB::commit();

            return response()->json($product);
        }
        catch(PDOException $e) {
            throw new PgSqlException($e);
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Delete a product
     *
     * Delete a product and anonymize the data.
     *
     * @group   Products
     *
     * @urlParam    product_id             required        Product ID            Example: product_9f71793f1bff89227
     *
     * @responseFile /responses/products/delete.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function delete(Request $request):JsonResponse
    {
        try {
            DB::beginTransaction();

            $resultSet = Product::where('products.id', $request->product_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            $product = $resultSet->first();

            $product->delete();

            DB::commit();

            return response()->json($product);
        }
        catch(PDOException $e) {
            throw new PgSqlException($e);
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Translate a product's description
     *
     * Allow you to translate a product's description
     *
     * @group   Products
     *
     * @urlParam    product_id  required        Product ID                                      Example: product_9f71793f1bff89227
     *
     * @queryParam  locale      required        Locale                                          Example: en-US
     * @queryParam  title       required        The title of the translation                    Example: English translations
     * @queryParam  text        required        The description of the product translated       Example: Spa
     *
     * @responseFile /responses/products/addTranslation.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addTranslation(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'locale'            => 'required|string|in:'.env('LOCALES_ALLOWED'),
                'title'             => 'required|string',
                'text'              => 'required|string'
            ]);

            DB::beginTransaction();

            $resultSet = Product::where('products.id', $request->product_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            $product = $resultSet->first();

            if($product->hasTranslation($request->input('locale'))) {
                $product->deleteTranslations($request->input('locale'));
            }

            $request->productTranslation_id = substr('producttrad_' . md5(Str::uuid()),0 ,25);

            $product->translateOrNew($request->input('locale'))->fill(['id' => $request->productTranslation_id])->title = $request->input('title');
            $product->translateOrNew($request->input('locale'))->fill(['id' => $request->productTranslation_id])->text = $request->input('text');

            $product->save();

            DB::commit();

            return response()->json($product->translate($request->input('locale'))->fresh());
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), 404);
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(InvalidArgumentException $e) {
            return response()->json($e->getMessage(), 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Remove a product's description translation
     *
     * Allow you to remove a product's description translation.
     *
     * @group   Products
     *
     * @urlParam    product_id      required        Product ID      Example: product_9f71793f1bff89227
     *
     * @queryParam  locale          required        Locale          Example: en-US
     *
     * @responseFile /responses/products/removeTranslation.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function removeTranslation(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'locale'         => 'required|string|in:'. env('LOCALES_ALLOWED')
            ]);

            DB::beginTransaction();

            $resultSet = Product::where('products.id', $request->product_id);

            $product = $resultSet->first();
            if(empty($product)) {
                throw new ModelNotFoundException('Product not found.', 404);
            }

            if(strtolower($request->input('locale')) === strtolower(env('DEFAULT_LOCALE'))) {
                throw new Exception('You cannot remove the default translation.');
            }
            $translationDeleted = $product->translate($request->input('locale'));
            if($product->hasTranslation($request->input('locale'))) {
                $product->deleteTranslations($request->input('locale'));
            }
            else {
                throw new ModelNotFoundException('Translation not found.', 404);
            }

            $product->save();

            DB::commit();

            return response()->json($translationDeleted->fresh());
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), 404);
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(InvalidArgumentException $e) {
            return response()->json($e->getMessage(), 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update a product price
     *
     * You can update product price data.
     *
     * @group   Products
     *
     * @urlParam    product_id              required    Id of the product to update         Example: product_9f71793f1bff89227
     * @urlParam    product_price_id        required    Id of the product price to update   Example: productprc_4e9a60b280a60e
     *
     * @queryParam  price_including_taxes   required    New price including taxes           Example: 120
     * @queryParam  price_excluding_taxes   required    New price excluding taxes           Example: 100
     * @queryParam  vat_value               required    New vat value                       Example: 20
     * @queryParam  vat_rate                required    New vat rate                        Example: 20
     *
     * @responseFile /responses/products/updatePrice.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function updatePrice(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'price_including_taxes'         => 'integer',
                'price_excluding_taxes'         => 'integer',
                'vat_value'                     => 'integer',
                'vat_rate'                      => 'integer',
            ]);

            DB::beginTransaction();

            $resultSet = ProductPrice::where('products_prices.id', $request->product_price_id);

            $price = $resultSet->first();

            if(empty($price)) {
                throw new Exception('The product price doesn\'t exist.', 404);
            }

            $price->delete();


            $newPrice = new ProductPrice();
            $newPrice->id                           = $this->generateId('productprc', $newPrice);
            $newPrice->product_id                   = $request->product_id;
            $newPrice->price_including_taxes        = $request->price_including_taxes;
            $newPrice->price_excluding_taxes        = $request->price_excluding_taxes;
            $newPrice->vat_value                    = $request->vat_value;
            $newPrice->vat_rate                     = $request->vat_rate;

            $newPrice->save();

            DB::commit();

            return response()->json($newPrice);
        }
        catch(PDOException $e) {
            throw new PgSqlException($e);
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update a product availabilities
     *
     * You can update product availabilities data.
     *
     * @group   Products
     *
     * @urlParam    product_id          required        Id of the product to update     Example: product_9f71793f1bff89227
     *
     * @queryParam  day                 required        day available                   Example: ["monday","tuesday","wednesday"]
     * @queryParam  hour_start          required        Hour start                      Example: 08:00:00
     * @queryParam  hour_end            required        Hour end                        Example: 10:00:00
     *
     * @responseFile /responses/products/updateAvailability.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function updateAvailability(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'day'                           => 'json',
                'hour_start'                    => 'date_format:H:i:s',
                'hour_end'                      => 'date_format:H:i:s',
            ]);

            DB::beginTransaction();

            $resultSet = ProductAvailability::where('products_availabilities.product_id', $request->product_id);

            $availability = $resultSet->first();

            $availability->day              = $request->input('day', $availability->getOriginal('day'));
            $availability->hour_start       = $request->input('hour_start', $availability->getOriginal('hour_start'));
            $availability->hour_end         = $request->input('hour_end', $availability->getOriginal('hour_end'));

            $availability->save();

            DB::commit();

            return response()->json($availability);
        }
        catch(PDOException $e) {
            throw new PgSqlException($e);
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update a product category
     *
     * You can update product category data.
     *
     * @group   Products
     *
     * @urlParam    product_id      required        Id of the product to update     Example: product_9f71793f1bff89227
     *
     * @queryParam  category_id     required        Category ID                     Example: cat_d10be1a57a0fddafc85b5
     *
     * @responseFile /responses/products/updateCategory.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function updateCategory(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'category_id'                   => 'string|exists:categories,id',
            ]);

            DB::beginTransaction();

            $resultSet = ProductCategory::where('products_categories.product_id', $request->product_id);

            $category = $resultSet->first();

            $category->category_id  = $request->input('category_id', $category->getOriginal('category_id'));

            $category->save();

            DB::commit();

            return response()->json($category);
        }
        catch(PDOException $e) {
            throw new PgSqlException($e);
        }
        catch(ModelNotFoundException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
