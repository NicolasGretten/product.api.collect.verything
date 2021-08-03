<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('prodprice_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_3a3d84897c39a40bc49e',
            'price_including_taxes' => '110',
            'price_excluding_taxes' => '100',
            'vat_value'             => '010',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('prodprice_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_c93e0a2194593f85a7a6',
            'price_including_taxes' => '550',
            'price_excluding_taxes' => '500',
            'vat_value'             => '050',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('prodprice_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_672832afc671d36c6213',
            'price_including_taxes' => '660',
            'price_excluding_taxes' => '600',
            'vat_value'             => '060',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('prodprice_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_1344f9b420f516b26861',
            'price_including_taxes' => '110',
            'price_excluding_taxes' => '100',
            'vat_value'             => '010',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('prodprice_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_bc477fe21a7c92c52256',
            'price_including_taxes' => '880',
            'price_excluding_taxes' => '800',
            'vat_value'             => '080',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('prodprice_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_bc477fe21a7c92c52255',
            'price_including_taxes' => '110',
            'price_excluding_taxes' => '100',
            'vat_value'             => '010',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
