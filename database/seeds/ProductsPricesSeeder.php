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
            'id'                    => substr('productprc_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_9f71793f1bff89227',
            'price_including_taxes' => '110',
            'price_excluding_taxes' => '100',
            'vat_value'             => '010',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('productprc_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_d66672dd6b9052218',
            'price_including_taxes' => '550',
            'price_excluding_taxes' => '500',
            'vat_value'             => '050',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('productprc_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_3888c3b144ccdc59c',
            'price_including_taxes' => '660',
            'price_excluding_taxes' => '600',
            'vat_value'             => '060',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('productprc_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_8a72e4d0f1fd12d03',
            'price_including_taxes' => '110',
            'price_excluding_taxes' => '100',
            'vat_value'             => '010',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_prices')->insert([
            'id'                    => substr('productprc_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_4c053842dc07c0330',
            'price_including_taxes' => '880',
            'price_excluding_taxes' => '800',
            'vat_value'             => '080',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
