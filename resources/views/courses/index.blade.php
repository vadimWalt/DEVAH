<x-layout>
    <!-- Course List Container -->
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        <!-- Check if there are no courses -->
        @if (count($courses) == 0)
            <p>No courses found</p>
            <!-- Loop through each course and display a course list component -->
        @else
            <x-course-list :courses="$courses" />
        @endif
    </div>

    <div class="mt-6 p-4">
        {{ $courses->links() }}
    </div>

</x-layout>
