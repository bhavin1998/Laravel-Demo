<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PostController;

class post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['user_id','title','post_image','body'];

    public function User(){
        return $this->belongsTo(Userroles::class);
    }
}
