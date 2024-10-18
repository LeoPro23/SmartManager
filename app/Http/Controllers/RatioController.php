<?php

namespace App\Http\Controllers;

use App\Services\OpenAIService;
use Illuminate\Http\Request;

class RatioController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function calcular(Request $request)
    {
        // Valores contables que recibimos del formulario
        $activoCorriente = $request->input('activo_corriente');
        $pasivoCorriente = $request->input('pasivo_corriente');
        $ventasNetas = $request->input('ventas_netas');
        $utilidadNeta = $request->input('utilidad_neta');
        $patrimonio = $request->input('patrimonio');

        // Cálculos de ratios
        $ratioLiquidezCorriente = $activoCorriente / $pasivoCorriente;
        $rentabilidadPatrimonio = $utilidadNeta / $patrimonio;
        // Otros ratios...

        // Interpretación usando OpenAI
        $interpretacionLiquidezCorriente = $this->openAIService->getInterpretation('Ratio de Liquidez Corriente', $ratioLiquidezCorriente);
        $interpretacionRentabilidadPatrimonio = $this->openAIService->getInterpretation('Rentabilidad sobre Patrimonio', $rentabilidadPatrimonio);
        // Interpretaciones para otros ratios...

        return view('ratios.resultados', [
            'ratioLiquidezCorriente' => $ratioLiquidezCorriente,
            'interpretacionLiquidezCorriente' => $interpretacionLiquidezCorriente,
            'rentabilidadPatrimonio' => $rentabilidadPatrimonio,
            'interpretacionRentabilidadPatrimonio' => $interpretacionRentabilidadPatrimonio,
            // Otros ratios e interpretaciones...
        ]);
    }
}
