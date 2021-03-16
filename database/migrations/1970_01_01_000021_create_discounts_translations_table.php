<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts_translations', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('discount_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('text');
            $table->unique(['id','discount_id','locale']);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('discounts_translations');
    }
}
