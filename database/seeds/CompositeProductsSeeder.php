<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompositeProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('composite_products')->insert([
            'id'                    => 'prodc_05ba52372e3c09a8219',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products')->insert([
            'id'                    => 'prodc_bb6bca80cb0ac3484fb',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
