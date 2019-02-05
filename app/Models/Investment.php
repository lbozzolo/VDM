<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fee', 'project_id'
    ];
}
