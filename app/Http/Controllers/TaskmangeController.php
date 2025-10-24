<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Taskrequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskmangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $query = auth()->user()->tasks();

    if ($request->filled('title')) {
        $query->where('title', 'like', '%' . $request->title . '%');
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $tasks = $query->latest()->get();
return view('task.index',compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::with('tasks')->get();
        return view('task.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Taskrequest $request)
{
    $validated = $request->validated();

$validated['user_id']=Auth::id();
    Task::create($validated);

    return redirect()->route('tasks.index')->with('success', 'تم إنشاء المهمة بنجاح ✅');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $task=  auth()->user()->tasks()->find($id);
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(TaskRequest $request, string $id)
{
    $task = Task::findOrFail($id);

    $validated = $request->validated();

    if (!$request->has('user_id')) {
        $validated['user_id'] = $task->user_id;
    }
    $task->update($validated);

    return redirect()->route('tasks.index')->with('success', 'تم تحديث المهمة بنجاح ✅');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task=Task::find($id);
        $task->delete();
        return redirect()->back();

    }
}
