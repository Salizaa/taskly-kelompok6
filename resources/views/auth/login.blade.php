<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Taskly</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    backgroundImage: {
                        'background': "url('{{ asset('bg.jpg') }}')",
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    }
                }
            }
        };
    </script>
</head>
<body
    class="font-poppins bg-background bg-cover bg-center bg-no-repeat text-gray-800 font-sans min-h-screen flex flex-col items-center justify-center">
    <h1 class="text-4xl font-bold text-purple-900 mb-4">Login</h1>
    <p class="text-lg mb-6">Welcome back to Taskly!</p>
    <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-purple-500 focus:border-purple-500">
        </div>

        <button type="submit"
            class="w-full bg-purple-700 text-white py-2 px-4 rounded-lg hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            Login
        </button>
    </form>
    <p class="mt-4 text-sm">
        Don't have an account? <a href="{{ route('register') }}" class="text-purple-700 hover:underline">Sign up</a>
    </p>
</body>

</html>
