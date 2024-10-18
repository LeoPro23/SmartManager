@extends('layout.plantilla')

@section('nombre_pagina', 'Formulario de Ratios Financieros')

@section('contenido')
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Calculadora de Ratios Financieros</h1>

        <form action="{{ route('ratios.calculate') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Campos del contexto de la empresa -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nombre_empresa" class="block text-sm font-medium text-gray-700">Nombre de la Empresa</label>
                    <input type="text" name="nombre_empresa" id="nombre_empresa" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="descripcion_empresa" class="block text-sm font-medium text-gray-700">Descripción de la Empresa</label>
                    <textarea name="descripcion_empresa" id="descripcion_empresa" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>

                <div>
                    <label for="sector" class="block text-sm font-medium text-gray-700">Sector</label>
                    <input type="text" name="sector" id="sector" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="anos_existencia" class="block text-sm font-medium text-gray-700">Años de Existencia</label>
                    <input type="number" name="anos_existencia" id="anos_existencia" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
            </div>

            <br>
            <div class="text-2xl font-bold text-gray-800 mb-6 text-center">Datos financieros</div>

            <!-- Campos de datos financieros -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="activo_corriente" class="block text-sm font-medium text-gray-700">Activo Corriente</label>
                    <input type="number" step="0.01" name="activo_corriente" id="activo_corriente" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="pasivo_corriente" class="block text-sm font-medium text-gray-700">Pasivo Corriente</label>
                    <input type="number" step="0.01" name="pasivo_corriente" id="pasivo_corriente" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="inventarios" class="block text-sm font-medium text-gray-700">Inventarios</label>
                    <input type="number" step="0.01" name="inventarios" id="inventarios" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="pasivo_total" class="block text-sm font-medium text-gray-700">Pasivo Total</label>
                    <input type="number" step="0.01" name="pasivo_total" id="pasivo_total" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="activo_total" class="block text-sm font-medium text-gray-700">Activo Total</label>
                    <input type="number" step="0.01" name="activo_total" id="activo_total" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="patrimonio" class="block text-sm font-medium text-gray-700">Patrimonio</label>
                    <input type="number" step="0.01" name="patrimonio" id="patrimonio" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="utilidad_operativa" class="block text-sm font-medium text-gray-700">Utilidad Operativa</label>
                    <input type="number" step="0.01" name="utilidad_operativa" id="utilidad_operativa" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="gastos_intereses" class="block text-sm font-medium text-gray-700">Gastos de Intereses</label>
                    <input type="number" step="0.01" name="gastos_intereses" id="gastos_intereses" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="ventas" class="block text-sm font-medium text-gray-700">Ventas</label>
                    <input type="number" step="0.01" name="ventas" id="ventas" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="ventas_credito" class="block text-sm font-medium text-gray-700">Ventas a Crédito</label>
                    <input type="number" step="0.01" name="ventas_credito" id="ventas_credito" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="cuentas_por_cobrar" class="block text-sm font-medium text-gray-700">Cuentas por Cobrar</label>
                    <input type="number" step="0.01" name="cuentas_por_cobrar" id="cuentas_por_cobrar" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="utilidad_neta" class="block text-sm font-medium text-gray-700">Utilidad Neta</label>
                    <input type="number" step="0.01" name="utilidad_neta" id="utilidad_neta" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>
            </div>

            <div class="mt-6 text-center">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md font-medium shadow-lg">Calcular Ratios</button>
            </div>
        </form>
    </div>
@endsection
