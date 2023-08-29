<x-layout>

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

            <!-- Display Chatroom Container -->
            <x-chatroom-container />

            <!-- Edit & Delete Buttons (visible to teacher who created the course) -->
            @auth
                @if (Auth::user()->id === $course->teacher_id)
                    <a href="{{ route('courses.edit-course', $course) }}"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Edit Course
                    </a>

                    <!-- Delete Button -->
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

</x-layout>
