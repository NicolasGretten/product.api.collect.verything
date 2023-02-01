<?php

namespace App\Http\Controllers;
set_time_limit(0);

use App\Category;
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

class CategoryController extends Controller
{
    use IdTrait, FiltersTrait, PaginationTrait, LocaleTrait;

    public function __construct() {

    }

    /**
     * Retrieve a category
     *
     * Retrieve all category details.
     *
     * @group   Categories
     *
     * @urlParam    category_id          required        Category ID                        Example: cat_d10be1a57a0fddafc85b5
     *
     * @bodyParam   filters[relations]                   Add a relation in the response     Example: ["products","compositeProducts","discounts"]
     *
     * @responseFile /responses/categories/retrieve.json
     * @responseFile scenario="Relations filter" /responses/categories/relations-retrieve.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'filters.relations'               => 'json',
//                'filters.relations'        => 'json|relations:products,compositeProducts,discounts',
            ]);

            $this->setLocale();

            $resultSet = Category::select('categories.*')
                ->where('categories.id', $request->category_id);

            $this->filter($resultSet, ['relations']);

            $category = $resultSet->first();

            return response()->json($category);
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
     * List all categories
     *
     * List all the categories.
     *
     * @group   Categories
     *
     * @queryParam  items_id                               The items ID list to retrieve.                               Example: ["cat_d10be1a57a0fddafc85b5","cattrad_d8c93817712865f96"]
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
     * @bodyParam   filters[relations]                     Add a relation in the response                               Example: ["products","compositeProducts","discounts"]
     *
     * @responseFile /responses/categories/list.json
     * @responseFile scenario="Relations Filter" /responses/categories/relations-list.json
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
                'filters.relations'               => 'json',
//                'filters.relations'     => 'json|relations:products,compositeProducts,discounts',
                'items_id'              => 'json'
            ]);

            $this->setLocale();

            $resultSet = Category::select('categories.*');

            $this->filter($resultSet, ['date', 'relations', 'itemsId']);
            $this->paginate($resultSet);

            $categories = $resultSet->get();

            return response()->json($categories, 200,['pagination' => $this->pagination]);
        }
        catch(ValidationException $e) {
            return response()->json($e->response->original, 409);
        }
        catch(ModelNotFoundException | Exception $e) {
            return response()->json($e->getMessage(), 409);
        }
    }

    /**
     * Create a category
     *
     * Allows you to create a new category.
     *
     * @group   Categories
     *
     * @queryParam  title       required        Title of the description    Example: Traduction française
     * @queryParam  locale      required        Locale                      Example: fr-FR
     * @queryParam  text        required        Description                 Example: Soins
     *
     * @responseFile /responses/categories/create.json
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
                'text'                          => 'string'
            ]);

            if(!empty($request->input('locale'))) {
                $this->setLocale();
            }

            DB::beginTransaction();

            $request->category_translation_id = substr('cattrad_' . md5(Str::uuid()),0 ,25);

            $category = new Category;
            $category->id = $this->generateId('cat', $category);

            if(!empty($request->input('locale'))) {
                $category->translateOrNew($request->input('locale'))->fill(['id' => $request->category_translation_id])->title   = $request->input('title');
                $category->translateOrNew($request->input('locale'))->fill(['id' => $request->category_translation_id])->text    = $request->input('text');
            }

            $category->save();

            DB::commit();

            return response()->json($category);
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
     * Delete a category
     *
     * Delete a category and anonymize the data.
     *
     * @group   Categories
     *
     * @urlParam    category_id     required        Category ID     Example: cat_d10be1a57a0fddafc85b5
     *
     * @responseFile /responses/categories/delete.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function delete(Request $request):JsonResponse
    {
        try {
            DB::beginTransaction();

            $resultSet = Category::where('categories.id', $request->category_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Category not found.', 404);
            }

            $category = $resultSet->first();

            $category->delete();

            DB::commit();

            return response()->json($category);
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
     * Translate a category's description
     *
     * Allow you to translate a category's description
     *
     * @group   Categories
     *
     * @urlParam    category_id     required        Category ID                                     Example: cat_d10be1a57a0fddafc85b5
     *
     * @queryParam  locale          required        Locale                                          Example: en-US
     * @queryParam  title           required        The title of the translation                    Example: English translations
     * @queryParam  text            required        The description of the category translated      Example: subscription
     *
     * @responseFile /responses/categories/addTranslation.json
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

            $resultSet = Category::where('categories.id', $request->category_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Category not found.', 404);
            }

            $category = $resultSet->first();

            if($category->hasTranslation($request->input('locale'))) {
                $category->deleteTranslations($request->input('locale'));
            }

            $request->categoryTranslation_id = substr('cattrad_' . md5(Str::uuid()),0 ,25);

            $category->translateOrNew($request->input('locale'))->fill(['id' => $request->categoryTranslation_id])->title = $request->input('title');
            $category->translateOrNew($request->input('locale'))->fill(['id' => $request->categoryTranslation_id])->text = $request->input('text');

            $category->save();

            DB::commit();

            return response()->json($category->translate($request->input('locale'))->fresh());
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
     * Remove a category's description translation
     *
     * Allow you to remove a category's description translation.
     *
     * @group   Categories
     *
     * @urlParam    category_id     required        Category ID         Example: cat_d10be1a57a0fddafc85b5
     *
     * @queryParam  locale          required        Locale              Example: en-US
     *
     * @responseFile /responses/categories/removeTranslation.json
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

            $resultSet = Category::where('categories.id', $request->category_id);

            $category = $resultSet->first();
            if(empty($category)) {
                throw new ModelNotFoundException('Category not found.', 404);
            }

            if(strtolower($request->input('locale')) === strtolower(env('DEFAULT_LOCALE'))) {
                throw new Exception('You cannot remove the default translation.');
            }
            $translationDeleted = $category->translate($request->input('locale'));
            if($category->hasTranslation($request->input('locale'))) {
                $category->deleteTranslations($request->input('locale'));
            }
            else {
                throw new ModelNotFoundException('Translation not found.', 404);
            }

            $category->save();

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
