<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DiscountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('discounts')->insert([
            'id'            => 'discount_fffbae84a65baa0a',
            'discount_type' => 'eur',
            'amount'        => '50',
            'start_at'      => '2021-05-05 00:00:00',
            'end_at'        => '2021-05-25 00:00:00',
            'promotional_code_id'   => null,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('discounts')->insert([
            'id'            => 'discount_34acc06c4ccd5022',
            'discount_type' => 'pourcent',
            'amount'        => '10',
            'start_at'      => '2021-05-05 00:00:00',
            'end_at'        => '2021-05-25 00:00:00',
            'promotional_code_id'   => 'promocode_17d78ae0a3bfb0a',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
    }
}
