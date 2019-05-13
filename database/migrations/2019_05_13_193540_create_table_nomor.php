<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNomor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nomor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_anggota',255);
            $table->string('nip',255);
            $table->string('nohp',255); 
            $table->integer('id_kelompok'); 
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
        Schema::dropIfExists('nomor');
    }
}
