<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rab_kekro extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kegiatanr()
    {
        return $this->hasOne(kegiatan::class, 'id', 'id_kegiatan');
    }
    public function kror()
    {
        return $this->hasOne(kro::class, 'id', 'id_kro');
    }
    public function mRo()
    {
        return $this->hasMany(rab_ro::class, 'id_rab_kekro', 'id');
    }
    public function mAkun()
    {
        return $this->hasMany(rspp::class, 'id_kro', 'id');
    }
    public function mAkunlalu()
    {
        return $this->hasMany(rspp::class, 'id_kro', 'id');
    }
}
