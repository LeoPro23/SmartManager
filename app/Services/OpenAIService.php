<?php

namespace App\Services;

use OpenAI;

class OpenAIService
{
    public function getInterpretation($ratioName, $ratioValue)
    {
        $openai = OpenAI::client(config('services.openai.key'));

        $prompt = "Genera una interpretación financiera desde la perspectiva de un gerente para el siguiente ratio: 
                   $ratioName con un valor de $ratioValue. Explica qué significa para la empresa.";

        
        /*
        $response = $openai->completions()->create([
            'model' => 'gpt-3.5-turbo',
            'prompt' => $prompt,
            'max_tokens' => 150,
            'temperature' => 0.7,
        ]);
        */
        $response = $openai->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Eres un asistente financiero que ayuda a interpretar ratios financieros.',
                ],
                [
                    'role' => 'user',
                    'content' => "Genera una interpretación financiera desde la perspectiva de un gerente para el siguiente ratio: $ratioName con un valor de $ratioValue. Explica qué significa para la empresa.",
                ],
            ],
            'max_tokens' => 150,
            'temperature' => 0.7,
        ]);

        //return $response['choices'][0]['text'];
        return $response['choices'][0]['message']['content'];
    }

    public function interpretRatios($ratios)
    {
        $interpretations = [];
        
        foreach ($ratios as $name => $value) {
            $interpretations[$name] = $this->getInterpretation($name, $value);
        }
        
        return $interpretations;
    }
}
