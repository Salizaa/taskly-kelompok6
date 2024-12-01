<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taskly</title>
    <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-background font-poppins bg-cover bg-center bg-no-repeat flex items-center justify-center h-screen m-0">
    <div class="bg-white text-center p-6 rounded-xl shadow w-1/3 h-64 flex flex-col items-center justify-center">
        <h1 class="text-2xl font-bold text-purple-700 mb-2">Welcome to <strong>Taskly</strong></h1>
        <p class="text-gray-600 mb-4">Manage Your Task Checklist Easily</p>
        <a href="/register">
            <button
                class="bg-purple-600 text-white py-2 px-4 rounded-lg shadow hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300">
                Get Started
            </button>
        </a>
    </div>
</body>

</html>
