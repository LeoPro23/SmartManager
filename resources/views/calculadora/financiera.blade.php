@extends('layout.plantilla')

@section('nombre_pagina', 'Calculadora Financiera')

@section('contenido')
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold mb-8">Calculadora Financiera</h1>

        <form method="POST" action="{{ route('calcularformula') }}">
            @csrf
            <div class="mb-6">
                <label for="formula" class="block mb-2 text-sm font-medium text-gray-900">Selecciona la fórmula</label>
                <select id="formula" name="formula" class="block w-full p-2 border rounded-lg" required>
                    <option value="FSC">Factor Simple de Capitalización (FSC)</option>
                    <option value="FSA">Factor Simple de Actualización (FSA)</option>
                    <option value="FCS">Factor de Capitalización de la Serie (FCS)</option>
                    <option value="FDFA">Factor de Depósito al Fondo de Amortización (FDFA)</option>
                    <option value="FAS">Factor de Actualización de la Serie (FAS)</option>
                    <option value="FRC">Factor de Recuperación del Capital (FRC)</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="monto_inicial" class="block mb-2 text-sm font-medium text-gray-900">Monto Inicial</label>
                <input type="number" id="monto_inicial" name="monto_inicial" class="block w-full p-2 border rounded-lg" required>
            </div>

            <div class="mb-6">
                <label for="plazo" class="block mb-2 text-sm font-medium text-gray-900">Plazo (en años)</label>
                <input type="number" id="plazo" name="plazo" class="block w-full p-2 border rounded-lg" required>
            </div>

            <div class="mb-6">
                <label for="tasa_interes" class="block mb-2 text-sm font-medium text-gray-900">Tasa de Interés (%)</label>
                <input type="number" id="tasa_interes" name="tasa_interes" step="0.01" class="block w-full p-2 border rounded-lg" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Calcular</button>
        </form>
    </div>
@endsection
