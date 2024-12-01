@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-purple-900 mb-6">
            Tasks - {{ ucfirst($filterType) }}: {{ ucfirst($filterValue) }}
        </h1>

        <div class="overflow-x-auto bg-purple-100 rounded-2xl">
            <table class="min-w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-purple-300">
                        <th class="px-6 py-3 text-purple-900 font-semibold">#</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Title</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Notes</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Category</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Status</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Deadline</th>
                        <th class="px-6 py-3 text-purple-900 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-purple-300">
                    @forelse ($tasks as $task)
                        <tr class="hover:bg-purple-100">
                            <td class="px-6 py-4">{{ $task->id }}</td>
                            <td class="px-6 py-4">{{ $task->title }}</td>
                            <td class="px-6 py-4">{{ $task->notes }}</td>
                            <td class="px-6 py-4 capitalize">{{ $task->category }}</td>
                            <td class="px-6 py-4 capitalize">{{ $task->status }}</td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('tasks.edit', $task->id) }}"
                                    class="px-3 py-1 text-sm text-white bg-yellow-500 rounded-lg hover:bg-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm text-white bg-red-600 rounded-lg hover:bg-red-500"
                                        onclick="return confirm('Are you sure want to delete this task?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>

                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-3 py-1 text-sm rounded-lg
                                        {{ $task->status === 'completed' ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-green-600 text-white' }}"
                                        {{ $task->status === 'completed' ? 'disabled' : '' }}>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">No tasks found for this filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
