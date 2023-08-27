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
                        laravel: "#2563eb",
                    },
                },
            },
        };
    </script>
    <title>DEVAH | learning Platform</title>
</head>

<body>

    <header>
        <nav id="nav" class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                {{-- <div class="text-white text-xl font-semibold" >DEVAH ACADEMY</div>  --}}

                <div class="devah">
                    <a href="#" class="text-white">
                        <i class="fa-solid fa-school fa-2xl" style="color: #511f46;"></i> </a>
                    DEVAH ACADEMY
                </div>
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
                        <a href="#" class="block px-4 py-2 text-gray-800">Home</a>
                        <a href="#" class="block px-4 py-2 text-gray-800">About</a>
                        <a href="#" class="block px-4 py-2 text-gray-800">Services</a>
                        <a href="#" class="block px-4 py-2 text-gray-800">Contact</a>
                        <a href="/courses" class="block px-4 py-2 text-gray-800">Courses</a>
                        <a href="/quiz" class="block px-4 py-2 text-gray-800">Quizes</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="mb-24 mt-0">
        {{ $slot }}
    </main>

    <a href="#nav">
        <button x-show="showScrollButton" @click="scrollToTop"
            class="fixed bottom-12 right-12 bg-gray-800 text-white p-3 rounded shadow">
            <i class="fas fa-arrow-up"></i>
        </button>
    </a>
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto py-4">
            <div class="flex flex-col md:flex-row md:justify-between">
                <p class="mb-2 md:mb-0">Copyright &copy; 2022, All Rights Reserved</p>
                <div class="flex space-x-4">
                    <a href="/" class="hover:text-gray-400">Home</a>
                    <a href="#" class="hover:text-gray-400">About</a>
                    <a href="#" class="hover:text-gray-400">Services</a>
                    <a href="#" class="hover:text-gray-400">Contact</a>
                    <a href="/courses" class="hover:text-gray-400">Courses</a>
                   {{--<a href="/quiz" class="hover:text-gray-400">Quizes</a> --}} 
                </div>
                  <div>
                    <a href="/register" class="hover:text-gray-400">Register</a>
                    <a href="/login" class="hover:text-gray-400">Login</a>
                  </div>
                
                <a href="/" class="md:hidden bg-black text-white px-4 py-2 rounded hover:bg-gray-700">
                    Enroll to a Course
                </a>
            </div>
        </div>
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

</html>