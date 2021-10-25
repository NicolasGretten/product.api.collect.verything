<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_bcc3b36c2dd0ae4a1c57c',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_1ddf322d0c198c29b50ce',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_d10be1a57a0fddafc85b5',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_3a61a9ed91efe584ca27c',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_3a61a9ed91efe584ca29c',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_3a61a9ed91efe584ca29z',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_3a61a9ed91efe584ca29x',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        DB::connection('data')->table('categories')->insert([
            'id'            => 'cat_8a61a9ed91efe584ca29z',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
    }
}
