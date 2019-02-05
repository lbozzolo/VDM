<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fee', 'payment_method', 'model_file', 'project_id',
    ];
}
