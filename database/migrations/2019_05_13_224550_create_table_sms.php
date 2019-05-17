<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_campaign');
            $table->string('body',200);
            $table->string('to',20);
            $table->string('message_id',255)->nullable(); 
            $table->string('message_price',255)->nullable(); 
            $table->integer('status'); 
            $table->text('desc')->nullable(); 
			$table->foreign('id_campaign')->references('id')->on('campaign');
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
        Schema::dropIfExists('sms');
    }
}
