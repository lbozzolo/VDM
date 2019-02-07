<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'username', 'head', 'email', 'url', 'address', 'phone', 'cuit', 'cuil', 'remarks'
    ];

    public function getFullnameAttribute()
    {
        return $this->name.' '.$this->last_name;
    }

    public function getFullnameUsernameAttribute()
    {
        $response = ($this->username)? $this->name.' '.$this->last_name.' ( '.$this->username.' )' : $this->name.' '.$this->last_name;
        return $response;
    }

    // Relationships

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
