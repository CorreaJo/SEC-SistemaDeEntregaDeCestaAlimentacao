<?php

namespace App\Http\Controllers;
use App\Models\Cupom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index() {
        if(Auth::user()->unidade === "compras"){
            $dataHoje = Carbon::today('America/Sao_Paulo');
            $cuponsDispDia = Cupom::whereDate('dataDisp', $dataHoje)->count();
            
            $mes = $dataHoje->format('m');
            $cuponsDispMes = Cupom::whereMonth('dataDisp', $mes)->count();
            
            $proxMes = $dataHoje->addMonths(1)->format('m');
            $cuponsProxMes = Cupom::whereMonth('dataDisp', $proxMes)->count();
            
            $ano = $dataHoje->format('Y');
            $cuponsAno = Cupom::whereYear('dataDisp', $ano)->count();
            
            return view('compras.index', compact('cuponsDispDia', 'cuponsDispMes', 'cuponsProxMes', 'cuponsAno'));
        }

        if (Auth::user()->unidade === "entrega"){
            return view('entrega.index');
        }
        
        return view('index');
    }

    public function lista(){
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function delete($id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        $user->delete();
        return redirect()->route('users.index');
    }

    public function edit($id){
        if(!$user = User::find($id))
            return redirect()->route('users.index');

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,{$id},id"],
            'perfil' => ['required', 'string'],
            'unidade' => ['required', 'string'],
        ]);

        if(!$user = User::find($id))
            return redirect()->route('users.index');
        
            
        $user->update($request->all());
        return redirect()->route('users.index');
    }
}
