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

    public function create()
    {
        return view('chatmessage.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'chatMessage' => 'required',
        ]);

        // This will add the logged-in user's ID to the new message
        $formFields['user_id'] = auth()->id();

        ChatMessage::create($formFields);

        // Redirect back to the chat messages index page
        return redirect()->route('chatmessage.index');
    }
}
