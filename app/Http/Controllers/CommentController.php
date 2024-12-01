<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('task')->get(); // Ambil semua komentar beserta relasi tugas
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $tasks = Task::where('user_id', auth()->id())->get(); // Tampilkan hanya tugas milik pengguna
        return view('comments.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'task_id' => 'required|exists:tasks,id', // Validasi tugas terkait
            'content' => 'required|string|max:255', // Validasi isi komentar
        ]);

        Comment::create([
            'task_id' => $request->task_id,
            'content' => $request->content,
        ]);

        return redirect()->route('comments.index')->with('success', 'Comment added successfully.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
