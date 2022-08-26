<?php

namespace App\Models;

use App\Models\Objectif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class indicateurU extends Model
{
    use HasFactory;
    protected $table='indicateur_u_s';
    protected $fillable=[
        'intitule_score', 'valeur_score'
    ];
    public function objectif(){
        return $this->belongsTo(Objectif::class);
    }

}
