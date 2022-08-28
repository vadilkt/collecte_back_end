<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class moyen extends Model
{
    use HasFactory;
    protected $table='moyen';
    protected $guarded=['id'];
    public function objectif(){
        return $this->belongsTo(indicateurU::class, 'indicateur_u_s_id');
    }
}
