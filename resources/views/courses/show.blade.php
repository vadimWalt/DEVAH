<x-layout>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Course Details</title>
    <style>
            .rounded-custom {
                border-radius: 0.5rem;
            }

            .bg-laravel {
                background-color: #FF2D20;
            }

            .bg-gray {
                background-color: #6B7280;
            }

            .course-picture {
                width: 16rem;
                height: 16rem;
            }




/* Apply styles to the button inside the div */
.chatroom-button button {
    border-radius: 20px;
    transition: transform 2s;
}

.chatroom-button button a {
    background-color: #ff6699;
    text-decoration: none;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    display: inline-block;
    transition: background-color 0.3s, transform 2s;
}

.chatroom-button button a:hover {
    background-color: #b546e5;
    transform: scale(0.98);
}



    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto mt-8 p-8 bg-white rounded-lg shadow-md">
        <div class="flex flex-col items-center space-y-4">
            <img src="{{ $course->picture }}" alt="{{ $course->title }}" class="w-64 h-64 object-cover rounded-lg shadow-lg">

            <h2 class="text-3xl font-semibold">{{ $course->title }}</h2>

            <p class="text-gray-600">{{ $course->description }}</p>

            <div class="mt-4">
                <h3 class="text-xl font-semibold">Teacher</h3>
                @if ($course->teacher)
                    <p>{{ $course->teacher->name }}</p>
                @else
                    <p>No teacher assigned</p>
                @endif
            </div>

            <div class="mt-4">
                <h3 class="text-xl font-semibold">Content</h3>
                <p class="whitespace-pre-line">{{ $course->content }}</p>
            </div>
           

                <!-- ... (other content) ... -->
            
                <div class="flex flex-row justify-end w-full rounded-custom mt-6 chatroom-button">
                    <button>
                        <a href="{{ route('chatroom.show') }}">
                            Chatroom
                        </a>
                    </button>
                </div>

            @auth
                @if (Auth::user()->id === $course->teacher_id)
                    <a href="{{ route('courses.edit-course', $course) }}" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Edit Course
                    </a>

                    <form action="{{ route('courses.destroy', $course) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-gray">
                            Delete Course
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</body>
</html>
</x-layout>




































{{--<x-layout> 
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">

    <div class="container mx-auto mt-8 p-8">
        <div class="flex flex-col items-center space-y-4">
            <!-- Course Picture -->
            <img src="{{ $course->picture }}" alt="{{ $course->title }}"
                class="w-64 h-64 object-cover rounded-lg shadow-lg">

            <!-- Course Title -->
            <h2 class="text-3xl font-semibold">{{ $course->title }}</h2>

            <!-- Course Description -->
            <p class="text-gray-600">{{ $course->description }}</p>

            <!-- Teacher Information -->
            <div class="mt-4">
                <h3 class="text-xl font-semibold">Teacher</h3>
                @if ($course->teacher)
                    <p>{{ $course->teacher->name }}</p>
                @else
                    <p>No teacher assigned</p>
                @endif
            </div>

            <!-- Course Content -->
            <div class="mt-4">
                <h3 class="text-xl font-semibold">Content</h3>
                <p>{!! nl2br(e($course->content)) !!}</p>
            </div>

            <div>
                <!-- Chatroom Link -->
                <a href="{{ route('chatroom.show') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Chatroom
                </a>
            </div>

            <!-- Edit & Delete Buttons (visible to teacher who created the course) -->
            @auth
                @if (Auth::user()->id === $course->teacher_id)
                    <a href="{{ route('courses.edit-course', $course) }}"
                        class="bg-laravel text-white px-4 py-2 rounded hover:bg-black">
                        Edit Course
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('courses.destroy', $course) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Delete Course
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-layout>--}}
