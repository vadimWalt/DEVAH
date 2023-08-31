<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom; // Make sure to import the Chat model


class ChatRoomController extends Controller
{
    public function show(ChatRoom $chat)
    {

        $chatRoom = ChatRoom::findOrFail($chat);
        // Fetch chat messages and participants (replace with your actual logic)
        $messages = $chat->messages->load('user'); // Load user relationship
        $messages = ChatMessage::where('chat_rooms_id' , $chat->id)->get();

        // Pass data to the view and render it
        return view('chatrooms.show', compact('messages', 'chatRoom'));    }
}