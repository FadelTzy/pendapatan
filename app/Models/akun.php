<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'akun';
    public function mDetail()
    {
        return $this->hasMany(detailAkun::class, 'idakun', 'id');
    }
}
