<?php

namespace App\Services;
use LucianoTonet\GroqPHP\Groq;

use Illuminate\Http\Request;

class GroqService
{
    public function summary(Request $request)
    {
        $groq = new Groq(config('groq.api_key'));

        $response = $groq->chat()->completions()->create([
            'model' => config('groq.model'),
            'messages' => [

                [
                    'role' => 'system',
                    'content' => "You are an API. You shall respond only with valid JSON.
                    
                    The JSON schema will look like this:
                    {
                        'title': 'string(the datatype of the title)',
                    }
                    ",
                ],

                [
                    'role' => 'user',
                    'content' => "Here is the note: " . $request->note,
                ]
            ],
            'response_format' => ['type' => 'json_object']
        ]);

        return $response['choices'][0]['message']['content'];

    }

}