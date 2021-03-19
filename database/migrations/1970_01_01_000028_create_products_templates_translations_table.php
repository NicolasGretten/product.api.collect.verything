<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTemplatesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_templates_translations', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('product_template_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('text');
            $table->unique(['id','product_template_id','locale']);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('product_template_id')->references('id')->on('products_templates')
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
        Schema::dropIfExists('products_templates_translations');
    }
}
