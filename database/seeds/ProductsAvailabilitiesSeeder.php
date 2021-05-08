<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsAvailabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('prodavail_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_3a3d84897c39a40bc49e',//petit dej
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '07:00:00',
            'hour_end'              => '11:00:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('prodavail_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_c93e0a2194593f85a7a6',//déjeuner
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '11:30:00',
            'hour_end'              => '13:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('prodavail_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_672832afc671d36c6213',//déjeuner
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '10:30:00',
            'hour_end'              => '14:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('prodavail_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_1344f9b420f516b26861',//déjeuner
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '08:00:00',
            'hour_end'              => '18:00:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('prodavail_' . md5(Str::uuid()), 0, 25),
            'product_id'            => 'prod_bc477fe21a7c92c52256',//déjeuner
            'days'                   => '["monday","tuesday","wednesday","thursday","friday"]',
            'hour_start'            => '18:00:00',
            'hour_end'              => '23:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
