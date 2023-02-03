<?php

namespace App\Http\Controllers;

use App\Models\Beneficiado;
use App\Models\Cupom;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            return view('pesquisa', compact('beneficiados'));
        }

        if($request->tipo_pesquisa === 'endereco'){
            $beneficiados = Beneficiado::where('endereco','LIKE',"%{$request->pesquisa}%")->get();
            return view('pesquisa', compact('beneficiados'));
        }  
        
        if ($request->tipo_pesquisa === 'cpf') {
            $beneficiados = Beneficiado::where('cpf','LIKE',"%{$request->pesquisa}%")->get();
            return view('pesquisa', compact('beneficiados'));
        }
    }

    public function show($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();


        $hoje = Carbon::today();
        $hoje->format('Y-m-d');
        $cuponsPrev = DB::table('cupoms')
            ->where('idBeneficiado', '=', "$id")
            ->where('dataDisp', '>', "$hoje")
            ->orWhere('status', '=', 'ativo')
            ->get();

        $cuponsHist = DB::table('cupoms')
            ->where('idBeneficiado', '=', "$id")
            ->where('dataDisp', '<', "$hoje")
            ->orWhere('status', '=', 'inativo')
            ->get();
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
}
