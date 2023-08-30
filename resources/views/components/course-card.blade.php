<div class="bg-white rounded-lg shadow-lg overflow-hidden flex" id="course-card">
    <!-- Course Picture -->
    <img width="5px" height="5px"
        src="{{ $course->picture ? asset('storage/' . $course->picture) : asset('storage/images/courses/JRFN2xWs83F7HMI72e0qdrEdWZo1M6gss8RqQwpd.jpg') }}"
        alt="{{ $course->title }}" class="w-full h-48 object-cover" width="50px" height="50px">

    <div class="p-4">
        <!-- Course Title -->
        <h3 class="text-lg font-semibold">{{ $course->title }}</h3>

        <!-- Course Description -->
        <p class="text-gray-600">{{ $course->description }}</p>

        <!-- Learn More Link -->
        <a href="/courses/{{ $course->id }}" class="mt-2 text-blue-600 hover:underline">Learn More</a>

        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg justify-self-end align-self-end ">
            @auth
            @if (auth()->user()->role == 'student')
                @php
                    $isEnrolled = auth()->user()->courses->contains($course->id);
                @endphp
                @if ($isEnrolled)
                    <form method="POST" action="{{ route('courses.unenroll', ['course' => $course->id]) }}">
                        @csrf
                        <button class="text-red-500">
                            <i class="fa-solid fa-trash"></i> Un-enroll
                        </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('courses.enroll', ['course' => $course->id]) }}">
                        @csrf
                        <button class="mt-2 text-yellow-600 hover:underline">
                            <i class="fa-solid fa-address-card"></i> Enroll
                        </button>
                    </form>
                @endif
            @endif
        @endauth
        </td>
    </div>
</div>
