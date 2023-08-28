<x-layout>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($courses) == 0)
            <p>No courses found</p>
        @else
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        @endif
    </div>
</x-layout>
