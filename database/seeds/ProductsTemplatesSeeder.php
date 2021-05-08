<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsTemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('products_templates')->insert([
            'id'                    => 'prodtemplate_3a3d84898a',
            'category_id'           => 'cat_1ddf322d0c198c29b50ce',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_templates')->insert([
            'id'                    => 'prodtemplate_3a3d84897b',
            'category_id'           => 'cat_d10be1a57a0fddafc85b5',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
