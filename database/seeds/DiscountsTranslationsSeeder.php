<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DiscountsTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('discounts_translations')->insert([
            'id'            => substr('discounttrad_' . md5(Str::uuid()), 0, 25),
            'discount_id'   => 'discount_fffbae84a65baa0a',
            'locale'        => 'fr-FR',
            'title'         => 'traduction française',
            'text'          => 'promo d\'haloween',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('discounts_translations')->insert([
            'id'            => substr('discounttrad_' . md5(Str::uuid()), 0, 25),
            'discount_id'   => 'discount_fffbae84a65baa0a',
            'locale'        => 'en-US',
            'title'         => 'English translation',
            'text'          => 'haloween discount',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('discounts_translations')->insert([
            'id'            => substr('discounttrad_' . md5(Str::uuid()), 0, 25),
            'discount_id'   => 'discount_34acc06c4ccd5022',
            'locale'        => 'fr-FR',
            'title'         => 'traduction française',
            'text'          => 'promo d\'été',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('discounts_translations')->insert([
            'id'            => substr('discounttrad_' . md5(Str::uuid()), 0, 25),
            'discount_id'   => 'discount_34acc06c4ccd5022',
            'locale'        => 'en-US',
            'title'         => 'English translation',
            'text'          => 'Summer discount',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
    }
}
