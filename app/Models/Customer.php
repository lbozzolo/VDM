<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'head', 'email', 'url', 'address', 'phone', 'cuit', 'cuil', 'remarks'
    ];
}
