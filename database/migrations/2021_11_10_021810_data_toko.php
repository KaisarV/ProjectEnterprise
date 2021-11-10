<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataToko extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_toko', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->string('kota_toko');
            $table->string('email_toko');
            $table->string('nomor_telepon');
            $table->string('alamat_toko');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_toko');
    }
}
