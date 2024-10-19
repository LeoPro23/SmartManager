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
        // Get inputs
        $formula = $request->input('formula');
        $montoInicial = $request->input('monto_inicial');
        $plazo = $request->input('plazo');
        $tasaInteres = $request->input('tasa_interes') / 100; // convert to decimal
        $periodicidadPlazo = $request->input('periodicidad_plazo'); // e.g., Anual, Mensual
        $periodicidadTasa = $request->input('periodicidad_tasa'); // e.g., Anual, Mensual

        // Adjust interest rate and term based on periodicity
        list($tasaInteres, $plazo) = $this->ajustarPorPeriodicidad($tasaInteres, $plazo, $periodicidadPlazo, $periodicidadTasa);
        
        $resultado = 0;
        $datosExtras = [];

        // Financial formulas
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
            'tasaInteres' => $tasaInteres * 100, // return as percentage
            'datosExtras' => $datosExtras,
            'periodoPlazo' => $periodicidadPlazo,
            'periodoTasa' => $periodicidadTasa,
        ]);
    }

    private function ajustarPorPeriodicidad($tasaInteres, $plazo, $periodicidadPlazo, $periodicidadTasa)
    {
        // Convert all to monthly basis
        switch ($periodicidadTasa) {
            case 'Anual':
                $tasaInteres = $tasaInteres / 12;
                break;
            case 'Semestral':
                $tasaInteres = $tasaInteres / 6;
                break;
            case 'Trimestral':
                $tasaInteres = $tasaInteres / 3;
                break;
        }

        switch ($periodicidadPlazo) {
            case 'Anual':
                $plazo = $plazo * 12;
                break;
            case 'Semestral':
                $plazo = $plazo * 6;
                break;
            case 'Trimestral':
                $plazo = $plazo * 3;
                break;
        }

        return [$tasaInteres, $plazo];
    }
}
