<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    {{-- icon in the tab to make difference between website --}}
    {{-- <link rel="icon" href="" type="image/icon" /> --}}
    {{-- cdn for fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('styles/style.css') }}"> <!-- Use asset() to generate correct URL -->
    {{-- cdn for alpine use for flash message for example --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- tailwind cdn --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#2563eb",
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
        <nav id="nav" class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                {{-- <div class="text-white text-xl font-semibold" >DEVAH ACADEMY</div>  --}}

                <div class="devah">
                    <a href="/" class="text-white">
                        <i class="fa-solid fa-school fa-2xl" style="color: red;"></i> DEVAH ACADEMY</a>
                </div>
                <div class="hidden md:flex space-x-4 ">
                    <a href="/" class="text-white hover:text-gray-400">Home</a>
                    <a href="/courses" class="text-white hover:text-gray-400">Courses</a>
                    <a href="/quiz" class="text-white">Quizzes</a>
                    <a href="/contact" class="text-white hover:text-gray-400">Contact</a>
                    <a href="/about" class="text-white hover:text-gray-400">About</a>
                </div>
                @auth {{-- if we're logged in, show this content --}}
                    <ul class="hidden md:flex space-x-4 flex-row items-center">
                        <li class="text-white flex">Welcome, <span class="font-bold uppercase">
                                {{-- to access to logged user name, we need to use the auth() helper --}}<a href="/users/{{ auth()->user()->id }}/profile"
                                    class="hover:text-gray-400">
                                    {{-- <img class="stroke-2" src="/{{ auth()->user()->proflie_picture }}"
                                        alt="User Picture"> --}} {{ auth()->user()->name }}
                                    <i class="fa-solid fa-gear"></i>
                                </a>
                            </span></li>
                        <li class="text-white"></li>
                        <li class="text-white"><a href="/mycourses" class="hover:text-gray-400">
                                MyCourses(route not ready)
                            </a></li>
                        <li class="text-white">
                            <form class="inline hover:text-gray-400" method="POST" action="/logout">
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
                        <div class="md:hidden relative" x-data="{ mobileMenuOpen: false }">
                            <button class="text-white" @click="mobileMenuOpen = !mobileMenuOpen">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                            <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = false"
                                class="absolute top-0 right-2 bg-white w-32 mt-2 py-2 rounded shadow-md">
                                <a href="/" class="block px-4 py-2 text-gray-800">Home</a>
                                <a href="/about" class="block px-4 py-2 text-gray-800">About</a>
                                <a href="/services" class="block px-4 py-2 text-gray-800">Services</a>
                                <a href="/contact" class="block px-4 py-2 text-gray-800">Contact</a>
                                <a href="/courses" class="block px-4 py-2 text-gray-800">Courses</a>
                            </div>
                        </div>
                </div>
        </nav>
    </header>
    <x-flash-message />
    <main class="min-h-screen mb-0 mt-0">

        <!-- Display success message if available -->
        @if (session()->has('success'))
            <div class="bg-green-200 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message if available -->
        @if (session()->has('error'))
            <div class="bg-red-200 p-4 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <!-- Render the main content slot -->
        {{ $slot }}

    </main>


    <footer
        class="w-full flex flex-col items-center justify-start font-bold bg-gray-800 text-white h-24 mt-0 opacity-90 md:justify-center md:flex-row md:space-x-4">
        <ul>
            <li>
                <a href="/">enroll to a course</a>
            </li>
            <li>Copyright &copy; 2022, All Rights reserved</li>
        </ul>
        <a href="#nav" class="fixed bottom-12 right-12 bg-gray-500 text-white p-6 rounded-full shadow">
            <i class="fas fa-arrow-up"></i>
        </a>
    </footer>
</body>
<script>
    Alpine.data('layout', () => ({
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        },
        showScrollButton: false,
    }));

    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        Alpine.store('layout').showScrollButton = scrollTop > 0;
    });
</script>

    {{--<footer class="fixed bottom-0 left-0 w-full flex flex-col items-center justify-start font-bold bg-gray-800 text-white h-24 mt-24 opacity-90 md:justify-center md:flex-row md:space-x-4">
        <ul>
           <li class="ml-2 mb-2 md:mb-0">Copyright &copy; 2022, All Rights reserved</li>
           <li>
            <a href="/" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">enroll to a course</a>
           </li>

        </ul>
        {{--<p class="ml-2 mb-2 md:mb-0"></p>
       
        <a href="/" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">enroll to a course</a>
    </footer>--}}
        
</body>

</html>







