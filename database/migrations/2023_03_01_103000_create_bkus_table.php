<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bkus', function (Blueprint $table) {
            $table->id();
            $table->string('akun')->nullable();
            $table->string('detail')->nullable();

            $table->string('rkakl')->nullable();
            $table->string('bulan')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('status')->nullable()->commet('1 masuk 2 keluar');
            $table->string('nilai')->nullable();
            $table->string('uraian')->nullable();
            $table->string('no_bukti')->nullable();
            $table->string('keterangan')->nullable();

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('bkus');
    }
};
