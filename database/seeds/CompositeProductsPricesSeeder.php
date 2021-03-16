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
            'id'                    => substr('cpprice_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'compproduct_64ba1e4ff721a',//petit dej
            'price_including_taxes' => '660',
            'price_excluding_taxes' => '600',
            'vat_value'             => '060',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_prices')->insert([
            'id'                    => substr('cpprice_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'compproduct_c0b5eb2d85401',//déjeuner
            'price_including_taxes' => '1100',
            'price_excluding_taxes' => '1000',
            'vat_value'             => '100',
            'vat_rate'              => '10',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
