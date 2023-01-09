<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeneficiadoController extends Controller
{
    public function create(){
        return view('beneficiado.create');
    }
}
