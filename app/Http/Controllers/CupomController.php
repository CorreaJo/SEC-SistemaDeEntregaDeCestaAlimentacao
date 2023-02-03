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
        $hoje = Carbon::today();
        $hoje->format('Y-m-d');
        $cupons = Cupom::where('idBeneficiado', '=', "$idBeneficiado")
                ->where('dataDisp', '>=', "$hoje")
                ->orWhere('status', '=', 'ativo')
                ->get();
        if($cupons){
            foreach($cupons as $cupom){
                $cupom->delete($cupom->id);
            }
            
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


    public function relatorioUnidadesRetirada(){
        $dataHoje = Carbon::today('America/Sao_Paulo');
        $mes = $dataHoje->format('m');

        //Total de cupons retirados hoje e separados por unidade
        $cuponsRetiradaDia = Cupom::whereDate('dataRetirada', $dataHoje)->get();
        $crasMarina2 = 0;
        $crasRegiane2 = 0;
        $crasPadre2 = 0;
        $crasLivia2 = 0;
        $creas2 = 0;
        $cram2 = 0;
        $secPromocao2 = 0;
        $das2 = 0;
        foreach($cuponsRetiradaDia as $cupom){
            $beneficiados = Beneficiado::where('id', "=", "$cupom->idBeneficiado")->get();
            foreach($beneficiados as $beneficiado){
                if($beneficiado->unidade == "Cras Marina Caron"){
                    $crasMarina2++;
                }else if($beneficiado->unidade == "Cras Regiane Félix"){
                    $crasRegiane2++;
                }else if($beneficiado->unidade == "Cras Padre José"){
                    $crasPadre2++;
                }else if($beneficiado->unidade == "Cras Lívia Stefany"){
                    $crasLivia2++;
                }else if($beneficiado->unidade == "Creas"){
                    $creas2++;
                }else if($beneficiado->unidade == "Cram"){
                    $cram2++;
                }else if($beneficiado->unidade == "Secretaria de promoção social"){
                    $secPromocao2++;
                }else if($beneficiado->unidade == "das"){
                    $das2++;
                }
            }
        }
        $unidadesNome = ["Cras Marina Caron", "Cras Regiane Félix", "Cras Lívia Stefany", "Cras Padre José", "Creas", "Cram", "Secretaria de Promoção Social", "DAS"];
        $cuponsRetiradaDiaUnidadeDados = ["$crasMarina2", "$crasRegiane2", "$crasLivia2", "$crasPadre2", "$creas2", "$cram2", "$secPromocao2", "$das2"];
        $cuponsRetiradaDiaTotal = Cupom::whereDate('dataRetirada', $dataHoje)->count();

        //Total de cupons retirados por mes e separados por unidades
        $cuponsRetiradaMes = Cupom::whereMonth('dataRetirada', $mes)->get();
        $crasMarina4 = 0;
        $crasRegiane4 = 0;
        $crasPadre4 = 0;
        $crasLivia4 = 0;
        $creas4 = 0;
        $cram4 = 0;
        $secPromocao4 = 0;
        $das4 = 0;
        foreach($cuponsRetiradaMes as $cupom){
            $beneficiados = Beneficiado::where('id', "=", "$cupom->idBeneficiado")->get();
            foreach($beneficiados as $beneficiado){
                if($beneficiado->unidade == "Cras Marina Caron"){
                    $crasMarina4++;
                }else if($beneficiado->unidade == "Cras Regiane Félix"){
                    $crasRegiane4++;
                }else if($beneficiado->unidade == "Cras Padre José"){
                    $crasPadre4++;
                }else if($beneficiado->unidade == "Cras Lívia Stefany"){
                    $crasLivia4++;
                }else if($beneficiado->unidade == "Creas"){
                    $creas4++;
                }else if($beneficiado->unidade == "Cram"){
                    $cram4++;
                }else if($beneficiado->unidade == "Secretaria de promoção social"){
                    $secPromocao4++;
                }else if($beneficiado->unidade == "das"){
                    $das4++;
                }
            }
        }
        $cuponsRetiradaMesUnidadeDados = ["$crasMarina4", "$crasRegiane4", "$crasLivia4", "$crasPadre4", "$creas4", "$cram4", "$secPromocao4", "$das4"];
        $cuponsRetiradaMesTotal = Cupom::whereMonth('dataRetirada', $mes)->count();

        return view('compras.relatorioRetirada', compact('unidadesNome', 'cuponsRetiradaDiaTotal', 'cuponsRetiradaMesTotal', 'cuponsRetiradaDiaUnidadeDados', 'cuponsRetiradaMesUnidadeDados'));
    }

    public function relatorioDisp(){
        $dataHoje = Carbon::today('America/Sao_Paulo');
            
        // Total de cupons disp hoje e separados por unidade
        $cuponsDispDia = Cupom::whereDate('dataDisp', $dataHoje)->get();
        $crasMarina = 0;
        $crasRegiane = 0;
        $crasPadre = 0;
        $crasLivia = 0;
        $creas = 0;
        $cram = 0;
        $secPromocao = 0;
        $das = 0;
        foreach($cuponsDispDia as $cupom){
            $beneficiados = Beneficiado::where('id', "=", "$cupom->idBeneficiado")->get();
            foreach($beneficiados as $beneficiado){
                if($beneficiado->unidade == "Cras Marina Caron"){
                    $crasMarina++;
                }else if($beneficiado->unidade == "Cras Regiane Félix"){
                    $crasRegiane++;
                }else if($beneficiado->unidade == "Cras Padre José"){
                    $crasPadre++;
                }else if($beneficiado->unidade == "Cras Lívia Stefany"){
                    $crasLivia++;
                }else if($beneficiado->unidade == "Creas"){
                    $creas++;
                }else if($beneficiado->unidade == "Cram"){
                    $cram++;
                }else if($beneficiado->unidade == "Secretaria de promoção social"){
                    $secPromocao++;
                }else if($beneficiado->unidade == "das"){
                    $das++;
                }
            }
        }
        $unidadesNome = ["Cras Marina Caron", "Cras Regiane Félix", "Cras Lívia Stefany", "Cras Padre José", "Creas", "Cram", "Secretaria de Promoção Social", "DAS"];
        $cuponsDispDiaUnidadeDados = ["$crasMarina", "$crasRegiane", "$crasLivia", "$crasPadre", "$creas", "$cram", "$secPromocao", "$das"];
        $cuponsDispDiaTotal = Cupom::whereDate('dataDisp', $dataHoje)->count();


        //Total de Cupons disp no mes e separados por unidades
        $mes = $dataHoje->format('m');
        $cuponsDispMes = Cupom::whereMonth('dataDisp', $mes)->get();
        $crasMarina3 = 0;
        $crasRegiane3 = 0;
        $crasPadre3 = 0;
        $crasLivia3 = 0;
        $creas3 = 0;
        $cram3 = 0;
        $secPromocao3 = 0;
        $das3 = 0;
        foreach($cuponsDispMes as $cupom){
            $beneficiados = Beneficiado::where('id', "=", "$cupom->idBeneficiado")->get();
            foreach($beneficiados as $beneficiado){
                if($beneficiado->unidade == "Cras Marina Caron"){
                    $crasMarina3++;
                }else if($beneficiado->unidade == "Cras Regiane Félix"){
                    $crasRegiane3++;
                }else if($beneficiado->unidade == "Cras Padre José"){
                    $crasPadre3++;
                }else if($beneficiado->unidade == "Cras Lívia Stefany"){
                    $crasLivia3++;
                }else if($beneficiado->unidade == "Creas"){
                    $creas3++;
                }else if($beneficiado->unidade == "Cram"){
                    $cram3++;
                }else if($beneficiado->unidade == "Secretaria de promoção social"){
                    $secPromocao3++;
                }else if($beneficiado->unidade == "das"){
                    $das3++;
                }
            }
        }
            $cuponsDispMesUnidadeDados = ["$crasMarina3", "$crasRegiane3", "$crasLivia3", "$crasPadre3", "$creas3", "$cram3", "$secPromocao3", "$das3"];
            $cuponsDispMesTotal = Cupom::whereMonth('dataDisp', $mes)->count();
            
            return view('compras.relatorioDisp', compact('unidadesNome', 'cuponsDispDiaTotal', 'cuponsDispMesTotal', 'cuponsDispDiaUnidadeDados', 'cuponsDispMesUnidadeDados'));
    }
}
