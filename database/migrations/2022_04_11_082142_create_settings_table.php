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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_app')->nullable();
            $table->string('nama_aplikasi')->nullable();
            $table->string('email')->nullable();
            $table->string('desc')->nullable();
            $table->string('lembaga')->nullable();
            $table->string('kode_lembaga')->nullable();
            $table->string('unit')->nullable();
            $table->string('satker')->nullable();
            $table->string('kode_satker')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('kode_lokasi')->nullable();
            $table->string('logo')->nullable();
            $table->string('tempat')->nullable();
            $table->string('kode_tempat')->nullable();
            $table->string('alamat')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('nip')->nullable();
            $table->string('kp')->nullable();
            $table->string('kppn')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
