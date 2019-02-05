<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'nickname', 'phone', 'email', 'origin', 'remarks'
    ];
}
