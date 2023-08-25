<x-layout>

    <div class="lg:grid gap-4 md:space-y-0 my-0">
        @if (count($courses) == 0)
            <p>No courses found</p>
        @else
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        @endif
    </div>

</x-layout>
