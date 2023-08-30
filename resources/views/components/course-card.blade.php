<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <!-- Course Picture -->
    <img src="{{ $course->picture ? asset('storage/' . $course->picture) : asset('images/courses/no-image.jpg')}}" alt="{{ $course->title }}"
         class="w-full h-48 object-cover">
    
    <div class="p-4">
        <!-- Course Title -->
        <h3 class="text-lg font-semibold">{{ $course->title }}</h3>
        
        <!-- Course Description -->
        <p class="text-gray-600">{{ $course->description }}</p>
        
        <!-- Learn More Link -->
        <a href="/courses/{{ $course->id }}" class="mt-2 text-blue-600 hover:underline">Learn More</a>
    </div>
</div>
