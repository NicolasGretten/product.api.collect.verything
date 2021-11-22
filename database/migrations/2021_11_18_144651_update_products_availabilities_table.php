<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products_availabilities', function($table)
        {
            $table->json('days')->nullable()->change();
            $table->time('hour_start')->nullable()->change();
            $table->time('hour_end')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_availabilities', function($table)
        {
            $table->json('days')->nullable(false)->change();
            $table->time('hour_start')->nullable(false)->change();
            $table->time('hour_end')->nullable(false)->change();
        });
    }
}
