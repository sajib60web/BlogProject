<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getMyStatusAttribute()
    {
        if ($this->status == Status::ACTIVE) {
            return '<span class="badge rounded-pill badge-success">Active</span>';
        } elseif ($this->status == Status::INACTIVE) {
            return '<span class="badge rounded-pill badge-danger">Inactive</span>';
        }
    }
}
