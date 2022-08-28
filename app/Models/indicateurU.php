<?php

namespace App\Models;

use App\Models\Objectif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class indicateurU extends Model
{
    use HasFactory;
    protected $table = 'indicateur_u_s';
    protected $guarded = ['id'];
    public function objectif()
    {
        return $this->belongsTo(Objectif::class, 'objectif_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function moyens(){
        return $this->hasMany(moyen::class, 'indicateur_u_s_id');
    }

}
