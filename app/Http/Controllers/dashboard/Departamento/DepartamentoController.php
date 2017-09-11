<?php

namespace App\Http\Controllers\dashboard\Departamento;

use App\Model\Departamento\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class DepartamentoController extends Controller
{
    public function index()
    {
        $data = array(
            'titulo' => 'Lista de  Departamento',
            'localizador' => 'Departamento',
            'info' => 'Lista de  Departamento',
            'avatar' => Auth()->user(),

        );
        return view('dashboard.departamento.index', $data);
    }
    public function get_datatable() {


        $post = Departamento::select(['id', 'departamento', 'created_at', 'updated_at']);

        return Datatables::of($post)
            ->addColumn('action', function ($list) {
                return  '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
    public function create()
    {
        $data = array(
            'titulo' => 'Criando um Novo Departamento',
            'localizador' => 'Departamento',
            'info' => 'Criando um Novo Departamento',
            'avatar' => Auth()->user(),


        );

        return view('dashboard.departamento.create', $data);
    }
    public function store(Request $request)
    {
        $departamento = new Departamento();

        $departamento->user_id = auth()->user()->id;
        $departamento->departamento = $request->departamento;
        $result = $departamento->save();

        if($result)
        {
            return redirect()->route('departamento.index')->with('msg','Departamento cadastrada com sucesso');
        }else{
            return redirect()->route('departamento.index')->with('error','Não foi possivel cadastraro o departamento');
        }
    }
    public function destroy($id)
    {
        $departamento = new Departamento();
        $query = $departamento->findOrFail($id);
        $result = $query->delete($id);

        if($result)
        {
            return redirect()->route('departamento.index')->with('msg','Departamento deletado com sucesso');
        }else{
            return redirect()->route('departamento.index')->with('error','Não foi possivel deletar o departamento');
        }
    }
}
