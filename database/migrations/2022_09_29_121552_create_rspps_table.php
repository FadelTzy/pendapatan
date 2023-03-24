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
        Schema::create('rspps', function (Blueprint $table) {
            $table->id();
            $table->string('id_rab_akun')->nullable();
            $table->string('id_kro')->nullable();
            $table->string('id_riwayat_spp')->nullable();
            $table->string('pagu')->nullable();
            $table->string('spplalu')->nullable();
            $table->string('sppini')->nullable();
            $table->string('sisadana')->nullable();

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
        Schema::dropIfExists('rspps');
    }
};
