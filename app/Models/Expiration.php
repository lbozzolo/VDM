<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Expiration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'project_id', 'fee', 'payment_date', 'expiration_alert', 'remarks'
    ];
}
