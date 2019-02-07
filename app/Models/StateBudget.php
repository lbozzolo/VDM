<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class StateBudget extends Model
{
    protected $table = 'states_budgets';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'created_at', 'updated_at',
    ];

    // Relationships

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }
}
