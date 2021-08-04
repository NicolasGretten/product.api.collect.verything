<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_bcc3b36c2dd0ae4a1c57c',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Abonnement',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_bcc3b36c2dd0ae4a1c57c',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Subscription',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_1ddf322d0c198c29b50ce',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'Boisson',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_1ddf322d0c198c29b50ce',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Drinks',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_d10be1a57a0fddafc85b5',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'nourriture',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_d10be1a57a0fddafc85b5',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'food',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_3a61a9ed91efe584ca27c',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'repas',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_3a61a9ed91efe584ca27c',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'Lunch',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_3a61a9ed91efe584ca29c',
            'locale'                    => 'fr-FR',
            'title'                     => 'Traduction en français',
            'text'                      => 'slots_prices',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

        DB::connection('data')->table('categories_translations')->insert([
            'id'                        => substr('cattrad_' . md5(Str::uuid()), 0, 25),
            'category_id'               => 'cat_3a61a9ed91efe584ca29c',
            'locale'                    => 'en-US',
            'title'                     => 'English Translations',
            'text'                      => 'slots_prices',
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
            'deleted_at'                => Null
        ]);

    }
}
