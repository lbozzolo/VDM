<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
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

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contacts_customers');
    }

}
