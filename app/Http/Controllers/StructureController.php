<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StructureController extends Controller
{
    public function index(){
        view('structure', ['user'=>Auth::user()]);

    }
}
