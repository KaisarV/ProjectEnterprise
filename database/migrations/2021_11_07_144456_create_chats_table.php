<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengirim')->nullable();
            $table->unsignedBigInteger('id_penerima')->nullable();
            $table->string('chat')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->foreign('id_pengirim')->references('id')->on('users')->nullable();
            $table->foreign('id_penerima')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists('chats');
    }
}
