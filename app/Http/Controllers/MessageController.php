<?php

namespace App\Http\Controllers;

use App\Jobs\SendMessage;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::with('user')->get()->append('time');

        return response()->json($messages);
    }

    public function store(Request $request): JsonResponse {
        $conversation = Conversation::with('user')->findOrFail($request->get('id'));

        $message = Message::create([
            'user_id' => auth()->id(),
            'conversation_id' => $request->get('conversation_id'),
            'text' => $request->get('text'),
        ]);

        SendMessage::dispatch($message);

        return response()->json([
            'sucess' => true,
            'message' => "Message created and job dispatched",
            'more' => $message
        ]);
    }
}
