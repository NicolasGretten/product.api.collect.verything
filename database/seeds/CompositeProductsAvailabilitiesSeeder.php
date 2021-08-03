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
            'id'                    => substr('prodcavail_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_05ba52372e3c09a8219',//petit dej
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '07:00:00',
            'hour_end'              => '11:00:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_availabilities')->insert([
            'id'                    => substr('prodcavail_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_bb6bca80cb0ac3484fb',//déjeuner
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '11:30:00',
            'hour_end'              => '13:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('composite_products_availabilities')->insert([
            'id'                    => substr('prodcavail_' . md5(Str::uuid()), 0, 25),
            'composite_product_id'  => 'prodc_bb6bca80cb0ac3484xx',//formule cowroking
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '08:00:00',
            'hour_end'              => '12:00:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
