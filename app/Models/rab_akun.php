<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_akun extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mDetail()
    {
        return $this->hasMany(rab_detail::class, 'id_rab_akun', 'id');
    }
    public function mD()
    {
        return $this->hasMany(detailAkun::class, 'idakun', 'id_akun');
    }
    public function mBku()
    {
        return $this->hasMany(bku::class, 'akun', 'id');
    }
    public function mBkuu()
    {
        return $this->hasMany(bku::class, 'akun', 'id');
    }
    public function oRabsub()
    {
        return $this->hasOne(rab_sub::class, 'id', 'id_rab_sub');
    }
    public function oRspp()
    {
        return $this->hasOne(rspp::class, 'id_rab_akun', 'id')->latest();
    }
}
