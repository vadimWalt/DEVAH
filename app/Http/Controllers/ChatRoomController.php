<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom; // Make sure to import the Chat model
use Illuminate\Http\Request;

class ChatRoomController extends Controller
{
    public function show(ChatRoom $chat)
    {
        // Fetch chat messages and participants (replace with your actual logic)
        $participants = $chat->user_id;
        $messages = $chat->messages->load('user'); // Load user relationship
        $messages = ChatMessage::where('chat_rooms_id' , 1)->get();

        // Pass data to the view and render it
        return view('chatrooms.show', compact('messages'));
    }
}
