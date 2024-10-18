<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function show()
    {
        return view('calculadora.financiera');
    }

    public function calcular(Request $request)
    {
        $formula = $request->input('formula');
        $montoInicial = $request->input('monto_inicial');
        $plazo = $request->input('plazo');
        $tasaInteres = $request->input('tasa_interes') / 100; // Se convierte el porcentaje a decimal
        $resultado = 0;
        $datosExtras = [];

        switch ($formula) {
            case 'FSC': // Factor Simple de Capitalización
                $resultado = $montoInicial * pow(1 + $tasaInteres, $plazo);
                $interesesGanados = $resultado - $montoInicial;
                $datosExtras['intereses_ganados'] = $interesesGanados;
                break;

            case 'FSA': // Factor Simple de Actualización
                $resultado = $montoInicial / pow(1 + $tasaInteres, $plazo);
                $descuento = $montoInicial - $resultado;
                $datosExtras['descuento'] = $descuento;
                break;

            case 'FCS': // Factor de Capitalización de la Serie
                $resultado = (pow(1 + $tasaInteres, $plazo) - 1) / $tasaInteres;
                $totalPagos = $resultado * $montoInicial;
                $datosExtras['total_pagos'] = $totalPagos;
                break;

            case 'FDFA': // Factor de Depósito al Fondo de Amortización
                $resultado = $tasaInteres / (pow(1 + $tasaInteres, $plazo) - 1);
                $pagoAnual = $montoInicial * $resultado;
                $datosExtras['pago_anual'] = $pagoAnual;
                break;

            case 'FAS': // Factor de Actualización de la Serie
                $resultado = (1 - pow(1 + $tasaInteres, -$plazo)) / $tasaInteres;
                $valorActual = $resultado * $montoInicial;
                $datosExtras['valor_actual'] = $valorActual;
                break;

            case 'FRC': // Factor de Recuperación del Capital
                $resultado = $tasaInteres * pow(1 + $tasaInteres, $plazo) / (pow(1 + $tasaInteres, $plazo) - 1);
                $pagoAnual = $montoInicial * $resultado;
                $datosExtras['pago_anual'] = $pagoAnual;
                break;

            default:
                $resultado = 'Fórmula no reconocida';
                break;
        }

        return view('calculadora.resultado', [
            'resultado' => $resultado,
            'formula' => $formula,
            'montoInicial' => $montoInicial,
            'plazo' => $plazo,
            'tasaInteres' => $tasaInteres * 100, // Devolvemos el valor en porcentaje
            'datosExtras' => $datosExtras,
        ]);
    }
}
