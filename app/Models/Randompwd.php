<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randompwd extends Model
{
    // use HasFactory;
    protected $table = 'randompwd';
    protected $fillable = ['pwd'];
}
