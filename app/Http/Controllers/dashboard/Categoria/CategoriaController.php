<?php

namespace App\Http\Controllers\dashboard\Categoria;

use App\Model\Album\Departamento;
use App\Model\Categoria\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;

class CategoriaController extends Controller
{
    public function index()
    {
        $data = array(
            'titulo' => 'Criando nova Categoria',
            'localizador' => 'Categoria',
            'info' => 'Criando Nova Categoria',
            'avatar' => Auth()->user(),

        );
        return view('dashboard.categoria.index', $data);
    }
    public function get_datatable() {


        $post = Categoria::select(['id', 'categoria', 'created_at', 'updated_at']);

        return Datatables::of($post)
            ->addColumn('action', function ($list) {
                return '<a href="show/' . $list->id . '" class="btn btn-xs btn-primary"><i class="fa fa-folder-open-o"></i> Show</a>'
                    . '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
            })
            ->editColumn('id', '{{$id}}')
            ->make(true);
    }
    public function create()
    {
        $data = array(
            'titulo' => 'Criando nova Categoria',
            'localizador' => 'Categoria',
            'info' => 'Criando Nova Categoria',
            'avatar' => Auth()->user(),
            'departamento'  =>  Departamento::pluck('departamento'),

        );

        return view('dashboard.categoria.create', $data);
    }
    public function store(Request $request)
    {
       $categoria = new Categoria();
       $departamento = new Departamento();

       $departamento->user_id = auth()->user()->id;
       $departamento->departamento = $request->departamento;
       $departamento->save();

       $categoria->departamento_id = $departamento->id;
       $categoria->categoria = $request->categoria;
       $result = $categoria->save();
       if($result)
       {
           return redirect()->route('categoria.index')->with('msg','Categoria cadastrada com sucesso');
       }else{
           return redirect()->back()->with('msg','Categoria cadastrada com sucesso');
       }
    }
}
