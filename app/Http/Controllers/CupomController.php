<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Beneficiado;
use App\Models\Cupom;
use Carbon\Carbon;

class CupomController extends Controller
{
    public function create($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();
        
        return view('cupom.createCupom', compact('beneficiado'));
    }

    public function store(Request $request){
        foreach ($request->data as $chave=>$valor){
            $dataDisp = $valor;

            $dataLimite = Carbon::createFromDate($dataDisp, 'America/Sao_Paulo');
            $dataLimite->addDays(3);

            $status = "ativo";

            $idBeneficiado = $request->idBeneficiado;
            $idBeneficiado = intval($idBeneficiado);

            $cupom = Cupom::create([ 
                'dataDisp' => $dataDisp,
                'dataLimite' => $dataLimite,
                'status' => $status,
                'idBeneficiado' => $idBeneficiado
            ]);
        }
        $idBeneficiado = strval($idBeneficiado);
        return redirect()->route('index');
    }
}
