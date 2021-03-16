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
            'id'                    => substr('cpp_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'            => 'compproduct_64ba1e4ff721a',//petit dej
            'product_id'           => 'product_9f71793f1bff89227',//croissant
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_products')->insert([
            'id'                    => substr('cpp_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'            => 'compproduct_64ba1e4ff721a',//petit dej
            'product_id'           => 'product_8a72e4d0f1fd12d03',//café
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_products')->insert([
            'id'                    => substr('cpp_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'            => 'compproduct_c0b5eb2d85401',//déjeuner
            'product_id'           => 'product_4c053842dc07c0330',//aperitif
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_products')->insert([
            'id'                    => substr('cpp_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'            => 'compproduct_c0b5eb2d85401',//déjeuner
            'product_id'           => 'product_d66672dd6b9052218',//salade
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
