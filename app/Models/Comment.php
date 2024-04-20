<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function childrenComments()
    {
        return $this->hasMany(Static::class,'comment_id','id');
    }
}
