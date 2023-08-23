@props(['course'])

<x-card class="fixed bottom-4">
    <div class="flex">
        {{-- if we have an image link in the table : show the image --}}
        {{-- otherwise, show the default image --}}
        <img class="hidden w-48 mr-6 md:block"
            src="{{ $course->logo ? asset('storage/' . $course->logo) : asset('images/no-image.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/courses/{{ $course->id }}">{{ $course->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $course->tutor }}</div>
            <x-course-tags :tagsCsv="$course->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $course->location }}
            </div>
        </div>
    </div>
</x-card>
