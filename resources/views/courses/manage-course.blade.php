<x-layout>
    <header>
        <!-- Page title -->
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
            My Courses
        </h1>
        <!-- Create course button -->
        @if (auth()->user()->role=="teacher")
        <div class="text-center">
            <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Create Course
            </a>
        </div>
        @else
        <div class="text-center">
            <a href="{{ route('courses.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Enroll to a course
            </a>
        </div>
        @endif
        
    </header>
    <!-- Table to display courses -->
    <table class="w-full table-auto rounded-sm">
        <tbody>
            <!-- Check if there are teacherCourses available -->
            @unless ($teacherCourses->isEmpty())
                <!-- Loop through each teacher course -->
                @foreach ($teacherCourses as $course)
                    <tr class="border-gray-300">
                        <!-- Course title and link -->
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/courses/{{ $course->id }}">
                                {{ $course->title }}
                            </a>
                        </td>
                        <!-- Edit course link -->
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/courses/{{ $course->id }}/edit">
                                <i class="fa-solid fa-pencil"></i> Edit
                            </a>
                        </td>
                        <!-- Delete course form -->
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form method="POST" action="/courses/{{ $course->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <!-- No courses found message -->
                <tr class="border-grey-300">
                    <td class="px-4 py-8 border-t border-b border-grey-300 text-lg">
                        <p class="text-center">No courses found</p>
                    </td>
                </tr>
            @endunless
        </tbody>
    </table>

</x-layout>
