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
    public function getImageVideoAttribute(){
        if($this->post_type == PostType::ARTICLE):
            if($this->image && fileExists($this->image->original)):
                return $this->image->original['original'];
            else:
                return '';
            endif;
        else:
            return $this->video_url;
        endif;
    }
    public function getMyStatusAttribute(){
        if($this->status == Status::ACTIVE):
            return '<span class="badge badge-success">Active</span>';
        else:
            return '<span class="badge badge-danger">Inactive</span>';
        endif;
    }
}
