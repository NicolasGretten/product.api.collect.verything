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
            [
                'id' => 'cat-00000000-0000-0000-0000-000000000001',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'default' => false,
            ],
            [
                'id' => 'cat-00000000-0000-0000-0000-000000000002',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'default' => false,
            ],
            [
                'id' => 'cat-00000000-0000-0000-0000-000000000003',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'default' => false,
            ],
            [
                'id' => 'cat-00000000-0000-0000-0000-000000000004',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'default' => false,
            ],
            [
                'id' => 'cat-20000000-0000-0000-0000-000000000001',
                'store_id' => 'store-00000000-0000-0000-0000-000000000002',
                'default' => false,
            ],
            [
                'id' => 'cat-20000000-0000-0000-0000-000000000002',
                'store_id' => 'store-00000000-0000-0000-0000-000000000002',
                'default' => false,
            ]
        ]);

        DB::table('categories_translations')->insert([
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000001',
                'locale' => 'fr',
                'text' => 'Basse 4 cordes',
            ],
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000002',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000001',
                'locale' => 'en',
                'text' => '4 strings bass',
            ],
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000003',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000002',
                'locale' => 'fr',
                'text' => 'Basse 5 cordes',
            ],
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000004',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000002',
                'locale' => 'en',
                'text' => '5 strings bass',
            ],
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000005',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000003',
                'locale' => 'fr',
                'text' => 'Basse 6 cordes',
            ],
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000006',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000003',
                'locale' => 'en',
                'text' => '6 strings bass',
            ],
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000007',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000004',
                'locale' => 'fr',
                'text' => 'Guitares',
            ],
            [
                'id' => 'cattrad-00000000-0000-0000-0000-000000000008',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000004',
                'locale' => 'en',
                'text' => 'Guitars',
            ],
            [
                'id' => 'cattrad-20000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-20000000-0000-0000-0000-000000000001',
                'locale' => 'fr',
                'text' => 'Yu-gi-oh!',
            ],
            [
                'id' => 'cattrad-20000000-0000-0000-0000-000000000002',
                'category_id' => 'cat-20000000-0000-0000-0000-000000000002',
                'locale' => 'fr',
                'text' => 'Pokémon',
            ]
        ]);

        DB::table('products')->insert([
            [
                'id' => 'prod-10000000-0000-0000-0000-000000000001',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000001',
                'image_id' => 'img-10000000-0000-0000-0000-000000000007',
                'image_url' => 'https://i.ibb.co/mCLg46f/225227da252a.jpg',
                'reference' => 'MTD-434-24-2563',
                'available' => true,
            ],
            [
                'id' => 'prod-10000000-0000-0000-0000-000000000002',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000001',
                'image_id' => 'img-10000000-0000-0000-0000-000000000008',
                'image_url' => 'https://i.ibb.co/T2JvSx0/9266c66b9610.jpg',
                'reference' => 'THUMB-NT4',
                'available' => true,
            ],
            [
                'id' => 'prod-10000000-0000-0000-0000-000000000003',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000001',
                'image_id' => 'img-10000000-0000-0000-0000-000000000012',
                'image_url' => 'https://i.ibb.co/V3nZSpZ/88a469e8f734.jpg',
                'reference' => 'DGD4',
                'available' => true,
            ],
            [
                'id' => 'prod-10000000-0000-0000-0000-000000000004',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000002',
                'image_id' => 'img-10000000-0000-0000-0000-000000000009',
                'image_url' => 'https://i.ibb.co/8Bw5kkj/2e65ac71b2e9.jpg',
                'reference' => 'CONKLIN',
                'available' => true,
            ],
            [
                'id' => 'prod-10000000-0000-0000-0000-000000000005',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000003',
                'image_id' => 'img-10000000-0000-0000-0000-000000000010',
                'image_url' => 'https://i.ibb.co/Lgz6Lp4/292adda4b2de.jpg',
                'reference' => 'FODERA-EMPEROR-6',
                'available' => true,
            ],
            [
                'id' => 'prod-10000000-0000-0000-0000-000000000006',
                'store_id' => 'store-00000000-0000-0000-0000-000000000001',
                'category_id' => 'cat-00000000-0000-0000-0000-000000000004',
                'image_id' => 'img-10000000-0000-0000-0000-000000000011',
                'image_url' => 'https://i.ibb.co/jZy8tfQ/a8a79aadf87a.png',
                'reference' => 'ALEMBIC-DARLING',
                'available' => true,
            ],
            [
                'id' => 'prod-20000000-0000-0000-0000-000000000001',
                'store_id' => 'store-00000000-0000-0000-0000-000000000002',
                'category_id' => 'cat-20000000-0000-0000-0000-000000000001',
                'image_id' => 'img-20000000-0000-0000-0000-000000000006',
                'image_url' => 'https://i.ibb.co/VBV7WX5/35d9bd2eb322.jpg',
                'reference' => 'LCYW-FR306',
                'available' => true,
            ],
            [
                'id' => 'prod-20000000-0000-0000-0000-000000000002',
                'store_id' => 'store-00000000-0000-0000-0000-000000000002',
                'category_id' => 'cat-20000000-0000-0000-0000-000000000001',
                'image_id' => 'img-20000000-0000-0000-0000-000000000007',
                'image_url' => 'https://i.ibb.co/T0V0Y7r/d6fe0429fc16.jpg',
                'reference' => 'MP22-FR266',
                'available' => true,
            ],
            [
                'id' => 'prod-20000000-0000-0000-0000-000000000003',
                'store_id' => 'store-00000000-0000-0000-0000-000000000002',
                'category_id' => 'cat-20000000-0000-0000-0000-000000000001',
                'image_id' => 'img-20000000-0000-0000-0000-000000000008',
                'image_url' => 'https://i.ibb.co/JF1cDkx/0892c26bff52.jpg',
                'reference' => 'KICO-FR063',
                'available' => true,
            ],
            [
                'id' => 'prod-20000000-0000-0000-0000-000000000004',
                'store_id' => 'store-00000000-0000-0000-0000-000000000002',
                'category_id' => 'cat-20000000-0000-0000-0000-000000000002',
                'image_id' => 'img-20000000-0000-0000-0000-000000000009',
                'image_url' => 'https://i.ibb.co/Z2ZH8Xs/f06821517bd7.jpg',
                'reference' => 'DRAC',
                'available' => true,
            ],
            [
                'id' => 'prod-20000000-0000-0000-0000-000000000005',
                'store_id' => 'store-00000000-0000-0000-0000-000000000002',
                'category_id' => 'cat-20000000-0000-0000-0000-000000000002',
                'image_id' => 'img-20000000-0000-0000-0000-000000000010',
                'image_url' => 'https://i.ibb.co/sFhPKtj/5d41dde0ee63.jpg',
                'reference' => 'MEWTO',
                'available' => true,
            ],
        ]);

        DB::table('products_prices')->insert([
            [
                'id' => 'prodprice-10000000-0000-0000-0000-000000000001',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000001',
                'ttc' => '385000',
                'ht' => '350000',
                'tva_value' => '35000',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-10000000-0000-0000-0000-000000000002',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000002',
                'ttc' => '330000',
                'ht' => '300000',
                'tva_value' => '30000',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-10000000-0000-0000-0000-000000000003',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000003',
                'ttc' => '275000',
                'ht' => '250000',
                'tva_value' => '25000',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-10000000-0000-0000-0000-000000000004',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000004',
                'ttc' => '275000',
                'ht' => '250000',
                'tva_value' => '25000',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-10000000-0000-0000-0000-000000000005',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000005',
                'ttc' => '660000',
                'ht' => '600000',
                'tva_value' => '60000',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-10000000-0000-0000-0000-000000000006',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000006',
                'ttc' => '1650000',
                'ht' => '1500000',
                'tva_value' => '150000',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-20000000-0000-0000-0000-000000000001',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000001',
                'ttc' => '1100',
                'ht' => '1000',
                'tva_value' => '100',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-20000000-0000-0000-0000-000000000002',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000002',
                'ttc' => '660',
                'ht' => '600',
                'tva_value' => '060',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-20000000-0000-0000-0000-000000000003',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000003',
                'ttc' => '2750',
                'ht' => '2500',
                'tva_value' => '250',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-20000000-0000-0000-0000-000000000004',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000004',
                'ttc' => '2200000',
                'ht' => '2000000',
                'tva_value' => '200000',
                'tva_rate' => '1000',
            ],
            [
                'id' => 'prodprice-20000000-0000-0000-0000-000000000005',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000005',
                'ttc' => '5500',
                'ht' => '5000',
                'tva_value' => '500',
                'tva_rate' => '1000',
            ],
        ]);

        DB::table('products_translations')->insert([
            [
                'id' => 'prodtrad-10000000-0000-0000-0000-000000000001',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000001',
                'locale' => 'fr',
                'label' => 'MTD 434-24',
                'description' => 'Rare ! production arrêté, corps en peuplier, table en loupe de myrthe, manche érable et touche en ébène de macasar.',
            ],
            [
                'id' => 'prodtrad-10000000-0000-0000-0000-000000000002',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000002',
                'locale' => 'fr',
                'label' => 'Warwick Thumb NT4 Masterbuilt',
                'description' => 'Masterbuilt made in germany haut de gamme.',
            ],
            [
                'id' => 'prodtrad-10000000-0000-0000-0000-000000000003',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000003',
                'locale' => 'fr',
                'label' => 'David King D4',
                'description' => 'Luthier américain extrêment rare.',
            ],
            [
                'id' => 'prodtrad-10000000-0000-0000-0000-000000000004',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000004',
                'locale' => 'fr',
                'label' => 'Conklin Sidewinder 5 Custom Shop',
                'description' => 'Plus produite, extrêmement rare.',
            ],
            [
                'id' => 'prodtrad-10000000-0000-0000-0000-000000000005',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000005',
                'locale' => 'fr',
                'label' => 'Fodera Emperor 6',
                'description' => 'Incroyable instrument.',
            ],
            [
                'id' => 'prodtrad-10000000-0000-0000-0000-000000000006',
                'product_id' => 'prod-10000000-0000-0000-0000-000000000006',
                'locale' => 'fr',
                'label' => 'Alembic Darling 2020',
                'description' => 'Bijoux.',
            ],
            [
                'id' => 'prodtrad-20000000-0000-0000-0000-000000000001',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000001',
                'locale' => 'fr',
                'label' => 'Exodia le maudit',
                'description' => '1ère édition.',
            ],
            [
                'id' => 'prodtrad-20000000-0000-0000-0000-000000000002',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000002',
                'locale' => 'fr',
                'label' => 'Dragon blanc aux yeux bleus',
                'description' => 'Nouvelle Artwork édition.',
            ],
            [
                'id' => 'prodtrad-20000000-0000-0000-0000-000000000003',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000003',
                'locale' => 'fr',
                'label' => 'Slifer, Le Dragon Céleste',
                'description' => '1ère édition',
            ],
            [
                'id' => 'prodtrad-20000000-0000-0000-0000-000000000004',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000004',
                'locale' => 'fr',
                'label' => 'Dracaufeu MINT',
                'description' => '1ère édition. 9/10',
            ],
            [
                'id' => 'prodtrad-20000000-0000-0000-0000-000000000005',
                'product_id' => 'prod-20000000-0000-0000-0000-000000000005',
                'locale' => 'fr',
                'label' => 'Mewto FullArt',
                'description' => 'Mewto fullart',
            ],
        ]);
    }
}
