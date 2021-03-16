<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('products')->insert([
            'id'                    => 'product_9f71793f1bff89227',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products')->insert([
            'id'                    => 'product_d66672dd6b9052218',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products')->insert([
            'id'                    => 'product_3888c3b144ccdc59c',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products')->insert([
            'id'                    => 'product_8a72e4d0f1fd12d03',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products')->insert([
            'id'                    => 'product_4c053842dc07c0330',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

    }
}
