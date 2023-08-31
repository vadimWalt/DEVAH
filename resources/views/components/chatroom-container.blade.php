<div {{ $attributes->merge(['class' => '']) }}>
    <h2 class="text-2xl font-semibold mb-4">Chat Room</h2>

    @if ($course->chatroom)
        <div class="border border-gray-200 rounded p-4">
            <!-- Display chat messages here -->
            @foreach ($course->chatroom->messages as $message)
                <p>{{ $message->content }}</p>
            @endforeach

            <!-- Chat message input form -->
            <form action="/chatmessages" method="POST">
                @csrf
                <input type="hidden" name="chatroom_id" value="{{ $course->chatroom->id }}">
                <div class="mb-2">
                    @error('chatMessage')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="chatMessage" value="{{ old('chatMessage') }}" />
                </div>
                <div>
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        <i class="far fa-paper-plane"></i> Send
                    </button>
                </div>
            </form>
        </div>
    @else
        <p>No chat room available for this course.</p>
    @endif
</div>
