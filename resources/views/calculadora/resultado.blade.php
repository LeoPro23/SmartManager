@extends('layout.plantilla')

@section('nombre_pagina', 'Resultado Calculadora Financiera')

@section('contenido')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Resultado del Cálculo</h1>

        <p><strong>Fórmula seleccionada:</strong> {{ $formula }}</p>
        <p><strong>Monto Inicial:</strong> {{ $montoInicial }}</p>
        <p><strong>Plazo ({{ $periodoTasa}}):</strong> {{ $plazo }}</p>
        <p><strong>Tasa de Interés:</strong> {{ $tasaInteres }}%</p>

        <p class="mt-4 text-2xl"><strong>Resultado del cálculo:</strong> {{ $resultado }}</p>

        <!-- Mostrar datos adicionales dependiendo de la fórmula -->
        @if($formula == 'FSC' && isset($datosExtras['intereses_ganados']))
            <p><strong>Intereses Ganados:</strong> {{ $datosExtras['intereses_ganados'] }}</p>
        @endif

        @if($formula == 'FSA' && isset($datosExtras['descuento']))
            <p><strong>Descuento obtenido:</strong> {{ $datosExtras['descuento'] }}</p>
        @endif

        @if($formula == 'FCS' && isset($datosExtras['total_pagos']))
            <p><strong>Total de Pagos:</strong> {{ $datosExtras['total_pagos'] }}</p>
        @endif

        @if($formula == 'FDFA' && isset($datosExtras['pago_anual']))
            <p><strong>Pago:</strong> {{ $datosExtras['pago_anual'] }}</p>
        @endif

        @if($formula == 'FAS' && isset($datosExtras['valor_actual']))
            <p><strong>Valor Actual de la Serie:</strong> {{ $datosExtras['valor_actual'] }}</p>
        @endif

        @if($formula == 'FRC' && isset($datosExtras['pago_anual']))
            <p><strong>Pago:</strong> {{ $datosExtras['pago_anual'] }}</p>
        @endif

        <a href="{{ route('calculadorformula') }}" class="text-blue-600 hover:underline mt-4">Volver a la calculadora</a>
    </div>
@endsection
