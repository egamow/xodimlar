<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function checkLogin()
    {
        return response('check login test',200);
    }


}
