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
        Schema::create('user_info', function (Blueprint $table) {
            $table->string('user_id', 20)->primary();
            $table->string('user_pw');
            $table->string('nickname', 30)->index('idx_user');
            $table->integer('addr_num')->nullable(true);
            $table->string('user_addr', 100)->nullable(true);
            $table->string('user_addr2', 30)->nullable(true);
            $table->dateTime('register_day');
            $table->dateTime('loged_date')->nullable(true);
            $table->dateTime('edit_date')->nullable(true);
            $table->unsignedInteger('user_secession')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
};
