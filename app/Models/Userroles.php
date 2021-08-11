<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\UserrolesController;

class Userroles extends Model
{
    use HasFactory;
    protected $table = 'userrole';
    protected $fillable = ['name','description'];
    protected $guarded =[];

}
