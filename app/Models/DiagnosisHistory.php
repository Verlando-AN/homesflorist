<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiagnosisHistory extends Model
{
    protected $fillable = [
        'user_id',  
        'diagnosis_results',

    ];
    public function disease()
{
    return $this->belongsTo(Disease::class);
}

}
