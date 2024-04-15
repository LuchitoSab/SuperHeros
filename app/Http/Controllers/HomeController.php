<?php

namespace App\Http\Controllers;

use App\Models\Superheros;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(request $request)
    {
        if (!empty($request)) {
            $search = $request->input('search');

            $superheros = Superheros::where(function ($query) use ($search) {
        if (is_numeric($search)) {
            $query->where('id', $search);
        } else {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }
        })->get();

            return view('home', ['superheros' => $superheros]);

        } else {
            // Obtener superhéroes
            $superheros = Superheros::with(['id', 'name'])->get();
        return view('home', ['superheros' => $superheros]);

        }
    }


    public function sort(Request $request)
    {
        // Obtener los superhéroes ordenados según el parámetro recibido
        $sortBy = $request->route('sortBy');

        if ($sortBy === 'id') {
            $superheros = Superheros::orderBy('id', 'desc')->get();
        } elseif ($sortBy === 'name') {
            $superheros = Superheros::orderBy('name')->get();
        } elseif ($sortBy === 'power') {
            $superheros = Superheros::orderBy('power', 'desc')
            ->orderBy('combat', 'desc')
            ->orderBy('speed', 'desc')
            ->get();
        } else {
            // Si no se proporciona un parámetro válido, simplemente redirige de vuelta a la página principal
            return redirect()->route('home');
        }

        // Renderiza la vista con los superhéroes ordenados
        return view('home', ['superheros' => $superheros]);
    }
        
}
