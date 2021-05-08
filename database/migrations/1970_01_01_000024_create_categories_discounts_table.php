<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_discounts', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('category_id');
            $table->string('discount_id');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('restrict');

            $table->foreign('discount_id')->references('id')->on('discounts')
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
        Schema::dropIfExists('categories_discounts');
    }
}
