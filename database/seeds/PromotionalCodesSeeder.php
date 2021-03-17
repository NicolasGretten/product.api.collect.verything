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
            'number_used'               => '0',
            'maximum_usage'             => '1',
            'combinable_with_offers'    => 'false',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('promotional_codes')->insert([
            'id'                        => 'promocode_779cf772199954f',
            'code'                      => 'PROMO50',
            'number_used'               => '0',
            'maximum_usage'             => '1',
            'combinable_with_offers'    => 'true',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);
    }
}
