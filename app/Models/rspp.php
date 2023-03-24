<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rspp extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rSpp()
    {
        return $this->hasOne(RiwayatSpp::class, 'id', 'id_riwayat_spp');
    }
    public function akun()
    {
        return $this->hasOne(rab_akun::class, 'id', 'id_rab_akun');
    }
    public function rsppd()
    {
        return $this->hasMany(rsppd::class, 'id_rspp', 'id');
    }
}
