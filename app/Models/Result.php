<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
   protected $fillable = [
    'user_id',
    'recommended_strand',
    'personality_type',
    'description',
    'result',
    'date_taken',
    'status'
    
];

}
