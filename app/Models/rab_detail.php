<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_detail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mRsppd()
    {
        return $this->hasMany(rsppd::class, 'id_rab_detail', 'id');
    }
    public function oAkun()
    {
        return $this->hasOne(rab_akun::class, 'id', 'id_rab_akun');

    }
    public function mD()
    {
        return $this->hasOne(detailAkun::class, 'id', 'id_cabang');
    }

}
