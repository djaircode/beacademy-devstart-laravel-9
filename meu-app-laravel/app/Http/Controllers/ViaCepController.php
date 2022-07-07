<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViaCepController extends Controller
{
        public function index(Request $request)
        {
                if ($request->cep)
                        return redirect("/viacep/{$request->cep} ");

                return view('viacep.index');
                
        }
        public function show(string $cep)
        {                                               
                $response = Http::get("https://viacep.com.br/ws/{$cep}/json/")->json();

                if (!$response)
                        return "Não foi possível localizar o CEP, por favor, verifique os dados informados";
                return $response;
        }
     
}
