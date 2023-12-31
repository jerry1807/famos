<?php

namespace App\Http\Controllers;

use App\Models\Aiwebchat;
use Illuminate\Http\Request;

class AiWebChatController extends Controller
{
    // Display the AI web chat view
    public function index()
    {
        $chatHistory = Aiwebchat::where('user_id', auth()->user()->id)->get();
        return view('user.aiwebchat.index', compact('chatHistory'));
    }
    

    

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $chat = Aiwebchat::where('message_code', $request->input('code'))->first();

            if ($chat) {
                if ($chat->user_id == auth()->user()->id) {
                    $chat->delete();

                    if (session()->has('message_code')) {
                        session()->forget('message_code');
                    }

                    $data['status'] = 'success';
                    return $data;
                } else {
                    $data['status'] = 'error';
                    $data['message'] = __('There was an error while deleting the chat history');
                    return $data;
                }
            } else {
                $data['status'] = 'empty';
                return $data;
            }
        }
    }

    public function rename(Request $request)
    {
        if ($request->ajax()) {
            $chat = Aiwebchat::where('message_code', $request->input('code'))->first();

            if ($chat) {
                if ($chat->user_id == auth()->user()->id) {
                    $chat->title = $request->input('name');
                    $chat->save();

                    $data['status'] = 'success';
                    $data['code'] = $request->input('code');
                    return $data;
                } else {
                    $data['status'] = 'error';
                    $data['message'] = __('There was an error while changing the chat title');
                    return $data;
                }
            }
        }
    }

    public function saveChat(Request $request)
    {
        $userMessage = $request->input('user_message');
        $botResponse = $request->input('bot_response');

        Aiwebchat::create([
            'user_id' => auth()->user()->id, // Replace with the appropriate user ID source
            'chat_code' => 'AI-WEB-CHAT', // Assign your desired chat code
            'message_code' => 'Your_Message_Code', // Assign your desired message code
            'chat' => [
                ['user' => 'User Message: ' . $userMessage], // Assign a prefix or label
                ['bot' => 'Bot Response: ' . $botResponse], // Assign a prefix or label
            ],
            'title' => 'Chat Title',
        ]);
        

        return response()->json(['message' => $botResponse], 200);
    }


    public function getChatHistory(){
        $chatHistory = Aiwebchat::where('user_id', auth()->user()->id)->get();
        return response()->json($chatHistory);
    }
    
}
