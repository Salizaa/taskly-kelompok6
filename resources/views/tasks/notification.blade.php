@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-purple-900 mb-6">Task Notifications</h1>

        @if ($tasks->isEmpty())
            <p class="text-gray-600">No tasks approaching deadline in the next 24 hours.</p>
        @else
            <div class="space-y-4">
                @foreach ($tasks as $task)
                    <div class="p-4 bg-purple-100 border border-purple-300 rounded-2xl flex justify-between items-center">
                        <p class="text-lg text-purple-800 font-semibold">
                            Task "{{ $task->title }}" will reach its deadline on
                            {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y, H:i') }}.
                        </p>
                        <a href="{{ route('tasks.edit', $task->id) }}"
                            class="inline-block mt-2 px-4 py-2 bg-purple-600 text-white rounded-xl hover:bg-purple-500">
                            View Task
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
