<div class="bg-white rounded-lg shadow-lg overflow-hidden flex">
    <!-- Course Picture -->
    <img src="{{ $course->picture ? asset('storage/' . $course->picture) : asset('storage/images/courses/no-image.jpg')}}" alt="{{ $course->title }}"
         class="w-full h-48 object-cover">
    
    <div class="p-4">
        <!-- Course Title -->
        <h3 class="text-lg font-semibold">{{ $course->title }}</h3>

        <!-- Course Description -->
        <p class="text-gray-600">{{ $course->description }}</p>

        <!-- Learn More Link -->
        <a href="/courses/{{ $course->id }}" class="mt-2 text-blue-600 hover:underline">Learn More</a>

        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg justify-self-end align-self-end ">
            <form method="POST" action="{{ route('courses.enroll', ['course' => $course->id]) }}">
                @csrf
                <button class="text-blue-200 hover:text-blue-800">
                    <i class="fa-solid fa-address-card"></i> Enroll
                </button>
            </form>
        </td>
    </div>
</div>
