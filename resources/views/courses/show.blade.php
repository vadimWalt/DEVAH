<x-layout>

    {{-- @include('partials._search') --}}

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    {{-- src="{{ $course->picture ? $course->picture : asset('images/no-image.png') }}" --}}
                    alt="" />

                {{-- <h3 class="text-2xl mb-2">{{ $course->title }}</h3> --}}
                {{-- <div class="text-xl font-bold mb-4">{{ $course->teacher }}</div> --}}
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Course Description
                    </h3>
                    {{-- <div class="text-lg space-y-6">
                        {{ $course->description }}
                    </div> --}}
                </div>
                <div class="border border-gray-200 w-full my-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Course Content
                    </h3>
                    <div class="text-lg space-y-6">
                        <p> We can display HTML content here </p>
                        {{-- {!! $course->content !!} <!-- Displaying HTML content using {!! !!} to prevent escaping --> --}}
                    </div>
                </div>
                {{-- <a href="mailto:{{ $course->teacher->email }}"
                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                        class="fa-solid fa-envelope"></i> --}}
                    Contact Teacher</a>
            </div>
        </x-card>
    </div>
</x-layout>
