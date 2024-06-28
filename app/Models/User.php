<?php

namespace App\Models;

use App\Enums\BlockStatus;
use App\Enums\Status;
use App\Enums\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
        'user_type',
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

    public function scopeIsAdmin($query)
    {
        $query->where('user_type', UserType::ADMIN);
    }
    
    public function scopeIsUser($query)
    {
        $query->where('user_type', UserType::USER);
    }

    public static function getPermissionGroups()
    {
        $permission_groups = DB::table('permissions')
            ->select('group_name as name')
            ->groupBy('group_name')
            ->orderBy('id')
            ->get();
        return $permission_groups;
    }

    public static function getPermissionsByGroupName($group_name)
    {
        $permissions = DB::table('permissions')
            ->select('name', 'id')
            ->where('group_name', $group_name)
            ->get();
        return $permissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;
        foreach ($permissions as $permission) {
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
        }
        return $hasPermission;
    }

    public function getImageAttribute()
    {
        if ($this->picture && file_exists($this->picture)) :
            return asset($this->picture);
        else :
            return asset('default/user.webp');
        endif;
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
