<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class Employee extends Controller
{
    public function index()
    {
        dd(User::find(auth()->id())->designation->name);
    }
}