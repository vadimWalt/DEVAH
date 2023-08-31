<!-- resources/views/chatroom/show.blade.php -->

<x-layout>

    <link rel="stylesheet" href="{{ asset('styles/chatRoomsStyle.css') }}">


    <div class="chatroom">
       
        <div class="messages flex-col-reverse">
            <!-- Display chat messages here -->
            
          
            @foreach ($messages as $message)
                <x-message-card class="{{ auth()->user() ? 'align-end' : '' }}" username="{{ $message->user->name }}"
                    messageContent="{{ $message->message }}" timestamp="{{ $message->created_at }}" />
            @endforeach
        </div>
        <div class="input-area">
            <form action="/message" method="POST">
                @csrf


                <div class="sendMessageContainer">
                    <input type="text" id="send-message" name="send-message" class="border rounded p-2 w-full">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-indigo-600">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
