<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Course
            </h2>
            <p class="mb-4">Edit : {{$course->title}}</p>
        </header>
    
        {{-- GET and POST won't cut it anymore since we want to update the course --}}
        {{-- instead, we'll use one of the two HTTP methods to update data --}}
        {{-- PUT = override all previous data with new one --}}
        {{-- PATCH = override just the fields that changed --}}
        <form action="/courses/{{$course->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="tutor" class="inline-block text-lg mb-2">Tutor</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tutor" value="{{$course->tutor}}" />
                @error('tutor')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Course Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$course->title}}"
                    placeholder="Example: Senior Laravel Developer" />
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Course Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{$course->location}}"
                    placeholder="Example: Remote, Boston MA, etc" />
                    @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$course->email}}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{$course->website}}" />
                @error('website')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" value="{{$course->tags}}"
                    placeholder="Example: Laravel, Backend, Postgres, etc" />
                    @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                <img class="w-48 mr-6 mb-6" src="{{$course->logo ? asset('storage/' . $course->logo) : asset('images/no-image.png')}}" alt="" id="currentImage">
                @error('logo')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Course Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{$course->description}}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Course
                </button>
    
                <a href="/courses/{{$course->id}}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>