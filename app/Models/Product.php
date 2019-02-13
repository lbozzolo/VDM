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
        'name', 'fee', 'ip', 'username', 'password', 'port', 'processor', 'ram', 'storage', 'connectivity', 'direct_admin', 'backbone_shared', 'so', 'additional_bandwidth', 'admin_access', 'storage_backup', 'type', 'supplier_id'
    ];
}
