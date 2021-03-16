<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'product_9f71793f1bff89227',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Croissant',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'product_9f71793f1bff89227',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Croissant',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_d66672dd6b9052218',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Salade',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_d66672dd6b9052218',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Salad',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_3888c3b144ccdc59c',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Mimosa',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_3888c3b144ccdc59c',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Mimosa',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_8a72e4d0f1fd12d03',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'café',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_8a72e4d0f1fd12d03',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'coffee',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_4c053842dc07c0330',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'apéritif',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('producttrad' . md5(Str::uuid()), 0, 25),
            'product_id'      => 'product_4c053842dc07c0330',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'aperitif',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);
    }
}
