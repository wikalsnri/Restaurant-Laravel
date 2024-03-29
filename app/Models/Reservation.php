<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    
    public function meja()
     {
         return $this->belongsTo(Meja::class, 'id_meja', 'id');
     }
}
