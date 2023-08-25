<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- icon in the tab to make difference between website --}}
    <link rel="icon" href="images/favicon.ico" />
    {{-- cdn for fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}"> <!-- Use asset() to generate correct URL -->

    {{-- cdn for alpine use for flash message for example --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- tailwind cdn --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#000013",
                    },
                },
            },
        };
    </script>
    <title>DEVAH | learning Platform</title>
</head>

<body>
    <x-flash-message />
    <header>
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                {{-- <div class="text-white text-xl font-semibold" >DEVAH ACADEMY</div>  --}}

                <div class="devah">
                    <a href="#" class="text-white">
                        <i class="fa-solid fa-school fa-2xl" style="color: red;"></i>DEVAH ACADEMY</a>
                    
                </div>
                <div class="hidden md:flex space-x-4">
                    <a href="/" class="text-white">Home</a>
                    <a href="#" class="text-white">About</a>
                    <a href="#" class="text-white">Services</a>
                    <a href="#" class="text-white">Contact</a>
                    <a href="/courses" class="text-white">Courses</a>
                </div>
                @auth {{-- if we're logged in, show this content --}}
                    <ul class="hidden md:flex flex-row space-x-6 mr-6 text-lg">
                        <li>
                            <span class="font-bold uppercase">
                                {{-- to access to logged user name, we need to use the auth() helper --}}
                                Welcome {{ auth()->user()->name }}
                            </span>
                        </li>
                        <li>
                            <a href="/users/{{ auth()->user()->id }}/profile" class="hover:text-laravel">
                                <i class="fa-solid fa-gear"></i> Manage Profile
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-laravel">
                                MyCourses(route not ready)
                            </a>
                        </li>
                        <li>
                            <form class="inline" method="POST" action="/logout">
                                @csrf
                                <button>
                                    <i class="fa-solid fa-door-closed"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                @else
                    {{-- if we're not logged in, show that content instead --}}

                    <div class="hidden md:flex space-x-4">
                        <a href="/register" class="text-white">Register</a>
                        <a href="/login" class="text-white">Login</a>
                    </div>
                @endauth
                <div class="md:hidden">
                    <button class="text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <main class="min-h-screen mb-24 mt-0">
        {{ $slot }}
    </main>

    <footer
        class="w-full flex flex-col items-center justify-start font-bold bg-gray-800 text-white h-24 mt-24 opacity-90 md:justify-center md:flex-row md:space-x-4">
        <ul>
            <li>Copyright &copy; 2022, All Rights reserved</li>
            <li>
                <a href="/">enroll to a course</a>
            </li>
        </ul>

    </footer>

</body>

</html>
