<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superheros;

use App\models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    

    public function apiHero(Request $request)
    {
        

        // Obtener el parámetro de ordenamiento
    $sortBy = $request->route('filter');

    // Aplicar la lógica de ordenamiento según el parámetro recibido
    if ($sortBy === 'id') {
        $superherosQuery = Superheros::orderBy('id', 'desc')->paginate(10);
    } elseif ($sortBy === 'name') {
        $superherosQuery = Superheros::orderBy('name')->paginate(10);
    } elseif ($sortBy === 'power') {
        $superherosQuery = Superheros::orderBy('power', 'desc')
            ->orderBy('combat', 'desc')
            ->orderBy('speed', 'desc')->paginate(10);
    } 

    // Devolver los resultados paginados como respuesta JSON
    return response()->json($superherosQuery->items());
    }

    
    
}
