<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotional_codes', function (Blueprint $table) {
            $table->string('id')->primary();;
            $table->string('code');
            $table->dateTime('start_at');
            $table->dateTime('end_at')->nullable();
            $table->integer('amount');
            $table->integer('number_used');
            $table->integer('maximum_usage');
            $table->boolean('combinable_with_offers');
            $table->string('promotional_code_type');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotional_codes');
    }
}
