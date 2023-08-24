<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    // store new chatMessage in DB
    public function store(Request $request)
    {
        $formFields = $request->validate([
            // here we will add what rules we want for our fields
            'chatMessage' => 'required',
        ]);

        // this will add the logged in user id to the new message
        $formFields['user_id'] = auth()->id();

        ChatMessage::create($formFields);

            /* add a return to refresh the chatRoom and show the new message that's been sent */;
    }
}
