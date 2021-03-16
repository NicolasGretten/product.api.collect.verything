<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompositeProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('composite_products_categories')->insert([
            'id'                    => substr('compproductpcat' . md5(Str::uuid()), 0, 25),
            'composite_product_id'            => 'compproduct_64ba1e4ff721a',//petit dej
            'category_id'           => 'cat_3a61a9ed91efe584ca27c',//repas
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_categories')->insert([
            'id'                    => substr('compproductpcat' . md5(Str::uuid()), 0, 25),
            'composite_product_id'            => 'compproduct_c0b5eb2d85401',//déjeuner
            'category_id'           => 'cat_3a61a9ed91efe584ca27c',//repas
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
