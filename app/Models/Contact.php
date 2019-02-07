<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'address', 'phone', 'remarks'
    ];

    public function getFullnameAttribute()
    {
        return $this->name.' '.$this->last_name;
    }

    // Relationships

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'contacts_projects');
    }

}
