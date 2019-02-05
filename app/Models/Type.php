<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'typeable_id', 'typeable_type'
    ];
}
