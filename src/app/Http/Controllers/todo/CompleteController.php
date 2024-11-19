<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class CompleteController extends Controller
{
    public function complete(string $id)
    {
        $todo = Todo::findOrFail($id);
        Gate::authorize('update-todo', $todo);
        $todo->completed_at = Carbon::now()->toDateTimeString();
        $todo->save();
        return back()->with('message_info','タスクを完了しました');
    }

    public function undo(string $id)
    {
        $todo = Todo::findOrFail($id);
        Gate::authorize('update-todo', $todo);
        $todo->completed_at = null;
        $todo->save();
        return back()->with('message_info','タスクを未完了に変更しました');
    }
}
