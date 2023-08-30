<?php
 /*index and create for chatMessage*/
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    // Store new chatMessage in DB
    public function index()
    {
        $chatMessages = ChatMessage::all(); // Fetch all chat messages from the database

        return view('chatmessage.index', compact('chatMessages'));
    }

    public function create()
    {
        return view('chatmessage.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'chatMessage' => 'required',
            'chatroom_id' => 'required|exists:chat_rooms,id', // Make sure the provided chatroom_id exists in the chat_rooms table
        ]);

        // Add the logged in user id to the new message
        $formFields['user_id'] = auth()->id();

        // Create the new chat message
        ChatMessage::create($formFields);

        // Redirect back to the course's show page with a message
        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
