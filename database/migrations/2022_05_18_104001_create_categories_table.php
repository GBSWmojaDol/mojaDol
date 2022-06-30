<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->integer('category_num')->primary();
            $table->string('category_name', 50);
        });

        DB::table('category')->insert([
            ['category_num' => 1, 'category_name' => '일식'],
            ['category_num' => 2, 'category_name' => '중식'],
            ['category_num' => 3, 'category_name' => '치킨'],
            ['category_num' => 4, 'category_name' => '밥류'],
            ['category_num' => 5, 'category_name' => '디저트'],
            ['category_num' => 6, 'category_name' => '피자'],
            ['category_num' => 7, 'category_name' => '양식'],
            ['category_num' => 8, 'category_name' => '아시안'],
            ['category_num' => 9, 'category_name' => '야식'],
            ['category_num' => 10, 'category_name' => '고기'],
            ['category_num' => 11, 'category_name' => '패스트푸드'],
            ['category_num' => 12, 'category_name' => '보쌈'],
            ['category_num' => 13, 'category_name' => '기타']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
