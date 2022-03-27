<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdViolation extends Model
{
    protected $guarded = [];

    public function ids()
    {
        return $this->hasOne(Id::class, 'id', 'id_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
