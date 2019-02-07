<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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


    public function getPaymentDateAttribute()
    {
        return Carbon::parse($this->payment_date)->format('d/m/Y');
    }

    public function expiration()
    {
        return ($this->expiration_alert)? $this->expiration_alert.'/'.Carbon::now()->format('m/Y') : '-';
    }

    public function nextExpiration()
    {
        return ($this->expiration_alert)? $this->expiration_alert.'/'.Carbon::now()->addMonth()->format('m/Y') : '-';
    }

    // Relationships

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
