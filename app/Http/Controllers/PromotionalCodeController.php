<?php

namespace App\Http\Controllers;

use App\Exceptions\PgSqlException;
use App\PromotionalCode;
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

class PromotionalCodeController extends ControllerBase
{
    use IdTrait, FiltersTrait, PaginationTrait, LocaleTrait;

    public function __construct() {

    }

    /**
     * Retrieve a promotional code
     *
     * Retrieve all promotional code details.
     *
     * @group   Promotional Codes
     *
     * @urlParam    promotional_code_id     required        Promotional Code ID                 Example: promocode_17d78ae0a3bfb0a
     *
     * @bodyParam   filters[relations]                      Add a relation in the response      Example: ["translationsList","discounts"]
     *
     * @responseFile /responses/promotional_codes/retrieve.json
     * @responseFile scenario="Relations filter" /responses/promotional_codes/relations-retrieve.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function retrieve(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'filters.relations'        => 'json|relations:translationsList,discounts',
            ]);

            $this->setLocale();

            $resultSet = PromotionalCode::select('promotional_codes.*')
                ->where('promotional_codes.id', $request->promotional_code_id);

            $this->filter($resultSet, ['relations']);

            $promotional_code = $resultSet->get();

            return response()->json($promotional_code);
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
     * List all promotional codes
     *
     * List all the promotional codes.
     *
     * @group   Promotional Codes
     *
     * @queryParam  items_id                               The items ID list to retrieve.                               Example: ["promocode_17d78ae0a3bfb0a","promocode_779cf772199954f"]
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
     * @bodyParam   filters[relations]                     Add a relation in the response                               Example: ["translationsList","discounts"]
     *
     * @responseFile /responses/promotional_codes/list.json
     * @responseFile scenario="Relations Filter" /responses/promotional_codes/relations-list.json
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
                'filters.relations'     => 'json|relations:translationsList,discounts',
                'items_id'              => 'json'
            ]);

            $this->setLocale();

            $resultSet = PromotionalCode::select('promotional_codes.*');

            $this->filter($resultSet, ['date', 'relations', 'itemsId']);
            $this->paginate($resultSet);

            $promotional_codes = $resultSet->get();

            return response()->json($promotional_codes, 200,['pagination' => $this->pagination]);
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
     * Create a promotional code
     *
     * Allows you to create a new promotional code.
     *
     * @group   Promotional Codes
     *
     * @queryParam  title                       required        Title of the description            Example: Traduction française
     * @queryParam  locale                      required        Locale                              Example: fr-FR
     * @queryParam  code                        required        Code                                Example: PROMO20
     * @queryParam  number_used                 required        number already used                 Example: 50
     * @queryParam  maximum_usage               required        max usage                           Example: 1
     * @queryParam  combinable_with_offers      required        combinable with others offers       Example: true
     * @queryParam  text                        required        Description                         Example: code promo spéciale
     *
     * @responseFile /responses/promotional_codes/create.json
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
                'code'                          => 'string',
                'number_used'                   => 'integer',
                'maximum_usage'                 => 'integer',
                'combinable_with_offers'        => 'boolean',
                'text'                          => 'string',
            ]);

            if(!empty($request->input('locale'))) {
                $this->setLocale();
            }

            DB::beginTransaction();

            $request->promotional_code_translation_id = substr('promocodetrad_' . md5(Str::uuid()),0 ,25);

            $promotional_code = new PromotionalCode;
            $promotional_code->id = $this->generateId('promocode', $promotional_code);
            $promotional_code->code = $request->code;
            $promotional_code->number_used = $request->number_used;
            $promotional_code->maximum_usage = $request->maximum_usage;
            $promotional_code->combinable_with_offers = $request->combinable_with_offers;

            if(!empty($request->input('locale'))) {
                $promotional_code->translateOrNew($request->input('locale'))->fill(['id' => $request->promotional_code_translation_id])->title   = $request->input('title');
                $promotional_code->translateOrNew($request->input('locale'))->fill(['id' => $request->promotional_code_translation_id])->text    = $request->input('text');
            }

            $promotional_code->save();

            DB::commit();

            return response()->json($promotional_code);
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
     * Update a promotional code
     *
     * You can update promotional code data.
     *
     * @group   Promotional Codes
     *
     * @urlParam    promotional_code_id     required        Id of the promotional_code to update    Example: promocode_e0e4cf83ded071a
     *
     * @queryParam  code                    required        Code                                    Example: PROMO20
     * @queryParam  number_used             required        number already used                     Example: 50
     * @queryParam  maximum_usage           required        max usage                               Example: 1
     * @queryParam  combinable_with_offers  required        combinable with others offers           Example: true
     *
     * @responseFile /responses/promotional_codes/update.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        try {
            $this->validate($request, [
                'code'                          => 'string',
                'number_used'                   => 'integer',
                'maximum_usage'                 => 'integer',
                'combinable_with_offers'        => 'boolean',
            ]);

            DB::beginTransaction();

            $resultSet = PromotionalCode::where('promotional_codes.id', $request->promotional_code_id);

            $promotional_code = $resultSet->first();

            if(empty($promotional_code)) {
                throw new ModelNotFoundException('Promotional Code not found.', 404);
            }

            $promotional_code->code                         = $request->input('code', $promotional_code->getOriginal('code'));
            $promotional_code->number_used                  = $request->input('number_used', $promotional_code->getOriginal('number_used'));
            $promotional_code->maximum_usage                = $request->input('maximum_usage', $promotional_code->getOriginal('maximum_usage'));
            $promotional_code->combinable_with_offers       = $request->input('combinable_with_offers', $promotional_code->getOriginal('combinable_with_offers'));

            $promotional_code->save();

            DB::commit();

            return response()->json($promotional_code);
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
     * Delete a promotional code
     *
     * Delete a promotional code and anonymize the data.
     *
     * @group   Promotional Codes
     *
     * @urlParam    promotional_code_id         required        Promotional Code ID            Example: promocode_17d78ae0a3bfb0a
     *
     * @responseFile /responses/promotional_codes/delete.json
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function delete(Request $request):JsonResponse
    {
        try {
            DB::beginTransaction();

            $resultSet = PromotionalCode::where('promotional_codes.id', $request->promotional_code_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Promotional Code not found.', 404);
            }

            $promotional_code = $resultSet->first();

            $promotional_code->delete();

            DB::commit();

            return response()->json($promotional_code);
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
     * Translate a promotional code's description
     *
     * Allow you to translate a promotional code's description
     *
     * @group   Promotional Codes
     *
     * @urlParam    promotional_code_id     required        Promotional Code ID                                     Example: promocode_17d78ae0a3bfb0a
     *
     * @queryParam  locale                  required        Locale                                                  Example: en-US
     * @queryParam  title                   required        The title of the translation                            Example: English translations
     * @queryParam  text                    required        The description of the promotional_code translated      Example: Special black friday code
     *
     * @responseFile /responses/promotional_codes/addTranslation.json
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

            $resultSet = PromotionalCode::where('promotional_codes.id', $request->promotional_code_id);

            if($resultSet->get()->isEmpty()) {
                throw new ModelNotFoundException('Promotional Code not found.', 404);
            }

            $promotional_code = $resultSet->first();

            if($promotional_code->hasTranslation($request->input('locale'))) {
                $promotional_code->deleteTranslations($request->input('locale'));
            }

            $request->promotional_codeTranslation_id = substr('cattrad_' . md5(Str::uuid()),0 ,25);

            $promotional_code->translateOrNew($request->input('locale'))->fill(['id' => $request->promotional_codeTranslation_id])->title = $request->input('title');
            $promotional_code->translateOrNew($request->input('locale'))->fill(['id' => $request->promotional_codeTranslation_id])->text = $request->input('text');

            $promotional_code->save();

            DB::commit();

            return response()->json($promotional_code->translate($request->input('locale'))->fresh());
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
     * Remove a promotional code's description translation
     *
     * Allow you to remove a promotional code's description translation.
     *
     * @group   Promotional Codes
     *
     * @urlParam    promotional_code_id         required        Promotional Code ID         Example: promocode_17d78ae0a3bfb0a
     *
     * @queryParam  locale                      required        Locale                      Example: en-US
     *
     * @responseFile /responses/promotional_codes/removeTranslation.json
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

            $resultSet = PromotionalCode::where('promotional_codes.id', $request->promotional_code_id);

            $promotional_code = $resultSet->first();
            if(empty($promotional_code)) {
                throw new ModelNotFoundException('Promotional Code not found.', 404);
            }

            if(strtolower($request->input('locale')) === strtolower(env('DEFAULT_LOCALE'))) {
                throw new Exception('You cannot remove the default translation.');
            }
            $translationDeleted = $promotional_code->translate($request->input('locale'));
            if($promotional_code->hasTranslation($request->input('locale'))) {
                $promotional_code->deleteTranslations($request->input('locale'));
            }
            else {
                throw new ModelNotFoundException('Translation not found.', 404);
            }

            $promotional_code->save();

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
