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
        Schema::create('shop_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_idx');
            $table->string('menu_name');
            $table->string('menu_price');
            $table->string('original_img_name');
            $table->string('img_name');
            $table->string('img_address');
            $table->timestamps();

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
        Schema::dropIfExists('shop_menu');
    }
};
