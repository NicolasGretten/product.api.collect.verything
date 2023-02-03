<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\FiltersTrait;
use App\Traits\IdTrait;
use App\Traits\LocaleTrait;
use App\Traits\PaginationTrait;
use Bugsnag\BugsnagLaravel\Facades\Bugsnag;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use InvalidArgumentException;
use OpenApi\Annotations as OA;
use PDOException;

class CategoryController extends Controller
{
    use IdTrait, FiltersTrait, PaginationTrait, LocaleTrait;

    /**
     * @OA\Get(
     *      path="/api/categories/{id}",
     *      operationId="retrieve",
     *      tags={"Categories"},
     *      summary="Get category information",
     *      description="Returns category data",
     *      @OA\Parameter(name="locale",description="Locale", required=false, in="query"),
     *      @OA\Parameter(name="id",description="Category id", required=true, in="query"),
     *      @OA\Parameter(name="store_id",description="Store Id", required=true, in="query"),
     *      @OA\Response(response=200, description="successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Category not found."),
     *      @OA\Response(response=409, description="Conflict"),
     *      @OA\Response(response=500, description="Servor Error"),
     * )
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'store_id' => 'required',
            ]);

            $this->setLocale();

            $resultSet = Category::select('categories.*')
                ->where('categories.id', $request->id)->where('store_id', $request->input('store_id'));

            $category = $resultSet->first();

            return response()->json($category);
        }
        catch(ValidationException|ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch(Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/api/categories",
     *      operationId="list",
     *      tags={"Categories"},
     *      summary="Get all categories information",
     *      description="Returns category data",
     *      @OA\Parameter(name="locale",description="Locale", required=false, in="query"),
     *      @OA\Parameter(name="store_id",description="Store Id", required=true, in="query"),
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
                'store_id' => 'required',
            ]);

            $this->setLocale();

            $resultSet = Category::select('categories.*')->where('store_id', $request->input('store_id'));

            $this->paginate($resultSet);

            $categories = $resultSet->get();

            return response()->json($categories, 200,['pagination' => $this->pagination]);
        }
        catch(ValidationException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        }
        catch(ModelNotFoundException | Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/categories",
     *      operationId="create",
     *      tags={"Categories"},
     *      summary="Post a new category",
     *      description="Create a category",
     *      @OA\Parameter(name="locale", description="Locale", required=true, in="query"),
     *      @OA\Parameter(name="text", description="Description", required=true, in="query"),
     *      @OA\Parameter(name="store_id", description="Store Id", required=true, in="query"),
     *      @OA\Parameter(name="default", description="Default", required=true, in="query"),
     *      @OA\Response(response=201,description="Category created"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found")
     * )
     */
    public function create(Request $request): JsonResponse
    {
        try {

            $this->validate($request, [
                'locale'         => 'in:'. env('LOCALES_ALLOWED'),
                'text'           => 'string',
                'default'        => 'required|boolean',
                'store_id'       => 'required|string'
            ]);

            if(!empty($request->input('locale'))) {
                $this->setLocale();
            }

            DB::beginTransaction();

            $request->category_translation_id = substr('cattrad-' . md5(Str::uuid()),0 ,25);

            $category = new Category;
            $category->id = $this->generateId('cat', $category);
            $category->store_id =  $request->input('store_id');
            $category->default = $request->input('default');

            if(!empty($request->input('locale'))) {
                $category->translateOrNew($request->input('locale'))->fill(['id' => $request->category_translation_id])->text    = $request->input('text');
            }

            $category->save();

            DB::commit();

            return response()->json($category);
        }
        catch(ModelNotFoundException $e) {
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
     *      path="/api/categories/{id}",
     *      operationId="delete",
     *      tags={"Categories"},
     *      summary="Delete a category",
     *      description="Soft delete a category",
     *      @OA\Parameter(
     *          name="id",
     *          description="Category id",
     *          required=true,
     *          in="query",
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Category deleted"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function delete(Request $request):JsonResponse
    {
        try {
            DB::beginTransaction();

            $resultSet = Category::where('categories.id', $request->id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Category not found.', 404);
            }

            $category = $resultSet->first();

            $category->delete();

            DB::commit();

            return response()->json($category);
        }
        catch(ModelNotFoundException $e) {
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
     * @OA\Post(
     *      path="/api/categories/{id}/translate",
     *      operationId="addTranslation",
     *      tags={"Categories Translations"},
     *      summary="Post a new category translation",
     *      description="Create a new translation",
     *      @OA\Parameter(name="locale", description="Locale", required=true, in="query"),
     *      @OA\Parameter(name="id", description="Category id", required=true, in="query"),
     *      @OA\Parameter(name="text", description="Text", required=true, in="query"),
     *      @OA\Response(response=201,description="Translation created"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found")
     * )
     */
    public function addTranslation(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'locale'            => 'required|string|in:'.env('LOCALES_ALLOWED'),
                'text'              => 'required|string'
            ]);

            DB::beginTransaction();

            $resultSet = Category::where('categories.id', $request->id);

            if(!$resultSet->first()) {
                throw new ModelNotFoundException('Category not found.', 404);
            }

            $category = $resultSet->first();

            if($category->hasTranslation($request->input('locale'))) {
                $category->deleteTranslations($request->input('locale'));
            }

            $request->category_translation_id = substr('cattrad-' . md5(Str::uuid()),0 ,25);

            $category->translateOrNew($request->input('locale'))->fill(['id' => $request->category_translation_id])->text = $request->input('text');

            $category->save();

            DB::commit();

            return response()->json($category->translate($request->input('locale'))->fresh());
        }
        catch(ModelNotFoundException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 404);
        }
        catch(ValidationException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        }
        catch(InvalidArgumentException $e) {
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
     *      path="/api/categories/{id}/translate",
     *      operationId="removeTranslation",
     *      tags={"Categories Translations"},
     *      summary="Delete a category translation",
     *      description="Soft delete a translation",
     *     @OA\Parameter(
     *          name="locale",
     *          description="Locale",
     *          required=true,
     *          in="query",
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Category id",
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
            $this->validate($request, [
                'locale'         => 'required|string|in:'. env('LOCALES_ALLOWED')
            ]);

            DB::beginTransaction();

            $resultSet = Category::where('categories.id', $request->id);

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
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 404);
        }
        catch(ValidationException|InvalidArgumentException $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 409);
        } catch(Exception $e) {
            Bugsnag::notifyException($e);
            return response()->json($e->getMessage(), 500);
        }
    }
}
