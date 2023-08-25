<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="{{asset("images/favicon.png")}}">
    {{-- icon in the tab to make difference between website --}}
    {{-- <link rel="icon" href="" type="image/icon" /> --}}
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

<body class="mb-48">

<header>
    <nav class="bg-gray-800 p-4">
      <div class="container mx-auto flex justify-between items-center">
        {{-- <div class="text-white text-xl font-semibold" >DEVAH ACADEMY</div>  --}}
        
        <div class="devah">
            <a href="#" class="text-white">
                <i class="fa-solid fa-school fa-2xl" style="color: #511f46;"></i>            </a>
            DEVAH ACADEMY</div>
        <div class="hidden md:flex space-x-4">
          <a href="#" class="text-white">Home</a>
          <a href="#" class="text-white">About</a>
          <a href="#" class="text-white">Services</a>
          <a href="#" class="text-white">Contact</a>
          <a href="#" class="text-white">Courses</a>
        </div>
        <div class="md:hidden">
          <button class="text-white">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
    </nav>
  </header>
    
    <main>
        {{ $slot }}
    </main>
    
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="/" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">enroll to a course</a>
    </footer>
</body>

</html>