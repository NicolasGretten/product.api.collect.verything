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
            'id'                    => substr('prodccat_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_05ba52372e3c09a8219',//petit dej
            'category_id'           => 'cat_3a61a9ed91efe584ca27c',//repas
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_categories')->insert([
            'id'                    => substr('prodccat_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_bb6bca80cb0ac3484fb',//déjeuner
            'category_id'           => 'cat_3a61a9ed91efe584ca27c',//repas
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
