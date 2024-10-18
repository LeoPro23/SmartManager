<?php

namespace App\Services;

class FinancialRatiosService
{
    public function calculateRatios($financialData)
    {
        $ratios = [];

        // Ejemplo de ratios de liquidez
        $ratios['Ratio Corriente'] = $financialData['activo_corriente'] / $financialData['pasivo_corriente'];
        $ratios['Prueba Ácida'] = ($financialData['activo_corriente'] - $financialData['inventarios']) / $financialData['pasivo_corriente'];
        $ratios['Capital de Trabajo'] = $financialData['activo_corriente'] - $financialData['pasivo_corriente'];

        // Ejemplo de ratios de solvencia
        $ratios['Ratio de Deuda'] = $financialData['pasivo_total'] / $financialData['activo_total'];
        $ratios['Ratio de Patrimonio'] = $financialData['patrimonio'] / $financialData['activo_total'];
        $ratios['Cobertura de Intereses'] = $financialData['utilidad_operativa'] / $financialData['gastos_intereses'];

        // Ejemplo de ratios de gestión
        $ratios['Rotación de Activos Totales'] = $financialData['ventas'] / $financialData['activo_total'];
        $ratios['Rotación de Inventarios'] = $financialData['ventas'] / $financialData['inventarios'];
        $ratios['Rotación de Cuentas por Cobrar'] = $financialData['ventas_credito'] / $financialData['cuentas_por_cobrar'];

        // Ejemplo de ratios de rentabilidad
        $ratios['Rentabilidad sobre Ventas'] = $financialData['utilidad_neta'] / $financialData['ventas'];
        $ratios['Rentabilidad sobre Activos'] = $financialData['utilidad_neta'] / $financialData['activo_total'];
        $ratios['Rentabilidad sobre Patrimonio'] = $financialData['utilidad_neta'] / $financialData['patrimonio'];

        return $ratios;
    }
}
