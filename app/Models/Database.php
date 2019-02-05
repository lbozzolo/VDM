<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'project_id',
    ];
}
