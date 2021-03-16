<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('discount_type');
            $table->string('promotional_code_id')->nullable();
            $table->integer('amount');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
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
        Schema::dropIfExists('discounts');
    }
}
