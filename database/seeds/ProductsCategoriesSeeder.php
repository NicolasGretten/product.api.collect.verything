<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_9f71793f1bff89227',//croissant
            'category_id'           => 'cat_d10be1a57a0fddafc85b5',//nourriture
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_d66672dd6b9052218',//salade
            'category_id'           => 'cat_d10be1a57a0fddafc85b5',//nourriture
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_3888c3b144ccdc59c',//mimosa
            'category_id'           => 'cat_1ddf322d0c198c29b50ce', //boisson
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_8a72e4d0f1fd12d03',//café
            'category_id'           => 'cat_1ddf322d0c198c29b50ce',//boisson
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'product_4c053842dc07c0330',//apéritif
            'category_id'           => 'cat_1ddf322d0c198c29b50ce',//boisson
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
