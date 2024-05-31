<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'description',
        'download_status',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    public function getMyDownloadStatusAttribute()
    {
        if ($this->download_status == 1) :
            return '<span class="badge badge-success bg-success">Yes</span>';
        elseif ($this->download_status == 2) :
            return '<span class="badge badge-danger bg-danger">No</span>';
        endif;
    }

    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
