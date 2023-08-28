<x-layout>
    <div class="container mx-auto mt-8 p-8">
        <h2 class="text-3xl font-semibold mb-4">Create New Course</h2>
        <form action="/courses" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-lg font-medium mb-1">Title</label>
                <input type="text" name="title" id="title" class="border rounded-md p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="picture" class="block text-lg font-medium mb-1">Picture URL</label>
                <input type="url" name="picture" id="picture" class="border rounded-md p-2 w-full">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium mb-1">Description</label>
                <textarea name="description" id="description" class="border rounded-md p-2 w-full" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-lg font-medium mb-1">Content</label>
                <textarea name="content" id="content" class="border rounded-md p-2 w-full" rows="5"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white rounded-md py-2 px-4">Create Course</button>
        </form>
    </div>
</x-layout>
