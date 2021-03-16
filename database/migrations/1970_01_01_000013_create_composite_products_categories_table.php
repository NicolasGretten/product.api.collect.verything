<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompositeProductsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composite_products_categories', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('composite_product_id');
            $table->string('category_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('composite_product_id')->references('id')->on('composite_products')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('composite_products_categories');
    }
}
