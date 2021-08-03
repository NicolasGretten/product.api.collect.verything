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
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_3a3d84897c39a40bc49e',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Croissant',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_3a3d84897c39a40bc49e',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Croissant',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_c93e0a2194593f85a7a6',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Salade',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_c93e0a2194593f85a7a6',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Salad',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_672832afc671d36c6213',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Coworking 1h',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_672832afc671d36c6213',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Coworking 1h',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_1344f9b420f516b26861',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'café',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_1344f9b420f516b26861',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'coffee',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_bc477fe21a7c92c52256',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'apéritif',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_bc477fe21a7c92c52256',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'aperitif',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_bc477fe21a7c92c52255',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Heure de corworking',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('products_translations')->insert([
            'id'                        => substr('prodtrad_' . md5(Str::uuid()), 0, 25),
            'product_id'                => 'prod_bc477fe21a7c92c52255',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Hour of Coworking',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);
    }
}
