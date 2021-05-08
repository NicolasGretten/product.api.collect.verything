<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalCodesTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_codes_translations', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('promotional_code_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('text');
            $table->unique(['id','promotional_code_id','locale']);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('promotional_code_id')->references('id')->on('promotional_codes')
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
        Schema::dropIfExists('promotional_codes_translations');
    }
}
