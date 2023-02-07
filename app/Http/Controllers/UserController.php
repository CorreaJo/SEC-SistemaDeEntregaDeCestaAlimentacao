<?php

namespace App\Http\Controllers;
use App\Models\Cupom;
use App\Models\User;
use App\Models\Beneficiado;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{

    public function index(Request $request) {
        $hoje = Carbon::today();
        $cuponsAtivo = Cupom::where('dataDisp', '=', $hoje)->where('status', '=', 'inativo')->where('dataRetirada', '=', NULL)->get();
        foreach($cuponsAtivo as $cupom){
            $cupom->update(['status' => 'ativo']);
        }
        $cuponsInativo = Cupom::where('dataLimite', "<=", $hoje)->where('status', '=', 'ativo')->get();
        foreach($cuponsInativo as $cupom){
            $cupom->update(['status' => 'inativo']);
        }

        if(Auth::user()->unidade === "compras"){
            $dataHoje = Carbon::today('America/Sao_Paulo');
            $mes = $dataHoje->format('m');
            $cuponsDispDiaTotal = Cupom::whereDate('dataDisp', $dataHoje)->count();
            $cuponsRetiradaDiaTotal = Cupom::whereDate('dataRetirada', $dataHoje)->count();
            $cuponsDispMesTotal = Cupom::whereMonth('dataDisp', $mes)->count();
            $cuponsRetiradaMesTotal = Cupom::whereMonth('dataRetirada', $mes)->count();
            $proxMes = $dataHoje->addMonths(1)->format('m');
            $cuponsProxMes = Cupom::whereMonth('dataDisp', $proxMes)->count();
            $ano = $dataHoje->format('Y');
            $cuponsAno = Cupom::whereYear('dataDisp', $ano)->count();
            
            return view('compras.index', compact('cuponsDispDiaTotal', 'cuponsDispMesTotal', 'cuponsProxMes', 'cuponsAno', 'cuponsRetiradaDiaTotal', 'cuponsRetiradaMesTotal'));
        }

        if (Auth::user()->unidade === "entrega"){

            $dataDisp = Carbon::today();

            $dataLimite = Carbon::createFromDate($dataDisp, 'America/Sao_Paulo');
            $dataLimite->addDays(3);

            $cupons = DB::table('cupoms')
                ->where('status', '=', 'ativo')
                ->get();

            $dados = array();
            foreach($cupons as $cupom){
                $beneficiados = Beneficiado::where('id', '=', "$cupom->idBeneficiado")->get();
                foreach($beneficiados as $beneficiado){
                    $infos = ['id' => $cupom->id, 
                            'idBeneficiado' => $cupom->idBeneficiado, 
                            'dataDisp' => $cupom->dataDisp, 
                            'dataLimite' => $cupom->dataLimite,
                            'nomeBeneficiado' => $beneficiado->nome, 
                            'cpfBeneficiado' => $beneficiado->cpf];
                    array_push($dados, $infos);
                }
            }
            $currentPage = null;
            $currentPage = $currentPage ?: (Paginator::resolveCurrentPage() ?: 1);
            $col = collect($dados);
            $perPage = 20;
            $currentPageItems = $col->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $items = new Paginator($currentPageItems, count($col), $perPage);
            $items->setPath($request->url());
            $items->appends($request->all());



            return view('cupom.index', compact('items'));
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
