<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Menampilkan semua tasks
    public function index()
    {

        $now = Carbon::now();
        Task::where('status', '!=', 'missed')
            ->whereNotNull('deadline')
            ->where('deadline', '<', $now)
            ->update(['status' => 'missed']);


        $task = Task::where('user_id', Auth::id())->get();
        $tasks = $task->map(function ($task) {
            $task->formatted_deadline = Carbon::parse($task->deadline)->format('d M Y, H:i');
            return $task;
        });

        return view('tasks.index', compact('tasks'));
    }


    // Form untuk membuat task baru
    public function create()
    {
        return view('tasks.create');
    }

    // Menyimpan task baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'notes' => 'nullable',
            'category' => 'required|in:work,personal,education',
            'deadline' => 'nullable|date',
        ]);

        $request = $request->merge(['user_id' => auth()->id()]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan');
    }

    // Form untuk mengedit task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Memperbarui task
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'notes' => 'nullable',
            'category' => 'required|in:work,personal,education',
            'deadline' => 'nullable|date',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task berhasil diupdate');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus.');
    }

    // Menandai task sebagai selesai
    public function complete(Task $task)
    {
        $task->update(['status' => 'completed']);
        return redirect()->route('tasks.index')->with('success', 'Task berhasil diselesaikan.');
    }

    public function showCompletedTasks()
    {
        $tasks = Task::where('status', 'completed')
            ->where('user_id', auth()->id())
            ->get();

        return view('tasks.filter', [
            'tasks' => $tasks,
            'filterType' => 'status',
            'filterValue' => 'completed',
        ]);
    }

    public function showOngoingTasks()
    {
        $tasks = Task::where('status', 'ongoing')->get();
        return view('tasks.filter', [
            'tasks' => $tasks,
            'filterType' => 'status',
            'filterValue' => 'ongoing',
        ]);
    }

    public function showMissedTasks()
    {
        $tasks = Task::where('status', 'missed')
            ->where('user_id', auth()->id())
            ->get();
        return view('tasks.filter', [
            'tasks' => $tasks,
            'filterType' => 'status',
            'filterValue' => 'missed',
        ]);
    }

    public function showWorkTasks()
    {
        $tasks = Task::where('category', 'work')
            ->where('user_id', auth()->id())
            ->get();
        return view('tasks.filter', [
            'tasks' => $tasks,
            'filterType' => 'category',
            'filterValue' => 'work',
        ]);
    }

    public function showPersonalTasks()
    {
        $tasks = Task::where('category', 'personal')
            ->where('user_id', auth()->id())
            ->get();
        return view('tasks.filter', [
            'tasks' => $tasks,
            'filterType' => 'category',
            'filterValue' => 'personal',
        ]);
    }

    public function showEducationTasks()
    {
        $tasks = Task::where('category', 'education')
            ->where('user_id', auth()->id())
            ->get();
        return view('tasks.filter', [
            'tasks' => $tasks,
            'filterType' => 'category',
            'filterValue' => 'education',
        ]);
    }

    public function showNotification()
    {
        $now = Carbon::now();
        $tasks = Task::whereBetween('deadline', [$now, $now->copy()->addDay()])
            ->where('user_id', auth()->id())
            ->get();
        return view('tasks.notification', compact('tasks'));
    }
}
