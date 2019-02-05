<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'fee', 'period', 'deadline', 'remarks', 'phase_id', 'customer_id', 'user_id'
    ];
}
