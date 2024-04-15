<?php

namespace App\Http\Controllers;

use App\Imports\SuperheroImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ImportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {   

        return view('Superheros');
        
    }

    public function import(request $request) 
    {

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
        }
        $data = Excel::import(new SuperheroImport, $file ,\Maatwebsite\Excel\Excel::CSV);
         

        return redirect('/')->with('success', 'Superheroes Importados correctamente.');

    }
}
