<?php

namespace App\Models;

use \Illuminate\Support\Str;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\fileExists;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(Upload::class, 'image_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && fileExists($this->image->original)) :
            return asset($this->image->original['original']);
        else :
            return asset('default/default-730x400.png');
        endif;
    }

    public function getMyStatusAttribute()
    {
        if ($this->status == Status::PUBLISH) :
            return '<span class="badge badge-success bg-success">Published</span>';
        elseif ($this->status == Status::UNPUBLISH) :
            return '<span class="badge badge-danger bg-danger">Unpublished</span>';
        endif;
    }

    public function getMyVisibilityAttribute()
    {
        $visibility = '';

        $columns = ['treding_topic','top_stories','latest_stories_main', 'latest_stories_sub', 'latest_stories_right_main', 'latest_stories_right_sub','breaking','slider','short_stories','main_frame',
        'main_frame_slider','top_video_main','top_video_recommended',
        'top_video_latest','recent_article'];
        foreach ($columns as   $value) {
            if ($this->$value == 1) :
                $visibility .= '<span class="badge badge-info bg-info">' . Str::headline($value) . '</span>';
            endif;
        }
        return $visibility;
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

  public function comments(){
    return $this->hasMany(Comment::class,'post_id','id')->whereNull('comment_id');
  }

  public function scopePublished($query){
        $query->where('status',Status::PUBLISH);
  }

}
