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
        Schema::create('shop_good', function (Blueprint $table) {
            $table->unsignedBigInteger('shop_idx');
            $table->string('user_id', 20);

            $table->primary(['shop_idx', 'user_id']);
            $table->foreign('shop_idx')->references('shop_idx')->on('shop_info')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('shop_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_goods');
    }
};
