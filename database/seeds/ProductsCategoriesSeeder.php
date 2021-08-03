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
            'product_id'            => 'prod_3a3d84897c39a40bc49e',//croissant
            'category_id'           => 'cat_d10be1a57a0fddafc85b5',//nourriture
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_c93e0a2194593f85a7a6',//salade
            'category_id'           => 'cat_d10be1a57a0fddafc85b5',//nourriture
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_672832afc671d36c6213',//mimosa
            'category_id'           => 'cat_1ddf322d0c198c29b50ce', //boisson
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_1344f9b420f516b26861',//café
            'category_id'           => 'cat_1ddf322d0c198c29b50ce',//boisson
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_bc477fe21a7c92c52256',//apéritif
            'category_id'           => 'cat_1ddf322d0c198c29b50ce',//boisson
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_categories')->insert([
            'id'                    => substr('prodcat' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_bc477fe21a7c92c52255',//h coworking
            'category_id'           => 'cat_3a61a9ed91efe584ca29c',//coworking
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
