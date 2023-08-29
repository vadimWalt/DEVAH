<div class="container mx-auto mt-8 p-8">
    <!-- Section Title -->
    <h2 class="text-3xl font-semibold mb-4">Latest Courses</h2>
    
    <!-- Course Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Loop through each course and display a course card -->
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach
    </div>
</div>
