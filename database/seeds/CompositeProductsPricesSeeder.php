<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompositeProductsPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('composite_products_prices')->insert([
            'id'                    => substr('prodcprice_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_05ba52372e3c09a8219',//petit dej
            'price_including_taxes' => '660',
            'price_excluding_taxes' => '600',
            'vat_value'             => '060',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_prices')->insert([
            'id'                    => substr('prodcprice_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_bb6bca80cb0ac3484fb',//déjeuner
            'price_including_taxes' => '1100',
            'price_excluding_taxes' => '1000',
            'vat_value'             => '100',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_prices')->insert([
            'id'                    => substr('prodcprice_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_bb6bca80cb0ac3484xx',//formule coworking
            'price_including_taxes' => '220',
            'price_excluding_taxes' => '200',
            'vat_value'             => '020',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
