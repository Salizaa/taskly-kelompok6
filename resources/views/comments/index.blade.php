@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-purple-900 mb-6">Comments</h1>
        <a href="{{ route('comments.create') }}"
            class="inline-block mb-6 px-4 py-2 bg-purple-900 text-white rounded-xl shadow hover:bg-purple-800">
            Create Comment
        </a>
    </div>

    <div class="overflow-x-auto bg-purple-100 rounded-2xl">
        <table class="min-w-full text-left text-sm">
            <thead>
                <tr class="border-b border-purple-300">
                    <th class="px-6 py-3 text-purple-900 font-semibold">#</th>
                    <th class="px-6 py-3 text-purple-900 font-semibold">Content</th>
                    <th class="px-6 py-3 text-purple-900 font-semibold">Task</th>
                    <th class="px-6 py-3 text-purple-900 font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-purple-300">
                @forelse ($comments as $comment)
                <tr class="hover:bg-purple-100">
                    <td class="px-6 py-4">{{ $comment->id }}</td>
                    <td class="px-6 py-4">{{ $comment->content }}</td>
                    <td class="px-6 py-4">{{ $comment->task->title ?? 'N/A' }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 text-sm text-white bg-red-600 rounded-lg hover:bg-red-500"
                                onclick="return confirm('Are you sure want to delete this comment?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="px-6 py-4 text-center" colspan="4">No comments found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
