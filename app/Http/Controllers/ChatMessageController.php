<?php
 /*index and create for chatMessage*/
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    public function index()
    {
        $chatMessages = ChatMessage::all(); // Fetch all chat messages from the database

        return view('chatmessage.index', compact('chatMessages'));
    }


    public function store(Request $request, $chat_room_id)
    {
        $formFields = $request->validate([
            'chatMessage' => 'required',
        ]);

        // Add the logged-in user's ID and the chat room ID to the new message
        $formFields['user_id'] = auth()->user()->id;
        $formFields['chat_room_id'] = $chat_room_id; // Retrieve chat room ID from URL

        ChatMessage::create($formFields);

        // Redirect back to the chat room
        return redirect()->route('chatmessage.index', ['chat_room_id' => $chat_room_id]);
    }

}