<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('access_users', function (Blueprint $table) {
            $table->id();
            $table->string('access_token');
            $table->dateTime('last_access')->nullable(true);
            $table->timestamps();

            $table->unique('access_token');
        });

        DB::table('access_users')
            ->insert([
                'id' => NULL,
                'access_token' => base64_encode(hash('sha256', 'access_token', 'true')),
                'last_access' => NULL,
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_users');
    }
};
