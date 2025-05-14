<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Assessment extends Model
{
       use HasFactory;

    protected $fillable = [
        'name', 
        'description',
         'status', 
         'link',
         'user_id',
    ];

}
