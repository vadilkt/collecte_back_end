<?php

namespace App\Models;

use App\Models\Objectifs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class assignation_objectif extends Model
{
    use HasFactory;
    protected $table = 'assignation_objectif';
    protected $guarded = ['id'];

    public function objectif()
    {
        return $this->belongsTo(Objectif::class, 'objectif_id');
    }
    
}
