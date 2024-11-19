<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeleteController extends Controller
{
    public function delete(string $id)
    {
        $todo = Todo::findOrFail($id);
        Gate::authorize('update-todo', $todo);
        $todo->delete();
        return back()->with('message_danger', 'タスクを削除しました');
    }

    public function undo(string $id)
    {
        $todo = Todo::withTrashed()
            ->findOrFail($id);
        Gate::authorize('update-todo', $todo);
        $todo->restore();
        return back()->with('message_info', 'タスクを元に戻しました');
    }

    public function forceDelete(string $id)
    {
        $todo = Todo::withTrashed()
            ->findOrFail($id);
        Gate::authorize('update-todo', $todo);
        $todo->forceDelete();
        return back()->with('message_danger', 'タスクを完全に削除しました');
    }
}
