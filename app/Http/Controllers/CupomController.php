<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Beneficiado;
use App\Models\Cupom;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
            $hoje = Carbon::today();

            $dataLimite = Carbon::createFromDate($dataDisp, 'America/Sao_Paulo');
            $dataLimite->addDays(3);

            $status = "ativo";
            
            if ($hoje < $dataDisp){
                $status = "inativo";
            }


            $obs = $request->observacao;
            $idBeneficiado = $request->idBeneficiado;
            $idBeneficiado = intval($idBeneficiado);

            if($request->data[0]){
                $cupom = Cupom::create([ 
                    'dataDisp' => $dataDisp,
                    'dataLimite' => $dataLimite,
                    'status' => $status,
                    'observacao' => $obs,
                    'idBeneficiado' => $idBeneficiado
                ]);
            } else {
                $cupom = Cupom::create([ 
                    'dataDisp' => $dataDisp,
                    'dataLimite' => $dataLimite,
                    'status' => $status,
                    'observacao' => '',
                    'idBeneficiado' => $idBeneficiado
                ]);
            }
        }

        return redirect()->route('beneficiado.show', $idBeneficiado);
    }

    public function delete($id, $idBeneficiado){
        if(!$cupom = Cupom::find($id))
            return redirect()->route('beneficiado.show', $idBeneficiado);

        $cupom->delete();
        return redirect()->route('beneficiado.show', $idBeneficiado);
    }

    public function deleteAll($idBeneficiado){
        $cupons = Cupom::where('idBeneficiado', '=', "$idBeneficiado");
        if($cupons){
            $cupons->delete();
            return redirect()->route('beneficiado.show', $idBeneficiado);
        }
        return redirect()->route('beneficiado.show', $idBeneficiado);
    }

    public function show($idBeneficiado, $idCupom){
        if(!$cupom = Cupom::find($idCupom)){
            return redirect()->back();
        }

        if(!$beneficiado = Beneficiado::find($idBeneficiado)){
            return redirect()->back();
        }

        return view('cupom.show', compact('beneficiado', 'cupom'));
    }

    public function update(Request $request){
        $cupom = Cupom::find($request->idCupom);
        $hoje = Carbon::today();
        $cupom->update(['status' => "inativo", 'dataRetirada' => $hoje]);

        $dataDisp = Carbon::today();
        $dataLimite = Carbon::createFromDate($dataDisp, 'America/Sao_Paulo');
        $dataLimite->addDays(3);

        $cupons = DB::table('cupoms')
            ->where('status', '=', 'ativo')
            ->paginate(20);

        return view('cupom.index', compact('cupons'));
    }
}
