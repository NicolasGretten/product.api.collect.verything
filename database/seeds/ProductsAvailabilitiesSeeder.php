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
            'id'                    => substr('pa_' . md5(Str::uuid()), 0, 25),
            'product_id'  => 'product_9f71793f1bff89227',//petit dej
            'day'                   => 'monday',
            'hour_start'            => '07:00:00',
            'hour_end'              => '11:00:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('pa_' . md5(Str::uuid()), 0, 25),
            'product_id'  => 'product_d66672dd6b9052218',//déjeuner
            'day'                   => 'monday',
            'hour_start'            => '11:30:00',
            'hour_end'              => '13:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('pa_' . md5(Str::uuid()), 0, 25),
            'product_id'  => 'product_3888c3b144ccdc59c',//déjeuner
            'day'                   => 'monday',
            'hour_start'            => '10:30:00',
            'hour_end'              => '14:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('pa_' . md5(Str::uuid()), 0, 25),
            'product_id'  => 'product_8a72e4d0f1fd12d03',//déjeuner
            'day'                   => 'monday',
            'hour_start'            => '08:00:00',
            'hour_end'              => '18:00:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::connection('data')->table('products_availabilities')->insert([
            'id'                    => substr('pa_' . md5(Str::uuid()), 0, 25),
            'product_id'  => 'product_4c053842dc07c0330',//déjeuner
            'day'                   => 'monday',
            'hour_start'            => '18:00:00',
            'hour_end'              => '23:30:00',
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);
    }
}
