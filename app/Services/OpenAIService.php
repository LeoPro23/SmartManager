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

        $response = $openai->completions()->create([
            'model' => 'gpt-3.5-turbo',
            'prompt' => $prompt,
            'max_tokens' => 150,
            'temperature' => 0.7,
        ]);

        return $response['choices'][0]['text'];
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
