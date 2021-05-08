<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompositeProductsProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('composite_products_products')->insert([
            'id'                    => substr('prodcprod_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_05ba52372e3c09a8219',//petit dej
            'product_id'            => 'prod_3a3d84897c39a40bc49e',//croissant
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_products')->insert([
            'id'                    => substr('prodcprod_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_05ba52372e3c09a8219',//petit dej
            'product_id'            => 'prod_c93e0a2194593f85a7a6',//café
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

//        DB::connection('data')->table('composite_products_products')->insert([
//            'id'                    => substr('prodcprod_' . md5(Str::uuid()), 0, 25),
//            'composite_product_id'  => 'prodc_bb6bca80cb0ac3484fb',//déjeuner
//            'product_id'            => 'prod_672832afc671d36c6213',//aperitif
//            'created_at'            => Carbon::now(),
//            'updated_at'            => Carbon::now(),
//        ]);

        DB::connection('data')->table('composite_products_products')->insert([
            'id'                    => substr('prodcprod_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_bb6bca80cb0ac3484fb',//déjeuner
            'product_id'            => 'prod_1344f9b420f516b26861',//salade
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
