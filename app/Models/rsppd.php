<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rsppd extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rabdetail()
    {
        return $this->hasOne(rab_detail::class, 'id', 'id_rab_detail');
    }
    public function oPajak()
    {
        return $this->hasOne(pajakSpp::class, 'id_rsppd', 'id');
    }

}
