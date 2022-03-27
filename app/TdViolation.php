<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TdViolation extends Model
{
    protected $guarded = [];

    public function tds()
    {
        return $this->hasOne(Td::class, 'id', 'id_td');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
