<form action="{{ route('chatmessage.store') }}" method="POST">

            @csrf
            <label for="chatMessage">Message:</label>
            <input type="text" name="chatMessage" id="chatMessage" required>
            <button type="submit">Send Message</button>
        </form>

        <a href="{{ route('chatmessage.index') }}">Back to Messages</a>



