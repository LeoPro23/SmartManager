<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticuloController extends Controller
{
    public function inicio()
    {
        $articulosDestacados = Articulo::orderBy('created_at', 'desc')->take(6)->get();
        return view('inicio', compact('articulosDestacados'));
    }

    // Muestra una lista de artículos con la opción de filtrar por tipo de contenido
    public function index(Request $request)
    {
        $tipo = $request->input('tipo_contenido');
        $query = $request->input('query');

        $articulos = Articulo::query();

        if ($tipo) {
            $articulos->where('tipo_contenido', $tipo);
        }

        if ($query) {
            $articulos->where('titulo', 'LIKE', "%{$query}%");
        }

        $articulos = $articulos->paginate(12); // Cambiar de get() a paginate(12)

        return view('articulos.index', compact('articulos'));
    }

    // Muestra un artículo específico por su ID
    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);

        // Fetch related articles based on the current article's category
        $articulosRelacionados = Articulo::where('tipo_contenido', $articulo->tipo_contenido)
            ->where('id', '!=', $articulo->id)
            ->take(4)
            ->get();

        return view('articulos.show', compact('articulo', 'articulosRelacionados'));
    }

    // Búsqueda de artículos
    public function search(Request $request)
    {
        $query = $request->input('query');
        $articulos = Articulo::where('titulo', 'LIKE', "%{$query}%")
            ->orWhere('contenido', 'LIKE', "%{$query}%")
            ->get();

        return view('articulos.search_results', compact('articulos'));
    }

    public function noticias()
    {
        // Definiendo la URL base de NewsAPI
        $newsapiUrl = 'https://newsapi.org/v2/everything';

        // Obteniendo artículos de la categoría 'noticias' desde tu base de datos
        $articulos = Articulo::where('tipo_contenido', 'noticias')->get();

        // Obteniendo noticias desde NewsAPI

        // Noticias sobre contabilidad
        $contabilidadResponse = Http::withOptions(['verify' => false])->get($newsapiUrl, [
            'q' => 'accounting',
            'apiKey' => env('NEWSAPI_KEY'),
            'language' => 'es',
            'pageSize' => 5
        ]);
        $noticiasContabilidad = $contabilidadResponse->json()['articles'];

        // Noticias sobre empresas importantes (Tesla, Meta, Microsoft, Google)
        $empresasResponse = Http::withOptions(['verify' => false])->get($newsapiUrl, [
            'q' => 'Tesla OR Meta OR Microsoft OR Google',
            'apiKey' => env('NEWSAPI_KEY'),
            'language' => 'es',
            'pageSize' => 5
        ]);
        $noticiasEmpresas = $empresasResponse->json()['articles'];

        // Noticias sobre finanzas corporativas
        $finanzasResponse = Http::withOptions(['verify' => false])->get($newsapiUrl, [
            'q' => 'corporate finance',
            'apiKey' => env('NEWSAPI_KEY'),
            'language' => 'es',
            'pageSize' => 5
        ]);
        $noticiasFinanzas = $finanzasResponse->json()['articles'];

        // Obteniendo información de acciones desde Alpha Vantage
        $alphaVantageKey = env('ALPHAVANTAGE_KEY');
        $stocks = ['TSLA', 'META', 'MSFT', 'GOOGL']; // Ejemplo de acciones que quieres mostrar
        $acciones = [];

        foreach ($stocks as $stock) {
            $response = Http::withOptions(['verify' => false])->get('https://www.alphavantage.co/query', [
                'function' => 'TIME_SERIES_INTRADAY',
                'symbol' => $stock,
                'interval' => '5min',
                'apikey' => $alphaVantageKey
            ]);

            $data = $response->json();

            if (isset($data['Time Series (5min)'])) {
                $latestData = reset($data['Time Series (5min)']);
                $acciones[$stock] = [
                    'symbol' => $stock,
                    'price' => $latestData['1. open'],  // Precio de apertura más reciente
                    'volume' => $latestData['5. volume'] // Volumen más reciente
                ];
            }
        }

        // Obteniendo información de criptomonedas desde CoinGecko
        $cryptos = ['bitcoin', 'ethereum', 'litecoin', 'ripple']; // Puedes agregar las criptomonedas que desees
        $criptomonedas = [];

        foreach ($cryptos as $crypto) {
            $response = Http::withOptions(['verify' => false])->get('https://api.coingecko.com/api/v3/simple/price', [
                'ids' => $crypto,
                'vs_currencies' => 'usd',
                'include_24hr_change' => 'true'
            ]);

            $data = $response->json();

            if (isset($data[$crypto])) {
                $criptomonedas[$crypto] = [
                    'symbol' => strtoupper($crypto),
                    'price' => $data[$crypto]['usd'],  // Precio en USD
                    'change_24h' => $data[$crypto]['usd_24h_change'] // Cambio en las últimas 24 horas
                ];
            }
        }

        return view('noticias', compact('articulos', 'noticiasContabilidad', 'noticiasEmpresas', 'noticiasFinanzas', 'acciones', 'criptomonedas'));
    }

}
