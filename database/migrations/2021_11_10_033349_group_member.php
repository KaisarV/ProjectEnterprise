<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussion_member', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_discussion');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->nullable();
            $table->foreign('id_discussion')->references('id')->on('chat_discussions')->nullable();
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
        Schema::dropIfExists('discussion_member');
    }
}
