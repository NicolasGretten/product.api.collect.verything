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
            'id'                        => substr('cpt_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'      => 'compproduct_64ba1e4ff721a',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'petit déjeuner',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('cpt_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'                  => 'compproduct_64ba1e4ff721a',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'breakfast',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('cpt_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'                  => 'compproduct_c0b5eb2d85401',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'déjeuner',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('composite_products_translations')->insert([
            'id'                        => substr('cpt_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'                  => 'compproduct_c0b5eb2d85401',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'lunch',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);
    }
}
