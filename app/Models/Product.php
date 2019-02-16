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
        'name', 'fee', 'ip_address', 'ip_class', 'username', 'password', 'port', 'processor', 'ram', 'storage', 'connectivity', 'direct_admin', 'backbone_shared', 'so', 'additional_bandwidth', 'admin_access', 'storage_backup', 'type', 'supplier_id'
    ];

    public function getProcessorParseAttribute()
    {
        return config('system.servers.processor.'.$this->attributes['processor']);
    }

    public function getRamParseAttribute()
    {
        return config('system.servers.ram.'.$this->attributes['ram']);
    }

    public function getStorageParseAttribute()
    {
        return config('system.servers.storage.'.$this->attributes['storage']);
    }

    public function getConnectivityParseAttribute()
    {
        return config('system.servers.connectivity.'.$this->attributes['connectivity']);
    }

    public function getDirectAdminParseAttribute()
    {
        return config('system.servers.direct_admin.'.$this->attributes['direct_admin']);
    }

    public function getBackboneSharedParseAttribute()
    {
        return config('system.servers.backbone_shared.'.$this->attributes['backbone_shared']);
    }

    public function getSoParseAttribute()
    {
        return config('system.servers.so.'.$this->attributes['so']);
    }

    public function getAdditionalBandwidthParseAttribute()
    {
        return config('system.servers.additional_bandwidth.'.$this->attributes['additional_bandwidth']);
    }

    public function getAdminAccessParseAttribute()
    {
        return config('system.servers.admin_access.'.$this->attributes['admin_access']);
    }

    public function getStorageBackupParseAttribute()
    {
        return config('system.servers.storage_backup.'.$this->attributes['storage_backup']);
    }

    public function getTypeParseAttribute()
    {
        return config('system.servers.type.'.$this->attributes['type']);
    }

    // Relationships

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
