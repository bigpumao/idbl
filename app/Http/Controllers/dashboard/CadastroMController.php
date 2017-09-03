<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Membro;
use Image;
use Validator;
use DateTime;
use DB;
use Yajra\Datatables\Facades\Datatables;

class CadastroMController extends Controller {

    public function index() {
        $data = array(
            'titulo' => 'Lista de membros',
            'localizador' => 'Listagem de membro',
            'info' => 'Listas de Membros',
            'avatar' => Auth()->user()
        );


        return view('dashboard.cadastroMembros.index', $data);
    }

    public function get_datatable() {
        $membro = Membro::select(['id', 'nome', 'endereco', 'fone']);

        return Datatables::of($membro)
                        ->addColumn('action', function ($list) {
                            return '<a href="show/' . $list->id . '" class="btn btn-xs btn-primary"><i class="fa fa-folder-open-o"></i> Show</a>'
                                    . '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->make(true);
    }

    public function create() {

        $membro = new Membro();
        $ficha = $membro->countID();
        $data = array(
            'titulo' => 'Lista de membros',
            'localizador' => 'Listagem de membro',
            'info' => 'Listas de Membros',
            'avatar' => Auth()->user(),
            'ficha' => $ficha,
        );



        return view('dashboard.cadastroMembros.create', $data);
    }

    public function store(Request $request) {

        $user = Auth::user();
        $membro = new Membro();

        // VALIDAÇAO DO FORMULARIO MEMBRO

        $validator = Validator::make($request->all(), [
                    'nome' => 'required|max:255',
                    'endereco' => 'required',
                    'cidade' => 'required',
                    'estado' => 'required',
                    'fone' => 'required',
                    'dataNasc' => 'required',
                    'naturalidade' => 'required',
                    'nacionalidade' => 'required',
                    'filiacao' => 'required',
                    'rg' => 'required',
                    'cpf' => 'required',
                    'escolaridade' => 'required',
                    'estadoCivil' => 'required',
                    'nomeConjuge' => 'required',
                    'dataConversao' => 'required',
                    'dataBatismo' => 'required',
                    'lugar' => 'required',
                    'ministro' => 'required',
                    'primeiraMembrecia' => 'required',
                    'igrejaMembrecia' => 'required',
                    'dataMembreciaAtual' => 'required',
                    'batismoEspiritoSanto' => 'required',
                    'igrejaBatismoEspiritoSanto' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('dashboard/membros/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            $imagePath = public_path('/imagem/igreja/membros/' . $filename);
            Image::make($imagem)
                    ->resize(800, 600)
                    ->save($imagePath);

            $result = $membro->create([
                'user_id' => $user->id,
                'nome' => $request->nome,
                'imagem' => $filename,
                'endereco' => $request->endereco,
                'cep' => $request->cep,
                'cidade' => $request->cidade,
                'bairro' => $request->bairro,
                'estado' => $request->estado,
                'fone' => $request->fone,
                'dataNasc' => $request->dataNasc,
                'naturalidade' => $request->naturalidade,
                'nacionalidade' => $request->nacionalidade,
                'filiacao' => $request->filiacao,
                'rg' => $request->rg,
                'cpf' => $request->cpf,
                'tituloEleitoral' => $request->tituloEleitoral,
                'escolaridade' => $request->escolaridade,
                'estadoCivil' => $request->estadoCivil,
                'nomeConjuge' => $request->nomeConjuge,
                'quantFilhos' => $request->quantFilhos,
                'sexFilho' => $request->sexFilhos,
                'dataConversao' => $request->dataConversao,
                'igrejaConversao' => $request->igrejaConversao,
                'dataBatismo' => $request->dataBatismo,
                'lugar' => $request->lugar,
                'ministro' => $request->ministro,
                'primeiraMembrecia' => $request->primeiraMembrecia,
                'igrejaMembrecia' => $request->igrejaMembrecia,
                'dataMembreciaAtual' => $request->dataMembreciaAtual,
                'batismoEspiritoSanto' => $request->batismoEspiritoSanto,
                'igrejaBatismoEspiritoSanto' => $request->igrejaBatismoEspiritoSanto,
                'historico' => $request->historico,
            ]);


            if ($result == true) {
                return redirect()
                                ->route('membro.index')
                                ->withMsg('Membro cadastrado com sucesso!');
            }


            return redirect()->back();
        } else {

            $all = $request->except('imagem');
            $all['imagem'] = 'avatar.jpg';
            $membro->user_id = $user->id;

            $all['user_id'] = $membro->user_id;

            $return = $membro->create($all);

            if ($return)
                return redirect()->route('membro.index')->with('msg', 'Membro cadastrado com sucesso!');
            else
                return redirect()->back();
        }
    }

    public function show($id) {
        $membro = new Membro();
        $member = $membro->user;

        $findMembro = $membro->findOrFail($id);
        //dd($findMembro);
        
        $data = array(
            'titulo' => 'Lista de membros',
            'localizador' => 'Listagem de membro',
            'info' => 'Listas de Membros',
            'avatar' => Auth()->user(),
            'numFicha' => $membro->findOrFail($id),
            'membro' => $membro->findOrFail($id),
        );
        return view('dashboard.cadastroMembros.show', $data);
    }

    public function edit($id) {
        $membro = new Membro();

        $data = array(
            'titulo' => 'Lista de membros',
            'localizador' => 'Listagem de membro',
            'info' => 'Listas de Membros',
            'avatar' => Auth()->user(),
            'numFicha' => $membro->findOrFail($id),
            'membro' => $membro->findOrFail($id),
        );

        return view('dashboard.cadastroMembros.edit', $data);
    }

    public function update(Request $request, $id) {
        $user = Auth::user();
        $update = new Membro();
        $resultUpdate = $update->findOrFail($id);
        $membro = Membro::findOrFail($id);
        
        
        $resultRequest = $request->all();
        
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $filename = time() . '.' . $imagem->getClientOriginalExtension();
            $imagemPath = public_path('/imagem/igreja/membros/' . $filename);
            Image::make($imagem)
                    ->resize(800, 600)
                    ->save($imagemPath);
           
       
            $query = $resultUpdate->update([
                'user_id' => $user->id,
                'nome' => $request->nome,
                'imagem' => $filename,
                'endereco' => $request->endereco,
                'cep' => $request->cep,
                'cidade' => $request->cidade,
                'estado' => $request->estado,
                'fone' => $request->fone,
                'dataNasc' => $request->dataNasc,
                'naturalidade' => $request->naturalidade,
                'nacionalidade' => $request->nacionalidade,
                'filiacao' => $request->filiacao,
                'rg' => $request->rg,
                'cpf' => $request->cpf,
                'tituloEleitoral' => $request->tituloEleitoral,
                'escolaridade' => $request->escolaridade,
                'estadoCivil' => $request->estadoCivil,
                'nomeConjuge' => $request->nomeConjuge,
                'quantFilhos' => $request->quantFilhos,
                'sexFilho' => $request->sexFilhos,
                'dataConversao' => $request->dataConversao,
                'igrejaConversao' => $request->igrejaConversao,
                'dataBatismo' => $request->dataBatismo,
                'lugar' => $request->lugar,
                'ministro' => $request->ministro,
                'primeiraMembrecia' => $request->primeiraMembrecia,
                'igrejaMembrecia' => $request->igrejaMembrecia,
                'dataMembreciaAtual' => $request->dataMembreciaAtual,
                'batismoEspiritoSanto' => $request->batismoEspiritoSanto,
                'igrejaBatismoEspiritoSanto' => $request->igrejaBatismoEspiritoSanto,
                'historico' => $request->historico,
            ]);
            if ($query) {

                return redirect()->route('membro.index')->with('msg', 'Membro atualizado com sucesso.');
            } else {

                return redirect()
                                ->back()
                                ->withMsg('Não foi possivel atualizar o cadastro');
            }
        } else {
            $all = $request->except('imagem');

            $result = $resultUpdate->update($all);
            if ($result) {
                return redirect()->route('membro.index')->with('msg', 'Membro atualizado com sucesso');
            } else {
                return \redirect()->back()->with('msg', 'Não foi possivel atualizar cadastro');
            }
        }
    }

    public function destroy($id) {
        $membro = new Membro();
        $result = $membro->findOrFail($id);
        
        if ($result == true) {
            $membro->destroy($id);
            return redirect()->route('membro.index')->with('msg', 'Membro excluido com sucesso com sucesso!');
        } else
            return redirect()->back();
    }

}
