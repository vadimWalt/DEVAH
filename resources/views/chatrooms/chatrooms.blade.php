<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Chat Room (static page for now)
            </h2>
            <p class="mb-4">Empty paragraph tag I don't know why I keep it but anyways...</p>
        </header>
        {{-- here is where the chats messages are displayed --}}
        <x-chatroom-container />

        {{-- a user form so the user can send messages --}}
        {{-- also it has three main elements --}}
        {{-- 1. user profile photo or any other relevant information(i.e. the role of the user in this room, etc.). --}}
        {{-- the user can click on this element to be redirected to his profile view --}}

        {{-- 2. and 3. an input field that expand upwards if text is too long with a button to send the message --}}
        <form action="/{{-- chatMessages --}}" method="POST">
            @csrf {{-- don't forget ;) --}}
            <div class="mb-6">
                @error('message')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <label for="chatMessage" class=""><img class="w-24 logo" src="{{-- {{ $user->profile_picture }} --}}"
                        alt="" />
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="chatMessage"
                    value="{{ old('chatMessage') }}" />
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    <i class="fa-regular fa-paper-plane"></i> send
                </button>
            </div>

        </form>
    </div>
</x-layout>



