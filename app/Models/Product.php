<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'fee', 'ip', 'username', 'password', 'port', 'supplier_id'
    ];
}
