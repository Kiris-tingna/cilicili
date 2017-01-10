<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * 可填充字段
     * @var array
     */
    protected $fillable = ['name', 'av', 'episode', 'picture_uri', 'source_uri', 'description', 'special_id'];

    /**
     * 分集属于合集关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function special()
    {
        return $this->belongsTo(Special::class, 'special_id', 'id');
    }
}
