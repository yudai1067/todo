<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function getCompleted()
    {
        $todos = Todo::where('user_id', Auth::id())
            ->whereNotNull('completed_at')
            ->orderBy('completed_at')
            ->get();
        return view('todo.list.completed', compact('todos'));
    }

    public function getDeleted()
    {
        $todos = Todo::onlyTrashed()
            ->where('user_id', Auth::id())
            ->get();
        return view('todo.list.deleted', compact('todos'));
    }
}
