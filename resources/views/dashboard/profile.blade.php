@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold text-purple-900 mb-6">Edit Profile</h1>

        <!-- Form Edit Profile -->
        <form action="{{ route('profile.update') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Image -->
            <div>
                @if ($user->profile_image)
                    <img id="profilePic" src="{{ asset('uploads/profile_images/' . $user->profile_image) }}"
                        alt="Profile Image" class="mt-3 w-24 h-24 rounded-full object-cover">
                @else
                    <img id="profilePic" src="https://via.placeholder.com/100" alt="Profile Placeholder"
                        class="mt-3 w-24 h-24 rounded-full object-cover">
                @endif
                <label for="profile_image" class="block text-sm font-medium text-gray-700 mt-3">Profile Image</label>
                <input type="file" name="profile_image" id="profile_image" onchange="previewImage(event)"
                    class="mt-1 block w-full p-3 bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500">
            </div>

            <!-- First Name -->
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}"
                    class="mt-1 block w-full p-3 bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500">
            </div>

            <!-- Last Name -->
            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}"
                    class="mt-1 block w-full p-3 bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                    class="mt-1 block w-full p-3 bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500">
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number"
                    value="{{ old('phone_number', $user->phone_number) }}"
                    class="mt-1 block w-full p-3 bg-transparent border border-purple-900/50 rounded-xl shadow-sm focus:border-purple-700 focus:ring-purple-500">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="inline-flex items-center px-6 py-2 border border-transparent rounded-xl shadow-sm text-white bg-purple-900 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Update Profile
                </button>
            </div>
        </form>

        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.getElementById('profilePic');
                        img.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>

    </div>
@endsection
