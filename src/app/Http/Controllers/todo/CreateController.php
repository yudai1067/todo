<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\todo\CreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index()
    {
        return view('todo.create');
    }

    public function create(CreateRequest $request)
    {
        $validated = $request->validated();
        Todo::create([
            'user_id' => $request->user()->id,
            ...$validated
        ]);
        return redirect()->route('dashboard')
            ->with('message_info', 'タスクの新規登録が完了しました');
    }
}
