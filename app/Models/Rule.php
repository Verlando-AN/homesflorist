<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'rule', 'disease_id'];

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }
}
