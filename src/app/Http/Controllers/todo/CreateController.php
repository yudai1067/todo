<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index()
    {
        return view('todo.create');
    }
}
