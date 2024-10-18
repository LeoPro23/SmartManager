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

    public function interpretRatios($ratios, $contextoEmpresa)
    {
        $interpretations = [];

        // Crear un texto para el contexto de la empresa
        $contexto = "Contexto de la Empresa:\n";
        $contexto .= "Nombre: " . $contextoEmpresa['nombre_empresa'] . "\n";
        $contexto .= "Descripción: " . $contextoEmpresa['descripcion_empresa'] . "\n";
        $contexto .= "Sector: " . $contextoEmpresa['sector'] . "\n";
        $contexto .= "Años de existencia: " . $contextoEmpresa['anos_existencia'] . "\n\n";

        foreach ($ratios as $name => $value) {
            // Generar una interpretación para cada ratio usando el contexto de la empresa
            $prompt = $contexto . "Genera una interpretación financiera desde la perspectiva de un gerente para el siguiente ratio: $name con un valor de $value.";

            $openai = OpenAI::client(config('services.openai.key'));

            $response = $openai->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'Eres un experto financiero que ayuda a interpretar ratios financieros de manera correcta, concisa y precisa.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt,
                    ],
                ],
                'max_tokens' => 300,
                'temperature' => 0.7,
            ]);

            $interpretations[$name] = $response['choices'][0]['message']['content'];
        }

        return $interpretations;
    }

}
