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
        'name', 'last_name', 'username', 'head', 'email', 'url', 'address', 'phone', 'cuit', 'cuil', 'remarks', 'agent_id'
    ];

    public function getFullnameAttribute()
    {
        return ($this->name || $this->last_name)? $this->name.' '.$this->last_name : null;
    }

    public function getFullnameUsernameAttribute()
    {
        $username = ($this->username )? $this->username : null;
        $fullname = ($this->fullname )? $this->fullname : null;
        if ($username && $fullname) {
            $response = $username.' ('.$fullname.') ';
        } elseif ($username && !$fullname) {
            $response = $username;
        } elseif (!$username && $fullname) {
            $response = $fullname;
        }

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

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

}
