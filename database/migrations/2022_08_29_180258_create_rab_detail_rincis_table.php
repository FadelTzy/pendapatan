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
        Schema::create('rab_detail_rincis', function (Blueprint $table) {
            $table->id();
            $table->string('id_rab_akun')->nullable();
            $table->string('id_rab_detail')->nullable();
            $table->string('id_revisi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('biaya')->nullable();
            $table->string('sisabiaya')->nullable();
            $table->string('sisavolume')->nullable();
            $table->string('realisasi')->nullable()->default(0);

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
        Schema::dropIfExists('rab_detail_rincis');
    }
};
