<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiscussionChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_chat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_discussion');
            $table->longtext('chat')->nullable();
            $table->longtext('dir')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->nullable();
            $table->foreign('id_discussion')->references('id')->on('discussions')->nullable();
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
        Schema::dropIfExists('discussion_chat');
    }
}
