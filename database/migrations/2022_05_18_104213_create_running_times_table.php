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
        Schema::create('running_time', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_idx');
            $table->integer('day_num');
            $table->string('open_time', 10);
            $table->string('close_time', 10);

            $table->primary(['shop_idx', 'day_num']);
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
        Schema::dropIfExists('running_times');
    }
};
