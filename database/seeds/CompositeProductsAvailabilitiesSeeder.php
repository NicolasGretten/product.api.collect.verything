<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompositeProductsAvailabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('composite_products_availabilities')->insert([
            'id'                    => substr('cpa_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'              => 'compproduct_64ba1e4ff721a',//petit dej
            'day'                   => 'monday',
            'hour_start'            => '07:00:00',
            'hour_end'              => '11:00:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_availabilities')->insert([
            'id'                    => substr('cpa_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'            => 'compproduct_c0b5eb2d85401',//déjeuner
            'day'                   => 'monday',
            'hour_start'            => '11:30:00',
            'hour_end'              => '13:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
