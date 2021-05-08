<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompositeProductsPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composite_products_prices', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('composite_product_id');
            $table->integer('price_including_taxes');
            $table->integer('price_excluding_taxes');
            $table->integer('vat_value');
            $table->integer('vat_rate');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('composite_product_id')->references('id')->on('composite_products')
                ->onDelete('cascade')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('composite_products_prices');
    }
}
