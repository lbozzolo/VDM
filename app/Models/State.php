<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'stateable_id', 'stateable_type',
    ];
}
