<x-layout>
    <div class="mx-4">
        <x-card class="p-10">
            <h2 class="text-2xl font-bold mb-6">Create a New Course</h2>
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 p-2 w-full border rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="6"
                        class="mt-1 p-2 w-full border rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="picture" class="block text-sm font-medium text-gray-700">Picture URL</label>
                    <input type="text" name="picture" id="picture" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <input type="hidden" name="teacher_id" value="{{ auth()->user()->id }}">
                <!-- Assuming the authenticated user is the teacher -->

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Course</button>
            </form>
        </x-card>
    </div>
</x-layout>
