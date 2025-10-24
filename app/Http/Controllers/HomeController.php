<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
            $user = auth()->user();

    $totalTasks = $user->tasks()->count();

    $completedTasks = $user->tasks()->where('status', 1)->count();

    $overdueTasks = $user->tasks()
        ->where('status', '!=', 1)
        ->whereDate('data', '<', now())
        ->count();

    return view('home', compact('totalTasks', 'completedTasks', 'overdueTasks'));

    }
}
