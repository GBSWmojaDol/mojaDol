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
        Schema::create('review_img', function (Blueprint $table) {
            $table->id('img_idx');
            $table->unsignedBigInteger('review_idx');
            $table->string('non_chaname', 100)->nullable(true);
            $table->string('img_filename', 100)->nullable(true);
            $table->string('img_address', 100)->nullable(true);

            $table->foreign('review_idx')->references('review_idx')->on('review_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_imgs');
    }
};
