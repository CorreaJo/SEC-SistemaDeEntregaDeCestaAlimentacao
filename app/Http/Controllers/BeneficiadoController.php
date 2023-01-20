<?php

namespace App\Http\Controllers;

use App\Models\Beneficiado;
use Illuminate\Http\Request;
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
        
        if ($request->tipo_pesquisa === 'cpf') {
            $beneficiados = Beneficiado::where('cpf','LIKE',"%{$request->pesquisa}%")->get();
            return view('pesquisa', compact('beneficiados'));
        }
    }

    public function show($id){
        if(!$beneficiado = Beneficiado::find($id))
            return redirect()->back();
        
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
}
