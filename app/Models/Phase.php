<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
