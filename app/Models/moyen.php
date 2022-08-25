<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class moyen extends Model
{
    use HasFactory;
    protected $fillable=[
        'intitule_moyen'
    ];
    public function objectif(){
        return $this->belongsTo(Objectif::class);
    }
}
