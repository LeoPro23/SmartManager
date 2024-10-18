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
        // Datos financieros que vendrán del formulario
        $financialData = $request->all();

        // Calcular ratios financieros
        $ratios = $this->financialRatiosService->calculateRatios($financialData);

        // Obtener interpretaciones de OpenAI
        $interpretations = $this->openAIService->interpretRatios($ratios);

        // Retornar una vista con los ratios y las interpretaciones
        return view('ratios.resultados', compact('ratios', 'interpretations'));
    }
}
