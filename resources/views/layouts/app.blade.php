<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Taskly')</title>
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

<body class="font-poppins bg-background bg-contain bg-cover">
    <div class="flex">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 bg-purple-200/50 left-0 text-white transition-all duration-300 sidebar-gradient ml-8 my-auto h-[92%] p-8 pl-7 rounded-3xl">
            <ul class=" space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('dashboard') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.create') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.create') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Create Task</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.index') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.index') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                        <span>All Tasks</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.ongoing') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.ongoing') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-hourglass size-5">
                            <path d="M5 22h14" />
                            <path d="M5 2h14" />
                            <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                            <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                        </svg>
                        <span>On-Going</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.completed') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.completed') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Completed</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.missed') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.missed') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span>Missed</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.personal') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.personal') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                        <span>Personal</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.work') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.work') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                        </svg>
                        <span>Work</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.education') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('tasks.education') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        <span>Education</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('attachments.index') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('attachments.index') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 0 1 0 7.5M15.75 6v0m-7.5 0A3.75 3.75 0 0 1 6 9.75 3.75 3.75 0 0 1 15.75 17.25M3.75 18h15m0-7.5h0M12 18h0" />
                        </svg>
                        <span>Attachments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('comments.index') }}"
                        class="flex items-center space-x-3 text-purple-900 font-medium px-4 py-2 rounded-xl hover:bg-purple-300/80 {{ Route::is('comments.index') ? 'bg-purple-300/80' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 15a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v3.878l-.58.58a2 2 0 0 0-.42 1.536v4.181a2 2 0 0 0 2 2h3.878a2 2 0 0 0 1.414-.586l.586-.586H21ZM7 7h14v6H7V7Z" />
                        </svg>
                        <span>Comments</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 rounded-2xl transition-all duration-300 mt-8 ml-72 mr-16">
            {{-- Navbar --}}
            <div class="p-6 flex justify-between bg-purple-200/50 rounded-3xl">
                <h1 class="text-xl text-center font-bold text-purple-900">Taskly</h1>
                <div class="flex gap-5">
                    <a href="{{ route('profile.show') }}" class="text-purple-900 flex gap-2 items-centers">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <p>Profile</p>
                    </a>
                    <a href="{{ route('tasks.notification') }}" class="text-purple-900 flex gap-2 items-centers">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                        <p>Notification</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-700 flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
            {{-- Main --}}
            <div class="p-10 mt-5 bg-purple-200/50 rounded-3xl">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
