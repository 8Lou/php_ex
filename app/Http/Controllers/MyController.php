<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index () {
        return 'моя первая бэк-страница';
    }
}

class YouController extends Controller
{
    public function index2 () {
        return 'моя 2 бэк-страница';
    }
}
