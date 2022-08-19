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
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');

            $table->string('name');
            $table->string('email');

            $table->string('zip_code');
            $table->string('street');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('state');
        });

        Schema::table('peoples', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peoples');
    }
};
