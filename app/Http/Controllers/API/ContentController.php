<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => 'prepare short description, outcomes, requirements, description for a course titled ' . $request->input('title') . ' as key value pairs. keys are short_description, outcomes, requirements, description'],
            ],
        ]);

        $contents = json_decode($result->choices[0]->message->content, true);

        return response()->json([
            'contents' => $contents
        ]);
    }
}
