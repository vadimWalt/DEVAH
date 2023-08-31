<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Manage my profile
            </h2>
        </header>
        @auth
            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- don't forget ;) --}}
                @method('PUT')
                {{-- user role --}}
                <div class="mb-6">
                    <h4 class="text-l font-bold uppercase mb-1">Role:</h4>

                    <label class="inline-block text-lg mb-2">{{ $user->role }}</label>
                </div>
                
                {{-- user name --}}
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        value="{{ $user->name }}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- pfp --}}
                <div class="mb-6">
                    <label for="profile_picture" class="inline-block text-lg mb-2">Current Profile Picture</label>
                    {{-- preview --}}
                    <img class="border border-gray-200 rounded p-2" src="{{ asset('storage/' . $user->profile_picture) }}"
                        alt="Current Profile Picture" width="100px" height="100px" />
                </div>

                {{-- select a new picture --}}
                <div class="mb-6">
                    <label for="profile_picture" class="inline-block text-lg mb-2">Change Picture</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="profile_picture"
                        value="{{ $user->profile_picture }}" />
                    @error('profile_picture')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- submit button --}}
                <button class="mb-6 bg-laravel text-white rounded py-2 px-4 hover:bg-gray">
                    Update
                </button>
            </form>
            <form action="/users/{{ $user->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-gray">
                    Delete User
                </button>
            </form>
        @else
            <h1>YOU ARE NOT SUPPOSED TO BE HERE !</h1>
        @endauth
    </div>
</x-layout>
