<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompositeProductsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composite_products_translations', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('composite_product_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('text');
            $table->unique(['id','composite_product_id','locale']);
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
        Schema::dropIfExists('composite_products_translations');
    }
}
