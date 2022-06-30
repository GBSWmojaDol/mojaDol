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
        Schema::create('shop_info', function (Blueprint $table) {
            $table->id('shop_idx')->index('shop_name');
            $table->string('user_id', 20);
            $table->string('shop_name', 100);
            $table->string('shop_addr', 100)->nullable(true);
            $table->string('shop_addr2', 20)->nullable(true);
            $table->integer('category_num');
            $table->char('tel_num1', 4)->nullable(true);
            $table->char('tel_num2', 4)->nullable(true);
            $table->char('tel_num3', 4)->nullable(true);
            $table->boolean('package_bool')->nullable(true);
            $table->boolean('toilet_bool')->nullable(true);
            $table->boolean('internet_bool')->nullable(true);
            $table->boolean('reserv_bool')->nullable(true);
            $table->string('site_addr', 100)->nullable(true);
            $table->dateTime('write_day');
            $table->dateTime('edit_day')->nullable(true);

            $table->foreign('user_id')->references('user_id')->on('user_info')->onDelete('cascade');
            $table->foreign('category_num')->references('category_num')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_infos');
    }
};
