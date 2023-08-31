<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account to make Courses as a Teacher or enroll to a course as a Student</p>
        </header>

        <form action="/users" method="POST" enctype="multipart/form-data">
            @csrf {{-- don't forget ;) --}}

            {{-- user role --}}
            <div class="mb-6">
                <h4 class="text-l font-bold uppercase mb-1">Pick a role:</h4>
                <div class="flex justify-evenly">
                    <div class="flex gap-2">
                        <input type="radio" class="" name="role" value="teacher" />
                        <label for="teacher" class="inline-block text-lg mb-2">Teacher</label>
                    </div>
                    <div class="flex gap-2">
                        <input type="radio" class="" name="role" value="student" />
                        <label for="student" class="inline-block text-lg mb-2">Student</label>
                    </div>
                </div>
                @error('role')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- user name --}}
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Name:</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- user email --}}
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email:</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- pfp --}}
            <div class="mb-6">
                <label for="profile_picture" class="inline-block text-lg mb-2">Profile Picture:</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="profile_picture"
                    value="{{ old('profile_picture') }}" />
                @error('profile_picture')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- password and password confirmation --}}
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2"> Password </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                    value="{{ old('password') }}" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password:</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
            </div>
            {{-- <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
            @error('g-recaptcha-response')
                <p class="text-red-500">{{ $message }}</p>
            @enderror --}}

            {{-- submit button --}}
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Sign Up
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Already have an account?
                    <a href="/login" class="text-laravel">Login</a>
                </p>
            </div>
        </form>
    </div>
</x-layout>
