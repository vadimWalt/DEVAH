<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
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

    <nav id="nav" class="navbar">
        <div class="logo">
            <img src="{{ asset('images/favicon.png') }}" alt="">
            <a href="/">DEVAH</a>
        </div>
        <ul id="nav-links" class="nav-links">

            <!-- Dropdown Account -->


            @auth


                <li class="text-blue-200 flex">Welcome, {{ auth()->user()->name }} <span class="font-bold uppercase">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Services</a>
                    <ul class="dropdown-menu">
                        <li><a href="/courses">Courses</a></li>
                        <li><a href="/quiz">Quizzes</a></li>
                    </ul>
                </li>

                <li><a href="/contact">Contact</a></li>
                <li><a href="/aboutus">About us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Account</a>
                    <ul class="dropdown-menu">
                        <li><a href="/manage-courses">My Courses</a></li>
                        <li><a href="/logout">logout</a></li>
                        <li><a href="/users/{{ auth()->user()->id }}/profile">Edit</a></li>
                    </ul>
                </li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Services</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Courses</a></li>
                        <li><a href="/quiz">Quizzes</a></li>
                    </ul>
                </li>

                <li><a href="/contact">Contact</a></li>
                <li><a href="aboutus">About us</a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Account</a>
                    <ul class="dropdown-menu">
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Log In</a></li>
                    </ul>
                </li>

            @endauth



        </ul>


        <div class="burger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </nav>






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

        <!-- Scroll up button -->
        <a x-data="scrollButton()" @click="scrollToTop" x-show="showScrollButton"
            class="fixed bottom-12 right-12 bg-gray-500 text-white p-6 rounded-full shadow">
            <i class="fas fa-arrow-up"></i>
        </a>

    </main>


    <footer id="footer" class="bg-gray-800">
        <ul>
            <li>Copyright &copy; 2022, All Rights reserved</li>
        </ul>
        <a id="scroll-up" href="#nav" onclick="scrollToTop()">
            <i class="fas fa-arrow-up"></i>
        </a>
    </footer>
</body>


<script>
    // function that manage a smooth come back to the top when you click on the top button
    function scrollToTop() {
        const target = document.querySelector("#nav");
        const startPosition = window.pageYOffset;
        const targetPosition = target.offsetTop;
        const distance = targetPosition - startPosition;
        const duration = 500; // Adjust this value for the desired duration

        let startTimestamp = null;

        function step(timestamp) {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = timestamp - startTimestamp;
            window.scrollTo(0, easeInOutCubic(progress, startPosition, distance, duration));
            if (progress < duration) {
                requestAnimationFrame(step);
            }
        }

        function easeInOutCubic(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t * t + b;
            t -= 2;
            return c / 2 * (t * t * t + 2) + b;
        }

        requestAnimationFrame(step);
    }

    // allow the burger icon to work
    const burgerMenu = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.nav-links');

    burgerMenu.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>
</body>

</html>
