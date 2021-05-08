<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PromotionalCodesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');

        DB::connection('data')->table('promotional_codes_translations')->insert([
            'id'                        => substr('promocodetrad' . md5(Str::uuid()), 0, 25),
            'promotional_code_id'                => 'promocode_17d78ae0a3bfb0a',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Code promo 10%',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('promotional_codes_translations')->insert([
            'id'                        => substr('promocodetrad' . md5(Str::uuid()), 0, 25),
            'promotional_code_id'                => 'promocode_17d78ae0a3bfb0a',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Promo code 10%',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('promotional_codes_translations')->insert([
            'id'                        => substr('promocodetrad' . md5(Str::uuid()), 0, 25),
            'promotional_code_id'      => 'promocode_779cf772199954f',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Code promo 50%',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('promotional_codes_translations')->insert([
            'id'                        => substr('promocodetrad' . md5(Str::uuid()), 0, 25),
            'promotional_code_id'      => 'promocode_779cf772199954f',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Promo code 50%',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);
    }
}
