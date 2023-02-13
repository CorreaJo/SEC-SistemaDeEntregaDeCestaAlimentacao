<?php

namespace App\Http\Controllers;

use App\Models\Beneficiado;
use App\Models\Cupom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class BeneficiadoController extends Controller
{
    public function create(){
        return view('beneficiado.create');
    }

    public function store(Request $request){
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'min:14'],
            'rg' => ['required', 'string', 'max:12', 'min:12'],
            'endereco' => ['string', 'required'],
            'quantMembros' => ['integer', 'required'],
        ]);

        $beneficiado = Beneficiado::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'endereco' => $request->endereco,
            'quantMembros' => $request->quantMembros,
            'unidade' => $request->unidade
        ]);

        return redirect()->route('index');
    }

    public function pesquisa(Request $request){
        if($request->tipo_pesquisa === 'nome'){
            $beneficiados = Beneficiado::where('nome','LIKE',"%{$request->pesquisa}%")->get();
            $pesquisa = $request->pesquisa;
            return view('pesquisa', compact('beneficiados', 'pesquisa'));
        }

        if($request->tipo_pesquisa === 'endereco'){
            $beneficiados = Beneficiado::where('endereco','LIKE',"%{$request->pesquisa}%")->get();
            $pesquisa = $request->pesquisa;
            return view('pesquisa', compact('beneficiados', 'pesquisa'));
        }  
        
        if ($request->tipo_pesquisa === 'cpf') {
            $beneficiados = Beneficiado::where('cpf','LIKE',"%{$request->pesquisa}%")->get();
            $pesquisa = $request->pesquisa;
            return view('pesquisa', compact('beneficiados', 'pesquisa'));
        }
    }

    public function show($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();


        $hoje = Carbon::today();
        $hoje->format('Y-m-d');
        
        $cuponsPrev = Cupom::where(function($cuponsPrev2) use ($id, $hoje){
            $cuponsPrev2->where(function($cuponsPrev2) use ($id, $hoje){
                 $cuponsPrev2->where('idBeneficiado', '=', "$id")->where('dataDisp', '>', "$hoje");
             })
            ->orWhere(function($cuponsPrev2) use ($id){
                 $cuponsPrev2->where('idBeneficiado', '=', "$id")->where('status', '=', 'ativo');
             });
         })->get();

        $cuponsHist = Cupom::where(function($cuponsHist2) use ($id, $hoje){
                $cuponsHist2->where(function($cuponsHist2) use ($id, $hoje){
                     $cuponsHist2->where('idBeneficiado', '=', "$id")->where('dataLimite', '<=', "$hoje");
                 })
                ->orWhere(function($cuponsHist2) use ($id){
                     $cuponsHist2->where('idBeneficiado', '=', "$id")->where('dataRetirada', '!=', NULL);
                 });
             })->get();

        if($cuponsPrev || $cuponsHist){
            return view('beneficiado.show', compact('beneficiado', 'cuponsPrev', 'cuponsHist'));
        }
        
        return view('beneficiado.show', compact('beneficiado'));
    }

    public function delete($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();

        $beneficiado->delete();

        return view('index');
    }

    public function edit($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();

        return view('beneficiado.edit', compact('beneficiado'));
    }

    public function update(Request $request, $id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:14', 'min:14'],
            'rg' => ['required', 'string', 'max:12', 'min:12'],
            'endereco' => ['string', 'required'],
            'quantMembros' => ['integer', 'required'],
        ]);

        $beneficiado->update($request->all());
        
        return view('beneficiado.show', compact('beneficiado'));
    }

    public function observacao($id){
        $beneficiados = Beneficiado::where('id', '=', "$id")->get();
        foreach($beneficiados as $beneficiado){
            if($beneficiado->observacao){
                return view('beneficiado.observacao', compact('id', 'beneficiado'));
            }
        }
        return view('beneficiado.observacao', compact('id'));
    }

    public function updateObservacao(Request $request, $id){
        $request->validate([
            'obs' => ['required', 'string']
        ]);

        $beneficiado = Beneficiado::where('id', '=', "$id")->update(['observacao' => $request->obs]);
        return redirect()->route('beneficiado.show', $id);
    }

    public function deleteObservacao($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();

        $beneficiado = Beneficiado::where('id', '=', "$id")->update(['observacao' => null]);
        return redirect()->route('beneficiado.show', $id);
    }

    public function transferir($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();
        
        $beneficiado = Beneficiado::where('id', '=', "$id")->update(['unidade' => Auth::user()->unidade]);
        return redirect()->route('beneficiado.show', $id);
    }
}
