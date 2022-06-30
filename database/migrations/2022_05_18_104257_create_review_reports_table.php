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
        Schema::create('review_report', function (Blueprint $table) {
            $table->unsignedBigInteger('review_idx');
            $table->string('user_id', 20);

            $table->foreign('review_idx')->references('review_idx')->on('review_info')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('user_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_reports');
    }
};
