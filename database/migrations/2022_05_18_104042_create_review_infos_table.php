<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_info', function (Blueprint $table) {
            $table->id('review_idx');
            $table->string('user_id', 20);
            $table->unsignedBigInteger('shop_idx');
            $table->text('review_content');
            $table->float('review_star');
            $table->dateTime('date_created');
            $table->dateTime('modified_date')->nullable(true);

            $table->foreign('user_id')->references('user_id')->on('user_info')->onDelete('cascade');
            $table->foreign('shop_idx')->references('shop_idx')->on('shop_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_infos');
    }
};
