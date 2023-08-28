<x-layout>
    <!-- Create New Course Container -->
    <div class="container mx-auto mt-8 p-8">
        <h2 class="text-3xl font-semibold mb-4">Create New Course</h2>
        <!-- Form to create a new course -->
        <form action="/courses" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Course title input -->
            <div class="mb-6">
                <label for="title" class="block text-lg font-medium mb-1">Title:</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{ old('title') }}" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course picture input -->
            <div class="mb-6">
                <label for="picture" class="block text-lg font-medium mb-1">Picture</label>
                <input type="file" class="border border-gray-200 rounded-md p-2 w-full" name="picture" value="{{ old('picture') }}">
                @error('picture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course description input -->
            <div class="mb-6">
                <label for="description" class="block text-lg font-medium mb-1">Description:</label>
                <textarea name="description" class="border border-gray-200 rounded p-2 w-full" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Course content input -->
            <div class="mb-6">
                <label for="content" class="block text-lg font-medium mb-1">Content:</label>
                <textarea name="content" class="border border-gray-200 rounded p-2 w-full" rows="5">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit button -->
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Create Course
            </button>
        </form>
    </div>
</x-layout>
