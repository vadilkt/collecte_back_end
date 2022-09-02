<?php

namespace App\Models;

use App\Models\moyen;
use App\Models\indicateurU;
use App\Models\taux_achevement;
use App\Models\assignation_objectif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Objectif extends Model
{
    use HasFactory;
    protected $table='objectif';
    protected $guarded=[];

    public function assignation_objectifs(){
        return $this->hasMany(assignation_objectif::class, 'objectif_id');
    }
   
    public function indicateurUs(){
        return $this->hasOne(indicateurU::class, 'objectif_id');
    }

}
