@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-purple-900 mb-4">Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Notes -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input name="title" id="title"
                    class="mt-1 block w-full bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500 p-3"
                    required>{{ old('title') }}</input>
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Notes</label>
                <textarea name="notes" id="notes" rows="4"
                    class="mt-1 block w-full bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500 p-3"
                    required>{{ old('notes') }}</textarea>
            </div>

            <!-- Category -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category" id="category"
                    class="mt-1 block w-full p-3 bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500"
                    required>
                    <option value="work">Work</option>
                    <option value="personal">Personal</option>
                    <option value="education">Education</option>
                </select>
            </div>

            <!-- Deadline -->
            <div>
                <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                <input type="datetime-local" name="deadline" id="deadline"
                    class="mt-1 block w-full p-3 bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500"
                    value="{{ old('deadline') }}">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="inline-flex items-center px-6 py-2 border border-transparent rounded-xl shadow-sm text-white bg-purple-900 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection
