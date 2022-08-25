<?php

namespace App\Models;

use App\Models\Objectif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class taux_achevement extends Model
{
    use HasFactory;
    protected $fillable=[
        'taux_achevement'
    ];
    public function objectif(){
        return $this->belongsTo(Objectif::class);
    }
}