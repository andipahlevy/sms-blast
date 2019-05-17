<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNexmo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nexmo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NEXMO_API_KEY',100)->nullable();
            $table->string('NEXMO_API_SECRET',100)->nullable();
            $table->string('remaining_balance',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nexmo');
    }
}
