<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSpp extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function revisi()
    {
        return $this->hasOne(rab_kekro::class, 'id_revisi', 'id_revisi');
    }
    public function oMaster()
    {
        return $this->hasOne(RiwayatMaster::class, 'id_riwayat_spp', 'id');
    }
    public function oRevisi()
    {
        return $this->hasOne(RiwayatRevisi::class, 'id', 'id_revisi');
    }
    public function oUp()
    {
        return $this->hasOne(up::class, 'idriwayat', 'id');
    }
    public function pembayaran()
    {
        return $this->hasMany(rspp::class, 'id_revisi', 'id_riwayat_spp');
    }
}
