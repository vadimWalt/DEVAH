<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatRoom; // Make sure to import the Chat model


class ChatRoomController extends Controller
{
    public function show($id)
    {

        $chatRoom = ChatRoom::findOrFail($id);
        // Fetch chat messages and participants (replace with your actual logic)
        $messages = ChatMessage::where('chat_rooms_id' , $chatRoom->id)->get();
        // $messages = $chatRoom->messages->load('user'); // Load user relationship

        // Pass data to the view and render it
        return view('chatrooms.show', compact('messages', 'chatRoom'));    }
}