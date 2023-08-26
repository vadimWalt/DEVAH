<x-layout>
    <!-- Edit Course Container -->
    <div class="container mx-auto mt-8 p-8">
        <!-- Header Section -->
        <header class="text-center">
            <h2 class="text-3xl font-semibold mb-4">
                Edit Course: {{ $course->title }}
            </h2>
            <p class="mb-4">Change course details</p>
        </header>
        <!-- Form to edit the course -->
        <form action="/courses/{{ $course->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Course title input -->
            <div class="mb-6">
                <label for="title" class="block text-lg font-medium mb-1">Title:</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ $course->title }}" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course picture input -->
            <div class="mb-6">
                <label for="picture" class="block text-lg font-medium mb-1">Picture:</label>
                <input type="file" class="border border-gray-200 rounded-md p-2 w-full" name="picture"
                    value="{{ old('picture') }}">
                @error('picture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course description input -->
            <div class="mb-6">
                <label for="description" class="block text-lg font-medium mb-1">Description:</label>
                <textarea name="description" class="border border-gray-200 rounded p-2 w-full" rows="3">{{ $course->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course content input -->
            <div class="mb-6">
                <label for="content" class="block text-lg font-medium mb-1">Content:</label>
                <textarea name="content" class="border border-gray-200 rounded p-2 w-full" rows="5">{{ $course->content }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Update button -->
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Update Course
            </button>
        </form>
    </div>
</x-layout>
