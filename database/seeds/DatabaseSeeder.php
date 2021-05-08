<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('CategoriesSeeder');
        $this->call('CategoriesTranslationsSeeder');
        $this->call('ProductsSeeder');
        $this->call('CompositeProductsSeeder');
        $this->call('ProductsAvailabilitiesSeeder');
        $this->call('ProductsCategoriesSeeder');
        $this->call('ProductsPricesSeeder');
        $this->call('ProductsTranslationsSeeder');
        $this->call('CompositeProductsAvailabilitiesSeeder');
        $this->call('CompositeProductsCategoriesSeeder');
        $this->call('CompositeProductsPricesSeeder');
        $this->call('CompositeProductsProductsSeeder');
        $this->call('CompositeProductsTranslationsSeeder');
        $this->call('PromotionalCodesSeeder');
        $this->call('PromotionalCodesTranslationsSeeder');
        $this->call('DiscountsSeeder');
        $this->call('DiscountsTranslationsSeeder');
        $this->call('ProductsTemplatesSeeder');
        $this->call('ProductsTemplatesTranslationsSeeder');
    }
}
