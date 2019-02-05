<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'project_id'
    ];
}
