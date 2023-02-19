<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
//            [
//                'empty' => 'empty',
//            ],
            [
                'id' => 'cat-fe4d8e6d-216a-489e-87ef-308e7448cf4f',
                'store_id' => 'store-d3071150-46c4-451e-bacb-9585647cbbe8',
                'default' => false,
            ],
            [
                'id' => 'cat-d91b3fc1-3bce-482d-92d4-d90046f94e79',
                'store_id' => 'store-d3071150-46c4-451e-bacb-9585647cbbe8',
                'default' => false,
            ],
            [
                'id' => 'cat-8262b748-2399-46b5-87a5-e71f751e5609',
                'store_id' => 'store-d3071150-46c4-451e-bacb-9585647cbbe8',
                'default' => false,
            ]
        ]);

        DB::table('categories_translations')->insert([
            [
                'id' => 'cattrad-047a3a8aeb8b4f438',
                'category_id' => 'cat-fe4d8e6d-216a-489e-87ef-308e7448cf4f',
                'locale' => 'fr',
                'text' => 'Basse 4 cordes',
            ],
            [
                'id' => 'cattrad-df731f3cad57fa167',
                'category_id' => 'cat-fe4d8e6d-216a-489e-87ef-308e7448cf4f',
                'locale' => 'en',
                'text' => '4 strings bass',
            ],
            [
                'id' => 'cattrad-a445b24ded989d138',
                'category_id' => 'cat-d91b3fc1-3bce-482d-92d4-d90046f94e79',
                'locale' => 'fr',
                'text' => 'Basse 5 cordes',
            ],
            [
                'id' => 'cattrad-979558818f0bdf3ea',
                'category_id' => 'cat-8262b748-2399-46b5-87a5-e71f751e5609',
                'locale' => 'fr',
                'text' => 'Basse 6 cordes',
            ]
        ]);

        DB::table('products')->insert([
            [
                'id' => 'prod-d089bebc-653a-4664-9eaf-842b6019b318',
                'store_id' => 'store-d3071150-46c4-451e-bacb-9585647cbbe8',
                'category_id' => 'cat-fe4d8e6d-216a-489e-87ef-308e7448cf4f',
                'image_id' => 'img-386007af-b732-4c7d-a44f-c3702626553c',
                'image_url' => 'https://i.ibb.co/mCLg46f/225227da252a.jpg',
                'reference' => 'MTD-434-24-2563',
                'available' => true,
            ],
        ]);

        DB::table('products_prices')->insert([
            [
                'id' => 'prodprice-ca1f58b4-507b-43db-9913-6aad12ed800f',
                'product_id' => 'prod-d089bebc-653a-4664-9eaf-842b6019b318',
                'ttc' => '385000',
                'ht' => '350000',
                'tva_value' => '35000',
                'tva_rate' => '1000',
            ],
        ]);

        DB::table('products_translations')->insert([
            [
                'id' => 'prodtrad-e3470286f45b31bf',
                'product_id' => 'prod-d089bebc-653a-4664-9eaf-842b6019b318',
                'locale' => 'fr',
                'label' => 'MTD 434-24',
                'description' => 'Rare ! production arrêté, corps en peuplier, table en loupe de myrthe, manche érable et touche en ébène de macasar.',
            ],
        ]);
    }
}
