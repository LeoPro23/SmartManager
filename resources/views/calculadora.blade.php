@extends('layout.plantilla')

@section('contenido')
<div class="container mx-auto flex flex-row py-10">
    <!-- Sidebar Navigation for Formula Selection -->
    <div class="w-1/4 p-5 bg-gray-200 rounded-lg">
        <h2 class="font-bold text-lg mb-4">Fórmulas Financieras</h2>
        <ul id="formula-menu" class="space-y-2">
            <li><button class="w-full text-left px-4 py-2 bg-blue-500 text-white rounded-lg" onclick="showFormula('simpleInterest')">Interés Simple</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-blue-500 text-white rounded-lg" onclick="showFormula('compoundInterest')">Interés Compuesto</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-blue-500 text-white rounded-lg" onclick="showFormula('presentValue')">Valor Presente</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-blue-500 text-white rounded-lg" onclick="showFormula('futureValue')">Valor Futuro</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-blue-500 text-white rounded-lg" onclick="showFormula('futureAnnuity')">Valor Futuro de una Anualidad</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-blue-500 text-white rounded-lg" onclick="showFormula('ordinaryAnnuity')">Renta de una Anualidad Ordinaria</button></li>
        </ul>
    </div>

    <!-- Main Content Area for Formulas -->
    <div class="w-3/4 p-5 bg-white rounded-lg ml-5">
        <h2 id="formula-title" class="font-bold text-xl mb-4">Calculadora Financiera</h2>
        <div id="formula-content">
            <!-- Placeholder for dynamic formula content -->
            <div id="simpleInterest" class="formula-section hidden">
                <h3 class="font-bold text-lg">Interés Simple</h3>
                <form id="simpleInterestForm" class="space-y-4">
                    <div>
                        <label for="capitalInicial" class="block font-medium">Capital Inicial (€):</label>
                        <input type="number" id="capitalInicial" name="capitalInicial" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label for="tasaInteres" class="block font-medium">Tasa de Interés (%):</label>
                        <input type="number" id="tasaInteres" name="tasaInteres" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label for="periodo" class="block font-medium">Periodo (Años):</label>
                        <input type="number" id="periodo" name="periodo" class="w-full p-2 border rounded" required>
                    </div>
                    <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg" onclick="calculateSimpleInterest()">Calcular</button>
                </form>
                <div id="simpleInterestResult" class="mt-4 font-medium"></div>
            </div>

            <!-- Similar sections for other formulas (hidden initially) -->
            <div id="compoundInterest" class="formula-section hidden">
                <h3 class="font-bold text-lg">Interés Compuesto</h3>
                <!-- Add form fields here similarly -->
            </div>
            <div id="presentValue" class="formula-section hidden">
                <h3 class="font-bold text-lg">Valor Presente</h3>
                <!-- Add form fields here similarly -->
            </div>
            <div id="futureValue" class="formula-section hidden">
                <h3 class="font-bold text-lg">Valor Futuro</h3>
                <!-- Add form fields here similarly -->
            </div>
            <div id="futureAnnuity" class="formula-section hidden">
                <h3 class="font-bold text-lg">Valor Futuro de una Anualidad</h3>
                <!-- Add form fields here similarly -->
            </div>
            <div id="ordinaryAnnuity" class="formula-section hidden">
                <h3 class="font-bold text-lg">Renta de una Anualidad Ordinaria</h3>
                <!-- Add form fields here similarly -->
            </div>
        </div>
    </div>
</div>

<script>
    // Function to switch between formulas
    function showFormula(formulaId) {
        document.querySelectorAll('.formula-section').forEach(section => {
            section.classList.add('hidden');
        });
        document.getElementById(formulaId).classList.remove('hidden');
    }

    // Function to calculate Simple Interest
    function calculateSimpleInterest() {
        const principal = parseFloat(document.getElementById('capitalInicial').value);
        const rate = parseFloat(document.getElementById('tasaInteres').value) / 100;
        const time = parseFloat(document.getElementById('periodo').value);
        const interest = principal * rate * time;
        const total = principal + interest;

        document.getElementById('simpleInterestResult').innerText = `Interés Obtenido: €${interest.toFixed(2)} - Capital Final: €${total.toFixed(2)}`;
    }
</script>
@endsection
