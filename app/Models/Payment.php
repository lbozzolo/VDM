<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fee', 'deposit', 'project_id'
    ];
}
