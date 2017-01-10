<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    protected $fillable = [
        'info', 'name', 'area', 'picture_uri',
        'description','year','month', 'weekday', 'state'
    ];

    /**
     * one special to many video
     */
    public function videos()
    {
        return $this->hasMany(Video::class, 'special_id', 'id');
    }

    /**
     * many special to many category
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('deleted_at');
    }
}
