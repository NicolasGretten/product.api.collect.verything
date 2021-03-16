<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PromotionalCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');

        DB::connection('data')->table('promotional_codes')->insert([
            'id'                        => 'promocode_17d78ae0a3bfb0a',
            'code'                      => 'PROMO10',
            'start_at'                  => '2021-03-15 00:00:00',
            'end_at'                    => null,
            'amount'                    => '150',
            'number_used'               => '0',
            'maximum_usage'             => '1',
            'combinable_with_offers'    => 'false',
            'promotional_code_type'     => 'pourcent',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('promotional_codes')->insert([
            'id'                        => 'promocode_779cf772199954f',
            'code'                      => 'PROMO50',
            'start_at'                  => '2021-03-20 00:00:00',
            'end_at'                    => '2021-03-30 00:00:00',
            'amount'                    => '50',
            'number_used'               => '0',
            'maximum_usage'             => '1',
            'combinable_with_offers'    => 'true',
            'promotional_code_type'     => 'pourcent',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);
    }
}
