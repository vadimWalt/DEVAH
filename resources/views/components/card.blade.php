<div class="bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
    <h3 class="mb-3 text-xl font-bold text-indigo-600">{{ $course['levels'][0] }}</h3>
    <div class="relative">
        <img class="w-100 rounded-xl" src="{{ $course['icon_url'] ?? '' }}" alt="Course Icon" />
        <p class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">
            {{ $course['duration_in_minutes'] }} minutes</p>
    </div>
    <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">{{ $course['title'] }}</h1>
</div>
