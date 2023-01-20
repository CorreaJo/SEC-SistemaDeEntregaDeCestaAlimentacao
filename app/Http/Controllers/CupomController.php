<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beneficiado;

class CupomController extends Controller
{
    public function create($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();
        
        return view('cupom.createCupom', compact('beneficiado'));
    }
}
