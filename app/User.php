<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'firstname',
        'position_id',
        'department_id',
        'lastname',
        'middlename',
        'birthdate',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function position()
    {
        return $this->belongsTo(Structure::class, 'position_id');
    }

    public function department()
    {
        return $this->belongsTo(Structure::class, 'department_id');
    }

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'user_tests', 'user_id', 'test_id')
            ->withPivot('result', 'test_status');
    }

}
