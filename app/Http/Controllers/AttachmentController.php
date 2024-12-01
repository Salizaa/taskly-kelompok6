<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Attachment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function index()
{
    $attachments = Attachment::with('task')->get(); // Mengambil semua data attachment dengan relasi task
    return view('attachments.index', compact('attachments'));
}

public function create()
{
    $tasks = Task::where('user_id', auth()->id())->get(); // Tampilkan hanya tugas milik pengguna
    return view('attachments.create', compact('tasks'));
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'file' => 'required|file|max:10240',
        'task_id' => 'required|exists:tasks,id', // Validasi task ID
    ]);

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('attachments', $fileName);

        // Simpan data lampiran
        Attachment::create([
            'task_id' => $request->task_id,
            'filename' => $fileName,
        ]);

        return redirect()->route('attachments.index')->with('success', 'Attachment uploaded successfully.');
    }

    return redirect()->back()->with('error', 'Failed to upload attachment.');
}

public function destroy(Attachment $attachment)
{
    if (Storage::exists('attachments/' . $attachment->filename)) {
        Storage::delete('attachments/' . $attachment->filename);
    }
    $attachment->delete();

    return redirect()->route('attachments.index')->with('success', 'Attachment deleted successfully.');
}

}
