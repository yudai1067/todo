<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\todo\EditRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EditController extends Controller
{
    public function index(string $id)
    {
        $todo = Todo::findOrFail($id);
        Gate::authorize('update-todo', $todo);
        return view('todo.edit', compact('todo'));
    }

    public function edit(EditRequest $request, string $id)
    {
        $validated = $request->validated();
        Todo::where('id', $id)->update($validated);
        return redirect()->route('dashboard')->with('message_info','タスクを更新しました');
    }
}
