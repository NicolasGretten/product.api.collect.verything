<?php

namespace App\Http\Controllers;
set_time_limit(0);

use App\ProductTemplate;
use App\Exceptions\PgSqlException;
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

class ProductTemplateController extends ControllerBase
{
    use IdTrait, FiltersTrait, PaginationTrait, LocaleTrait;

    public function __construct() {

    }

    /**
     * Retrieve a product Template
     *
     * Retrieve all product Template details.
     *
     * @group   Products Templates
     *
     * @urlParam    product_template_id          required        Product Template ID         Example: prodtemplate_3a3d84898a
     *
     * @responseFile /responses/products_templates/retrieve.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {
            $this->setLocale();

            $resultSet = ProductTemplate::select('products_templates.*')
                ->where('products_templates.id', $request->product_template_id);

            $productTemplate = $resultSet->first();

            return response()->json($productTemplate);
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
     * List all products templates
     *
     * List all the products templates.
     *
     * @group   Products Templates
     *
     * @queryParam  items_id                               The items ID list to retrieve.                               Example: ["prodtemplate_3a3d84898a","prodtemplate_3a3d84897b"]
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
     * @responseFile /responses/products_templates/list.json
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
                'items_id'              => 'json'
            ]);

            $this->setLocale();

            $resultSet = ProductTemplate::select('products_templates.*');

            $this->filter($resultSet, ['date', 'itemsId']);
            $this->paginate($resultSet);

            $productsTemplates = $resultSet->get();

            return response()->json($productsTemplates, 200,['pagination' => $this->pagination]);
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
     * Create a product template
     *
     * Allows you to create a new product template.
     *
     * @group   Products Templates
     *
     * @queryParam  title                           required        Title of the description        Example: Traduction française
     * @queryParam  locale                          required        Locale                          Example: fr-FR
     * @queryParam  text                            required        Description                     Example: Boisson 01
     * @queryParam  category_id                     required        Category ID                     Example: cat_d10be1a57a0fddafc85b5
     *
     * @responseFile /responses/products_templates/create.json
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
                'category_id'                   => 'string|exists:categories,id',
            ]);

            if(!empty($request->input('locale'))) {
                $this->setLocale();
            }

            DB::beginTransaction();

            $request->product_template_translation_id = substr('prodtemplatetrad' . md5(Str::uuid()),0 ,25);

            $productTemplate = new ProductTemplate;

            $productTemplate->id = $this->generateId('prodtemplate', $productTemplate);
            $productTemplate->category_id = $request->category_id;

            if(!empty($request->input('locale'))) {
                $productTemplate->translateOrNew($request->input('locale'))->fill(['id' => $request->product_template_translation_id])->title   = $request->input('title');
                $productTemplate->translateOrNew($request->input('locale'))->fill(['id' => $request->product_template_translation_id])->text    = $request->input('text');
            }

            $productTemplate->save();

            DB::commit();

            return response()->json($productTemplate);
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
     * Delete a product template
     *
     * Delete a product template and anonymize the data.
     *
     * @group   Products Templates
     *
     * @urlParam    product_template_id             required        Product Template ID            Example: prodtemplate_3a3d84898a
     *
     * @responseFile /responses/products_templates/delete.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function delete(Request $request):JsonResponse
    {
        try {
            DB::beginTransaction();

            $resultSet = ProductTemplate::where('products_templates.id', $request->product_template_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Product Template not found.', 404);
            }

            $productTemplate = $resultSet->first();

            $productTemplate->delete();

            DB::commit();

            return response()->json($productTemplate);
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
     * Translate a product template's description
     *
     * Allow you to translate a product template's description
     *
     * @group   Products Templates
     *
     * @urlParam    product_template_id     required        ProductTemplate ID                                      Example: prodtemplate_3a3d84898a
     *
     * @queryParam  locale                  required        Locale                                                  Example: en-US
     * @queryParam  title                   required        The title of the translation                            Example: English translations
     * @queryParam  text                    required        The description of the product template translated      Example: Drink 01
     *
     * @responseFile /responses/products_templates/addTranslation.json
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

            $resultSet = ProductTemplate::where('products_templates.id', $request->product_template_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Product Template not found.', 404);
            }

            $productTemplate = $resultSet->first();

            if($productTemplate->hasTranslation($request->input('locale'))) {
                $productTemplate->deleteTranslations($request->input('locale'));
            }

            $request->productTemplateTranslation_id = substr('prodtemplatetrad_' . md5(Str::uuid()),0 ,25);

            $productTemplate->translateOrNew($request->input('locale'))->fill(['id' => $request->productTemplateTranslation_id])->title = $request->input('title');
            $productTemplate->translateOrNew($request->input('locale'))->fill(['id' => $request->productTemplateTranslation_id])->text = $request->input('text');

            $productTemplate->save();

            DB::commit();

            return response()->json($productTemplate->translate($request->input('locale'))->fresh());
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
     * Remove a product template's description translation
     *
     * Allow you to remove a product template's description translation.
     *
     * @group   Products Templates
     *
     * @urlParam    product_template_id         required        Product Template ID         Example: prodtemplate_3a3d84898a
     *
     * @queryParam  locale                      required        Locale                      Example: en-US
     *
     * @responseFile /responses/products_templates/removeTranslation.json
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

            $resultSet = ProductTemplate::where('products_templates.id', $request->product_template_id);

            $productTemplate = $resultSet->first();
            if(empty($productTemplate)) {
                throw new ModelNotFoundException('Product Template not found.', 404);
            }

            if(strtolower($request->input('locale')) === strtolower(env('DEFAULT_LOCALE'))) {
                throw new Exception('You cannot remove the default translation.');
            }
            $translationDeleted = $productTemplate->translate($request->input('locale'));
            if($productTemplate->hasTranslation($request->input('locale'))) {
                $productTemplate->deleteTranslations($request->input('locale'));
            }
            else {
                throw new ModelNotFoundException('Translation not found.', 404);
            }

            $productTemplate->save();

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
}
