<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;
use Vdm\User;
use Carbon\Carbon;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'fee', 'period', 'deadline', 'remarks', 'phase_id', 'customer_id', 'owner_id','user_id'
    ];

    public function getDeadlineDateAttribute()
    {
        return Carbon::parse($this->deadline)->format('d/m/Y');
    }

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function feeApprovedBudget()
    {
        $approved = $this->budgets->filter(function ($item) {
            return $item->state->slug == 'aprobado';
        })->first();

        $response = ($approved)? $approved->fee : null;

//        if(substr($response, -3) == '000')
//            $response = substr_replace($response,"k",-3);

        return $response;
    }

    // Relationships

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function expirations()
    {
        return $this->hasMany(Expiration::class);
    }

    public function images()
    {
        return $this->morphMany('Vdm\Models\Image', 'imageable');
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contacts_projects');
    }

}
