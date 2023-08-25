<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Manage my profile
            </h2>
            <p class="mb-4">Change my profile prefferences</p>
        </header>
        <form action="/users" method="POST" enctype="multipart/form-data">
            @auth
                @csrf {{-- don't forget ;) --}}

                {{-- user role --}}
                <div class="mb-6">
                    <h4 class="text-l font-bold uppercase mb-1">Role:</h4>

                    <label class="inline-block text-lg mb-2">{{ auth()->user()->role }}</label>

                </div>
                {{-- user name --}}
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">
                        Name
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        value="{{ auth()->user()->name }}" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- pfp --}}
                <div class="mb-6">
                    <label for="profile_picture" class="inline-block text-lg mb-2">Current Profile Picture</label>
                    {{-- preview --}}
                    <img class="border border-gray-200 rounded p-2 w-full" src="{{ auth()->user()->profile_picture }}"
                        alt="Current Profile Picture" />

                </div>
                {{-- select a new picture --}}
                <div class="mb-6">
                    <label for="profile_picture" class="inline-block text-lg mb-2">Change Picture</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="profile_picture"
                        value="{{ auth()->user()->profile_picture }}" />
                    @error('profile_picture')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- address fields --}}
                <div class="mb-6">
                    <label for="city" class="inline-block text-lg mb-2">City</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="city"
                        value="{{ auth()->user()->city }}" />
                    @error('city')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="zip_code" class="inline-block text-lg mb-2">zip Code</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="zip_code"
                        value="{{ auth()->user()->zip_code }}" />
                    @error('zip_code')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="street" class="inline-block text-lg mb-2">Street</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="street"
                        value="{{ auth()->user()->street }}" />
                    @error('street')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="country" class="inline-block text-lg mb-2">Country</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="country"
                        value="{{ auth()->user()->country }}" />
                    @error('country')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- submit button --}}
                <button class="mb-6 bg-laravel text-white rounded py-2 px-4 hover:bg-gray">
                    Update
                </button>
            </form>
            <form action="/users/{{ auth()->user()->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white rounded py-2 px-4 hover:bg-gray">
                    Delete User
                </button>
            </form>
        @else
            <h1>YOU ARE NOT LOGGED IN !</h1>
        @endauth
    </div>
</x-layout>
