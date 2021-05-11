<?php

namespace App\Http\Controllers;

use App\CategoryDiscount;
use App\CompositeProductDiscount;
use App\Discount;
use App\Exceptions\PgSqlException;
use App\ProductDiscount;
use App\Traits\FiltersTrait;
use App\Traits\IdTrait;
use App\Traits\LocaleTrait;
use App\Traits\PaginationTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use InvalidArgumentException;
use PDOException;
use stdClass;

class DiscountController extends ControllerBase
{
    use IdTrait, FiltersTrait, PaginationTrait, LocaleTrait;

    public function __construct() {

    }

    /**
     * Retrieve a discount
     *
     * Retrieve all discount details.
     *
     * @group   Discounts
     *
     * @urlParam    discount_id          required        Discount ID                        Example: discount_9f71793f1bff89227
     *
     * @bodyParam   filters[relations]                   Add a relation in the response     Example: ["compositeProducts","products","categories"]
     *
     * @responseFile /responses/discounts/retrieve.json
     * @responseFile scenario="Relations filter" /responses/discounts/relations-retrieve.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'filters.relations'     => 'json|relations:products,compositeProducts,categories',
            ]);

            $this->setLocale();

            $resultSet = Discount::select('discounts.*')
                ->where('discounts.id', $request->discount_id);

            if (empty($resultSet->first())){
                throw new Exception('The discount doesn\'t exists.', 404);
            }

            $this->filter($resultSet, ['relations']);

            $discount = $resultSet->first();

            return response()->json($discount);
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
     * List all discounts
     *
     * List all the discounts.
     *
     * @group   Discounts
     *
     * @queryParam  items_id                               The items ID list to retrieve.                               Example: ["discount_9f71793f1bff89227","discount_d66672dd6b9052218"]
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
     * @bodyParam   filters[relations]                     Add a relation in the response                               Example: ["compositeProducts","products","categories"]
     *
     * @responseFile /responses/discounts/list.json
     * @responseFile scenario="Relations Filter" /responses/discounts/relations-list.json
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
                'filters.relations'     => 'json|relations:products,compositeProducts,categories',
                'items_id'              => 'json'
            ]);

            $this->setLocale();

            $resultSet = Discount::select('discounts.*');

            $this->filter($resultSet, ['date', 'relations', 'itemsId']);
            $this->paginate($resultSet);

            $discounts = $resultSet->get();

            return response()->json($discounts, 200,['pagination' => $this->pagination]);
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
     * Create a discount
     *
     * Allows you to create a new discount.
     *
     * @group   Discounts
     *
     * @queryParam  title                       required        Title of the description    Example: Traduction française
     * @queryParam  locale                      required        Locale                      Example: fr-FR
     * @queryParam  text                        required        Description                 Example: Promo d'halloween
     * @queryParam  discount_type               required        Discount Type               Example: percentage
     * @queryParam  amount                      required        amount                      Example: 100
     * @queryParam  start_at                    required        Start                       Example: 1970-01-01 00:00:00
     * @queryParam  end_at                      required        End                         Example: 1970-01-01 00:00:00
     * @queryParam  promotional_code_id         required        Promotional code ID         Example: promocode_17d78ae0a3bfb0a
     *
     * @responseFile /responses/discounts/create.json
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'title'                         => 'string',
                'locale'                        => 'in:'. env('LOCALES_ALLOWED'),
                'text'                          => 'string',
                'discount_type'                 => 'string|required',
                'amount'                        => 'integer|required',
                'start_at'                      => 'date_format:Y-m-d H:i:s|required',
                'end_at'                        => 'date_format:Y-m-d H:i:s|required',
                'promotional_code_id'           => 'string|exists:promotional_codes,id',

            ]);

            if($request->start_at < Carbon::tomorrow()) {
                throw new Exception('The discount can\'t start before tomorrow.', 400);
            }

            if($request->end_at <= $request->start_at) {
                throw new Exception('The discount can\'t end before or on the same time than the start date.', 400);
            }

            if(!empty($request->input('locale'))) {
                $this->setLocale();
            }

            DB::beginTransaction();

            $request->discount_translation_id = substr('discounttrad_' . md5(Str::uuid()),0 ,25);

            $discount = new Discount;
            $discount->id = $this->generateId('discount', $discount);
            $discount->discount_type = $request->discount_type;
            $discount->amount = $request->amount;
            $discount->start_at = $request->start_at;
            $discount->end_at = $request->end_at;
            $discount->promotional_code_id = $request->promotional_code_id;

            if(!empty($request->input('locale'))) {
                $discount->translateOrNew($request->input('locale'))->fill(['id' => $request->discount_translation_id])->title   = $request->input('title');
                $discount->translateOrNew($request->input('locale'))->fill(['id' => $request->discount_translation_id])->text    = $request->input('text');
            }

            $discount->save();

            DB::commit();

            return response()->json($discount);
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
     * Update a discount
     *
     * You can update discount data.
     *
     * @group   Discounts
     *
     * @urlParam    discount_id         required        Id of the discount to update        Example: discount_9f71793f1bff89227
     *
     * @queryParam  discount_type       required        Discount Type                       Example: percentage
     * @queryParam  amount              required        amount                              Example: 100
     * @queryParam  start_at            required        Start                               Example: 1970-01-01 00:00:00
     * @queryParam  end_at              required        End                                 Example: 1970-01-01 00:00:00
     *
     * @responseFile /responses/discounts/update.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'discount_type'         => 'string',
                'amount'                => 'integer',
                'start_at'              => 'date_format:Y-m-d H:i:s',
                'end_at'                => 'date_format:Y-m-d H:i:s',
                'promotional_code_id'   => 'string|exists:promotional_codes,id',
            ]);

            DB::beginTransaction();

            $resultSet = Discount::where('discounts.id', $request->discount_id);

            $discount = $resultSet->first();

            if(empty($discount)) {
                throw new ModelNotFoundException('Discount not found.', 404);
            }

            if (!empty($request->start_date)){
                if($discount->start_at <= Carbon::now()) {
                    throw new Exception('you cannot edit a discount that is in progress or has already ended ', 400);
                }

                if($request->start_at < Carbon::tomorrow()) {
                    throw new Exception('The discount can\'t start before tomorrow.', 400);
                }
            }

            if (!empty($request->end_at)) {
                if($request->end_at <= $request->start_at) {
                    throw new Exception('The discount can\'t end before or on the same time than the start date.', 400);
                }

                if($request->end_at <= $discount->start_at) {
                    throw new Exception('The discount can\'t end before or on the same time than the start date.', 400);
                }
            }

            $discount->discount_type        = $request->input('discount_type', $discount->getOriginal('discount_type'));
            $discount->amount               = $request->input('amount', $discount->getOriginal('amount'));
            $discount->start_at             = $request->input('start_at', $discount->getOriginal('start_at'));
            $discount->end_at               = $request->input('end_at', $discount->getOriginal('end_at'));
            $discount->promotional_code_id  = $request->input('promotional_code_id', $discount->getOriginal('promotional_code_id'));

            $discount->save();

            DB::commit();

            return response()->json($discount);
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
     * Delete a discount
     *
     * Delete a discount and anonymize the data.
     *
     * @group   Discounts
     *
     * @urlParam    discount_id             required        Discount ID            Example: discount_9f71793f1bff89227
     *
     * @responseFile /responses/discounts/delete.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function delete(Request $request):JsonResponse
    {
        try {
            DB::beginTransaction();

            $resultSet = Discount::where('discounts.id', $request->discount_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Discount not found.', 404);
            }

            $discount = $resultSet->first();

            $discount->delete();

            DB::commit();

            return response()->json($discount);
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
     * Translate a discount's description
     *
     * Allow you to translate a discount's description
     *
     * @group   Discounts
     *
     * @urlParam    discount_id         required        Discount ID                                     Example: discount_9f71793f1bff89227
     *
     * @queryParam  locale              required        Locale                                          Example: en-US
     * @queryParam  title               required        The title of the translation                    Example: English translations
     * @queryParam  text                required        The description of the discount translated      Example: winter sales
     *
     * @responseFile /responses/discounts/addTranslation.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function addTranslation(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'locale'    => 'required|string|in:'.env('LOCALES_ALLOWED'),
                'title'     => 'required|string',
                'text'      => 'required|string'
            ]);

            DB::beginTransaction();

            $resultSet = Discount::where('discounts.id', $request->discount_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Discount not found.', 404);
            }

            $discount = $resultSet->first();

            if($discount->hasTranslation($request->input('locale'))) {
                $discount->deleteTranslations($request->input('locale'));
            }

            $request->discountTranslation_id = substr('discounttrad_' . md5(Str::uuid()),0 ,25);

            $discount->translateOrNew($request->input('locale'))->fill(['id' => $request->discountTranslation_id])->title = $request->input('title');
            $discount->translateOrNew($request->input('locale'))->fill(['id' => $request->discountTranslation_id])->text = $request->input('text');

            $discount->save();

            DB::commit();

            return response()->json($discount->translate($request->input('locale'))->fresh());
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
     * Remove a discount's description translation
     *
     * Allow you to remove a discount's description translation.
     *
     * @group   Discounts
     *
     * @urlParam    discount_id     required        Discount ID         Example: discount_9f71793f1bff89227
     *
     * @queryParam  locale          required        Locale              Example: en-US
     *
     * @responseFile /responses/discounts/removeTranslation.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function removeTranslation(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'locale'    => 'required|string|in:'. env('LOCALES_ALLOWED')
            ]);

            DB::beginTransaction();

            $resultSet = Discount::where('discounts.id', $request->discount_id);

            $discount = $resultSet->first();
            if(empty($discount)) {
                throw new ModelNotFoundException('Discount not found.', 404);
            }

            if(strtolower($request->input('locale')) === strtolower(env('DEFAULT_LOCALE'))) {
                throw new Exception('You cannot remove the default translation.');
            }
            $translationDeleted = $discount->translate($request->input('locale'));
            if($discount->hasTranslation($request->input('locale'))) {
                $discount->deleteTranslations($request->input('locale'));
            }
            else {
                throw new ModelNotFoundException('Translation not found.', 404);
            }

            $discount->save();

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
     * assign a discount to a product, composite product or category
     *
     * You can assign a discount.
     *
     * @group   Discounts
     *
     * @urlParam    discount_id                 required        Id of the discount to assign        Example: discount_9f71793f1bff89227
     *
     * @queryParam  product_id                  required        Product ID                          Example: prod_3a3d84897c39a40bc49e
     * @queryParam  composite_product_id        required        Composite Product ID                Example: prodc_05ba52372e3c09a8219
     * @queryParam  category_id                 required        Category ID                         Example: cat_bcc3b36c2dd0ae4a1c57c
     *
     * @responseFile /responses/discounts/assignDiscount.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function assignDiscount(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'product_id'                => 'string|exists:products,id',
                'composite_product_id'      => 'string|exists:composite_products,id',
                'category_id'               => 'string|exists:categories,id',
            ]);

            $response = new stdClass();

            DB::beginTransaction();

            $discount = Discount::where('discounts.id', $request->discount_id)->first();

            if(empty($discount)) {
                throw new ModelNotFoundException('Discount not found.', 404);
            }

            if(!empty($request->product_id)) {
                $verification = ProductDiscount::where('products_discounts.discount_id', $request->discount_id)
                    ->where('products_discounts.product_id', $request->product_id)
                    ->first();

                if(!empty($verification)) {
                    throw new Exception('This Discount is already assign to this product.', 400);
                }

                $product = new ProductDiscount();

                $product->id = $this->generateId('proddiscount', $product);
                $product->discount_id = $request->discount_id;
                $product->product_id = $request->product_id;

                $product->save();
                $response->product = $product;
            }

            if(!empty($request->composite_product_id)) {
                $verification = CompositeProductDiscount::where('composite_products_discounts.discount_id', $request->discount_id)
                    ->where('composite_products_discounts.composite_product_id', $request->composite_product_id)
                    ->first();

                if(!empty($verification)) {
                    throw new Exception('This Discount is already assign to this composite product.', 400);
                }
                $compositeProduct = new CompositeProductDiscount();

                $compositeProduct->id = $this->generateId('prodcdiscount', $compositeProduct);
                $compositeProduct->composite_product_id = $request->composite_product_id;
                $compositeProduct->discount_id = $request->discount_id;

                $compositeProduct->save();
                $response->composite_product = $compositeProduct;

            }

            if(!empty($request->category_id)) {
                $verification = CategoryDiscount::where('categories_discounts.discount_id', $request->discount_id)
                    ->where('categories_discounts.category_id', $request->category_id)
                    ->first();

                if(!empty($verification)) {
                    throw new Exception('This Discount is already assign to this category.', 400);
                }
                $category = new CategoryDiscount();

                $category->id = $this->generateId('catdiscount', $category);
                $category->discount_id = $request->discount_id;
                $category->category_id = $request->category_id;

                $category->save();
                $response->category = $category;
            }

            DB::commit();

            return response()->json($response);
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
     * remove a discount to a product, composite product or category
     *
     * You can remove a discount.
     *
     * @group   Discounts
     *
     * @urlParam    discount_id                 required        Id of the discount to assign    Example: discount_9f71793f1bff89227
     *
     * @queryParam  product_id                  required        Product ID                      Example: prod_3a3d84897c39a40bc49e
     * @queryParam  composite_product_id        required        Composite Product ID            Example: prodc_05ba52372e3c09a8219
     * @queryParam  category_id                 required        Category ID                     Example: cat_bcc3b36c2dd0ae4a1c57c
     *
     * @responseFile /responses/discounts/removeDiscount.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function removeDiscount(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'product_id'                => 'string|exists:products,id',
                'composite_product_id'      => 'string|exists:composite_products,id',
                'category_id'               => 'string|exists:categories,id',
            ]);

            $response = new stdClass();
            DB::beginTransaction();

            $discount = Discount::where('discounts.id', $request->discount_id)->first();

            if(empty($discount)) {
                throw new ModelNotFoundException('Discount not found.', 404);
            }

            if(!empty($request->product_id)) {
                $resultProduct = ProductDiscount::where('products_discounts.product_id', $request->product_id)
                    ->where('products_discounts.discount_id', $request->discount_id);

                $product = $resultProduct->first();

                if (empty($product))
                {
                    throw new Exception('The product doesn\'t have this discount assign.', 400);
                }

                $product->delete();
                $response->product = $product;
            }

            if(!empty($request->composite_product_id)) {
                $resultCompositeProduct = CompositeProductDiscount::where('composite_products_discounts.composite_product_id', $request->composite_product_id)
                    ->where('composite_products_discounts.discount_id', $request->discount_id);

                $compositeProduct = $resultCompositeProduct->first();

                if (empty($compositeProduct))
                {
                    throw new Exception('The composite product doesn\'t have this discount assign.', 400);
                }

                $compositeProduct->delete();
                $response->composite_product = $compositeProduct;
            }

            if(!empty($request->category_id)) {
                $resultCategory = CategoryDiscount::where('categories_discounts.category_id', $request->category_id)
                    ->where('categories_discounts.discount_id', $request->discount_id);

                $category = $resultCategory->first();

                if (empty($category))
                {
                    throw new Exception('The category doesn\'t have this discount assign.', 400);
                }

                $category->delete();
                $response->category = $category;
            }

            DB::commit();

            return response()->json($response);
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
