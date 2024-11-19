<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $todos = Todo::where('user_id', Auth::id())
            ->whereNull('completed_at')
            ->orderBy('deadline')
            ->get();
        $is_deadline_passed = $todos->search(function ($item) {
            return Carbon::parse($item->deadline)->lt(Carbon::now());
        });
        if ($is_deadline_passed !== false) {
            session()->flash('message_danger', '期日を超過したタスクがあります');
        }
        return view('dashboard', compact('todos'));
    }
}
