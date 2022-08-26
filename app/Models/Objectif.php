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

    protected $fillable = [
        'intitule_obj','intitule_eval'
    ];

    public function assignation_objectifs(){
        return $this->hasMany(assignation_objectif::class);
    }

    public function moyens(){
        return $this->hasMany(moyen::class);
    }
    public function taux_achevements(){
        return $this->hasOne(taux_achevement::class);
    }
    public function indicateurUs(){
        return $this->hasOne(indicateurU::class);
    }

}
