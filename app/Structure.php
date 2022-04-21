<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $guarded = [];

    public function countPositions()
    {
        return $this->hasMany(self::class, 'pid')->where('type', 'p');
    }
}
