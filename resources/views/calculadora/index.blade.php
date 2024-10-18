@extends('layout.plantilla')

@section('contenido')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-8">Calculadora Financiera</h1>

    <form action="{{ route('calculadora.calcular') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label for="fsc" class="block mb-2 text-sm font-medium text-gray-700">Factor Simple de Capitalización (FSC)</label>
                <input type="number" name="fsc" id="fsc" class="block w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <div>
                <label for="fsa" class="block mb-2 text-sm font-medium text-gray-700">Factor Simple de Actualización (FSA)</label>
                <input type="number" name="fsa" id="fsa" class="block w-full p-2 border border-gray-300 rounded-lg" required>
            </div>
            <!-- Agregar los demás campos de las fórmulas -->
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Calcular</button>
    </form>
</div>
@endsection
