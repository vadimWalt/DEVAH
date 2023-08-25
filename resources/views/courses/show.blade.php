<x-layout>

    <div class="container mx-auto mt-8 p-8">
        <div class="flex flex-col items-center space-y-4">
            <img src="{{ $course->picture }}" alt="{{ $course->title }}"
                class="w-64 h-64 object-cover rounded-lg shadow-lg">
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
                <p>{!! nl2br(e($course->content)) !!}</p>Ss
            </div>
        </div>

</x-layout>
