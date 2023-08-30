<x-layout>

    <!-- Page title -->
    <h1 class="text-3xl text-center font-bold my-6 uppercase">
        My Courses
    </h1>
    <!-- Create course button -->
    @if (auth()->user()->role == 'teacher')

        <!-- Table to display courses -->
        <table class="w-full table-auto rounded-sm">
            <tbody>
                <!-- Check if there are myCourses available -->
                @unless ($myCourses->isEmpty())
                    <!-- Loop through each teacher course -->
                    @foreach ($myCourses as $course)
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
        <br>
        <div class="text-center">
            <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Create Course
            </a>
        </div>
    @else
        <table class="w-full table-auto rounded-sm">
            <tbody>
                <!-- Check if there are courses available -->
                @unless ($courses->isEmpty())
                    <!-- Loop through each teacher course -->
                    @foreach ($courses as $course)
                        <tr class="border-gray-300">
                            <!-- Course title and link -->
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/courses/{{ $course->id }}">
                                    {{ $course->title }}
                                </a>
                            </td>
                            <!-- Unenroll course link -->
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="{{ route('courses.unenroll', ['course' => $course->id]) }}">
                                    @csrf
                                    <button class="text-red-500">
                                        <i class="fa-solid fa-trash"></i> Un-enroll
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <!-- No courses found message -->
                    <tr class="border-grey-300">
                        <td class="px-4 py-8 border-t border-b border-grey-300 text-lg">
                            <p class="text-center">You are not enrolled in any courses</p>
                        </td>
                    </tr>
                @endunless
            </tbody>
        </table>
        <br>
        <div class="text-center">
            <a href="{{ route('courses.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                Enroll to a course
            </a>
        </div>
    @endif

</x-layout>
