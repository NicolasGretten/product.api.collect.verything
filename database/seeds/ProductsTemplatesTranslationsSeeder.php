<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductsTemplatesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('data')->table('products_templates_translations')->insert([
            'id'                                => substr('prodtemplatetrad_' . md5(Str::uuid()), 0, 25),
            'product_template_id'               => 'prodtemplate_3a3d84898a',
            'locale'                            => 'fr-FR',
            'title'                             => 'Traduction en français',
            'text'                              => 'Boisson 01',
            'created_at'                        => Carbon::now(),
            'updated_at'                        => Carbon::now(),
            'deleted_at'                        => Null
        ]);

        DB::connection('data')->table('products_templates_translations')->insert([
            'id'                                => substr('prodtemplatetrad_' . md5(Str::uuid()), 0, 25),
            'product_template_id'               => 'prodtemplate_3a3d84898a',
            'locale'                            => 'en-US',
            'title'                             => 'English translation',
            'text'                              => 'Drink 01',
            'created_at'                        => Carbon::now(),
            'updated_at'                        => Carbon::now(),
            'deleted_at'                        => Null
        ]);

        DB::connection('data')->table('products_templates_translations')->insert([
            'id'                                => substr('prodtemplatetrad_' . md5(Str::uuid()), 0, 25),
            'product_template_id'               => 'prodtemplate_3a3d84897b',
            'locale'                            => 'fr-FR',
            'title'                             => 'Traduction en français',
            'text'                              => 'Nourriture 01',
            'created_at'                        => Carbon::now(),
            'updated_at'                        => Carbon::now(),
            'deleted_at'                        => Null
        ]);

        DB::connection('data')->table('products_templates_translations')->insert([
            'id'                                => substr('prodtemplatetrad_' . md5(Str::uuid()), 0, 25),
            'product_template_id'               => 'prodtemplate_3a3d84897b',
            'locale'                            => 'en-US',
            'title'                             => 'English translation',
            'text'                              => 'Food 01',
            'created_at'                        => Carbon::now(),
            'updated_at'                        => Carbon::now(),
            'deleted_at'                        => Null
        ]);
    }
}
