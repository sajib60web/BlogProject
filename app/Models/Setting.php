<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getLogoAttribute()
    {
        if (file_exists($this->app_logo)) {
            return asset($this->app_logo);
        } else {
            return asset('assets/frontend/media/logo-dark.svg');
        } 
    }
    public function getIconAttribute()
    {
        if (file_exists($this->app_favicon)) {
            return asset($this->app_favicon);
        } else {
            return asset('assets/frontend/media/favicon.svg');
        } 
    }
}
