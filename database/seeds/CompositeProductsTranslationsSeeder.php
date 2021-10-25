<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompositeProductsTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('prodctrad_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'      => 'prodc_05ba52372e3c09a8219',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'petit déjeuner',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('prodctrad_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'      => 'prodc_05ba52372e3c09a8219',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'breakfast',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('prodctrad_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'      => 'prodc_bb6bca80cb0ac3484fb',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'déjeuner',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('prodctrad_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'      => 'prodc_bb6bca80cb0ac3484fb',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'lunch',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('prodctrad_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'      => 'prodc_bb6bca80cb0ac3484xx',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Formule coworking',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('prodctrad_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'      => 'prodc_bb6bca80cb0ac3484xx',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'coworking formul',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);
    }
}
