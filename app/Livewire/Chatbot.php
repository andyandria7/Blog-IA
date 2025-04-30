<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use Livewire\Component;

class Chatbot extends Component
{
    public array $chats = [];
    public string $input = '';

    public function render()
    {
        return view('livewire.chatbot');
    }

    public function submit()
    {
        $client = new Client();
        $apiUrl = 'https://api-inference.huggingface.co/models/meta-llama/Meta-Llama-3-8B-Instruct'; // Utilisez un modèle compatible
        // $apiUrl = 'https://api-inference.huggingface.co/models/mistralai/Mistral-7B-Instruct-v0.2'; // Utilisez un modèle compatible
        // $apiUrl = 'https://api-inference.huggingface.co/models/gpt2'; 
        $apiKey = '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'; 

        $headers = [
            'Authorization' => 'Bearer ' . $apiKey,
        ];

        $data = [
            'inputs' => $this->input,
            'parameters' => [
                'max_length' => 1000, 
            ],
            
        ];

        $this->chats[] = [
            'user' => 'human',
            'message' => $this->input
        ];

        $this->input = ''; 

        try {
            $response = $client->post($apiUrl, [
                'headers' => $headers,
                'json' => $data,
            ]);

            $result = json_decode($response->getBody()->getContents(), true);

            // Accéder au texte généré
            $generatedText = $result[0]['generated_text'] ?? 'No response from API';

            $this->chats[] = [
                'user' => 'ai',
                'message' => $generatedText
            ];

            

            $this->dispatch('updateChatScroll');
        } catch (\Exception $e) {
            $this->chats[] = [
                'user' => 'ai',
                'message' => 'Error: ' . $e->getMessage()
            ];
        }
    }
}
