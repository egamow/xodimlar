<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbViolation extends Model
{
    protected $guarded = [];

    public function tbs()
    {
        return $this->hasOne(Tb::class, 'id', 'id_tb');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
