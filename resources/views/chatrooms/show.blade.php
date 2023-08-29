<!-- resources/views/chatroom/show.blade.php -->

<x-layout>


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
            <form action="/message">
                <label for="send-message"></label>
            </form>
        </div>
    </div>

</x-layout>
