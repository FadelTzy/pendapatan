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
        Schema::create('riwayat_masters', function (Blueprint $table) {
            $table->id();
            $table->string('id_riwayat_spp')->nullable();
            $table->string('id_supplier')->nullable();
            $table->string('ppk')->nullable();
            $table->string('sifat_pembayaran')->nullable(); //infospp
            $table->string('jenis_pembayaran')->nullable();
            $table->string('kp')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('dasar_pembayaran')->nullable();

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
        Schema::dropIfExists('riwayat_masters');
    }
};
