@extends('layout.plantilla')

@section('nombre_pagina', 'Resultados de los Ratios Financieros')

@section('contenido')
    <div class="container">
        <h1>Resultados de los Ratios Financieros</h1>

        <table class="table-auto w-full mt-6">
            <thead>
                <tr>
                    <th class="px-4 py-2">Ratio</th>
                    <th class="px-4 py-2">Valor</th>
                    <th class="px-4 py-2">Interpretación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ratios as $name => $value)
                    <tr class="bg-gray-100">
                        <td class="border px-4 py-2">{{ $name }}</td>
                        <td class="border px-4 py-2">{{ number_format($value, 2) }}</td>
                        <td class="border px-4 py-2">{{ $interpretations[$name] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('ratios.form') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Volver a la Calculadora</a>
        </div>
    </div>
@endsection
