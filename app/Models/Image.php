<?php

namespace Vdm\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path', 'imageable_id', 'imageable_type', 'type', 'main', 'remarks'
    ];

    //Relationships
    public function imageable()
    {
        return $this->morphTo();
    }
}
