<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FinancialRatiosService;
use App\Services\OpenAIService;

class FinancialController extends Controller
{
    protected $financialRatiosService;
    protected $openAIService;

    public function __construct(FinancialRatiosService $financialRatiosService, OpenAIService $openAIService)
    {
        $this->financialRatiosService = $financialRatiosService;
        $this->openAIService = $openAIService;
    }

    public function calculateAndInterpretRatios(Request $request)
    {
        // Datos financieros y de la empresa que vendrán del formulario
        $financialData = $request->all();

        // Separar los datos de contexto de la empresa
        $contextoEmpresa = [
            'nombre_empresa' => $request->input('nombre_empresa'),
            'descripcion_empresa' => $request->input('descripcion_empresa'),
            'sector' => $request->input('sector'),
            'anos_existencia' => $request->input('anos_existencia'),
        ];

        // Calcular ratios financieros
        $ratios = $this->financialRatiosService->calculateRatios($financialData);

        // Obtener interpretaciones de OpenAI, pasando el contexto de la empresa
        $interpretations = $this->openAIService->interpretRatios($ratios, $contextoEmpresa);

        // Retornar una vista con los ratios y las interpretaciones
        return view('ratios.resultados', compact('ratios', 'interpretations'));
    }

}
