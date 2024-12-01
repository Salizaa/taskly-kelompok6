@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-6">Buat Komentar Baru</h1>
    <form action="{{ route('comments.store') }}" method="POST">
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
            <label for="content">Isi Komentar:</label>
            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
