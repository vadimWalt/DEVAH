<!-- resources/views/chatroom/show.blade.php -->

<x-layout>

    <style>
        form{
        color: blueviolet;
        }
    </style>


    <div class="chatroom">
        <div class="participants">
            <!-- Display participants here -->
        </div>
        <div class="messages flex-col-reverse">
            <!-- Display chat messages here -->
            @foreach ($messages as $message)
                <x-message-card class="{{ auth()->user() ? 'align-end' : '' }}" username="{{ $message->user->name }}"
                    messageContent="{{ $message->message }}" timestamp="{{ $message->created_at }}" />
            @endforeach
        </div>
        <div class="input-area">
            <form action="/message" method="POST">
                <label for="send-message"></label>
                @csrf
                <input type="text" id="send-message" name="send-message" class="border rounded p-2 w-full">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                    Send
                </button>
            </form>
        </div>
    </div>

</x-layout>
