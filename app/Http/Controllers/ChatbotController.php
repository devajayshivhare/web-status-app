<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function getMessage(Request $request)
    {
        $message = $request->input('message');

        // Simple bot logic (can be replaced with AI integration)
        $responses = [
            'hello' => 'Hi there! How can I help you?',
            'hi' => 'Hello! How can I help you?',
            'how are you' => 'I am just a bot, but I am doing great!',
            'bye' => 'Goodbye! Have a great day!',
        ];

        $reply = $responses[strtolower($message)] ?? "Sorry, I didn't understand that.";

        return response()->json(['reply' => $reply]);
    }
}
