<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMaster extends Model
{
    use HasFactory;
    protected $guarded = [];
      public function sup()
    {
        return $this->hasOne(Supplier::class, 'id', 'id_supplier');
    }
      public function pejabatppk()
    {
        return $this->hasOne(Pejabat::class, 'id', 'ppk');
    }
}
