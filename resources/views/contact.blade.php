<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Contact Us
            </h2>
            <p class="mb-4">Fill in the fields with usefull information</p>
        </header>

        <form action="/contact" method="POST">
            @csrf {{-- don't forget ;) --}}

            {{-- HANDLING ERRORS --}}
            @if ($errors->any())
                <div class="text-red-500 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- user name --}}
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" placeholder="Minimum 3 chars ..." />
            </div>

            {{-- user email --}}
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" placeholder="example@domain.smth ..." />
            </div>

            {{-- user message --}}
            <div class="mb-6">
                <label for="message" class="inline-block text-lg mb-2">
                    Your message:
                </label>
                <textarea rows="5" class="border border-gray-200 rounded p-2 w-full" name="message" value="{{ old('message') }}"
                    placeholder="Minimum chars 5 ..."></textarea>
            </div>

            {{-- submit button --}}
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Send
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Do you want to register instead?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </div>
</x-layout>
