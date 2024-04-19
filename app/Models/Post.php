<?php

namespace App\Models;

use App\Enums\PostType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\fileExists;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category (){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(Category::class,'sub_category_id','id');
    }

    public function image(){
        return $this->belongsTo(Upload::class,'image_id','id');
    }
    public function getImageUrlAttribute(){
        if($this->image && fileExists($this->image->original)):
            return asset($this->image->original['original']);
        else:
            return asset('default/default-730x400.png');
        endif;

    }
    public function getMyStatusAttribute(){
        if($this->status == Status::PUBLISH):
            return '<span class="badge badge-success">Published</span>';
        elseif($this->status == Status::UNPUBLISH):
            return '<span class="badge badge-danger">Unpublished</span>';
        endif;
    }

    public function getMyVisibilityAttribute(){
        $visibility = '';
        $columns = ['treding_topic','stories','breaking','recommended'];
        foreach ($columns as   $value) {
            if($this->$value == 1):
                $visibility .= '<span class="badge badge-info">'.\Str::headline($value) .'</span>';
            endif;
        }
        return $visibility;
    }
}
