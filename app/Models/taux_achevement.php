<?php

namespace App\Models;

use App\Models\Objectif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class taux_achevement extends Model
{
    use HasFactory;
    protected $table='taux_achevements';
    protected $guarded=['id'];
    public function objectif(){
        return $this->belongsTo(Objectif::class);
    }
    public function indicateur(){
        return $this->belongsTo(indicateurU::class);
    }

    public function assignation(){
        return $this->belongsTo(assignation_objectif::class);
    }
}