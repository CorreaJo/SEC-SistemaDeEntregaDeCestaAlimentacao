<?php

namespace App\Http\Controllers;
use App\Models\Cupom;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $hoje = Carbon::today();
        $cuponsAtivo = Cupom::where('dataDisp', '=', $hoje)->where('status', '=', 'inativo')->get();
        foreach($cuponsAtivo as $cupom){
            $cupom->update(['status' => 'ativo']);
        }
        $cuponsInativo = Cupom::where('dataLimite', "<=", $hoje)->where('status', '=', 'ativo')->get();
        foreach($cuponsInativo as $cupom){
            $cupom->update(['status' => 'inativo']);
        }
        
        if(Auth::user()->unidade === "compras"){
            $dataHoje = Carbon::today('America/Sao_Paulo');
            $cuponsDispDia = Cupom::whereDate('dataDisp', $dataHoje)->count();

            $cuponsRetiradaDia = Cupom::whereDate('dataRetirada', $dataHoje)->count();
            
            $mes = $dataHoje->format('m');
            $cuponsDispMes = Cupom::whereMonth('dataDisp', $mes)->count();

            $cuponsRetiradaMes = Cupom::whereMonth('dataRetirada', $mes)->count();
            
            $proxMes = $dataHoje->addMonths(1)->format('m');
            $cuponsProxMes = Cupom::whereMonth('dataDisp', $proxMes)->count();
            
            $ano = $dataHoje->format('Y');
            $cuponsAno = Cupom::whereYear('dataDisp', $ano)->count();
            
            return view('compras.index', compact('cuponsDispDia', 'cuponsDispMes', 'cuponsProxMes', 'cuponsAno', 'cuponsRetiradaDia', 'cuponsRetiradaMes'));
        }

        if (Auth::user()->unidade === "entrega"){

            $dataDisp = Carbon::today();

            $dataLimite = Carbon::createFromDate($dataDisp, 'America/Sao_Paulo');
            $dataLimite->addDays(3);

            $cupons = DB::table('cupoms')
                ->where('status', '=', 'ativo')
                ->paginate(20);

                return view('cupom.index', compact('cupons'));
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
