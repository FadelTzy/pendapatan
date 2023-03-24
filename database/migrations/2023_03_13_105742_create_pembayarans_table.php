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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->string('kota')->nullable();
            $table->string('nim')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('bulan')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('jenis')->nullable()->comment('1spp 2maba pps 3 mandiri 3 profesi 5kkn');
            $table->string('biaya')->nullable();
            $table->string('tahun_akademik')->nullable();
            $table->string('sms')->nullable();

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
        Schema::dropIfExists('pembayarans');
    }
};
