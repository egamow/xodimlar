<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_tests');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function countQuestions()
    {
        return $this->questions()->count();
    }

}
