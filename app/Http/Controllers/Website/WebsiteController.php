<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function login(){
        return view('Auth.login');
    }

    public function register(){
        return view('Auth.register');
    }

    public function reset(){
        return view('Auth.reset');
    }

    public function denied(){
        return view('denied');
    }
}
