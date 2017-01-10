<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;
    //  use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['band', 'slug', '_lft', '_rgt', 'parent_id'];
    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * many category to many special relation
     */
    public function specials()
    {
        return $this->belongsToMany(Special::class)->withPivot('deleted_at');
    }
}
