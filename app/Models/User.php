<?php

namespace App\Models;

use App\Enums\BlockStatus;
use App\Enums\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getImageAttribute()
    {
        return asset('default/user.webp');
    }

    public function getMyStatusAttribute()
    {
        if ($this->status == Status::PENDING) :
            return '<span class="badge badge-warning">Pending</span>';
        elseif ($this->status == Status::ACTIVE) :
            return '<span class="badge badge-success">Approved</span>';
        else :
            return '<span class="badge badge-danger">Rejected</span>';
        endif;
    }
    
    public function getMyBlockStatusAttribute()
    {
        if ($this->block_status == BlockStatus::UNBLOCK) :
            return '<span class="badge badge-warning">Unblock</span>';
        else :
            return '<span class="badge badge-danger">Block</span>';
        endif;
    }
}
