@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-6">Buat Lampiran Baru</h1>
    <form action="{{ route('attachments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <label for="task_id">Pilih Tugas:</label>
            <select name="task_id" id="task_id" class="form-control" required>
                @foreach($tasks as $task)
                <option value="{{ $task->id }}">{{ $task->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4">
            <label for="file">Pilih File:</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection
