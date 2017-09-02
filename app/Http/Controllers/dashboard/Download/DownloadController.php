<?php

namespace App\Http\Controllers\dashboard\Download;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Model\Download\Download;
use Image;
use Auth;
use DB;

class DownloadController extends Controller {

    public function index() {
        $data = array(
            'titulo' => 'Arquivos de  Download',
            'localizador' => 'Download',
            'info' => 'Arquivos de Download',
            'avatar' => Auth::user(),
            'links' => DB::table('downloads')
                    ->join('users', 'downloads.user_id', 'users.id')
                    ->get()
        );

        // dd($data['links']);

        return view('dashboard.download.index', $data);
    }

    public function get_datatable() {
        $post = Download::select(['id', 'arquivo', 'created_at']);

        return Datatables::of($post)
                        ->addColumn('action', function ($list) {
                            return '<a href="/dashboard/downloads/link-donwload/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-cloud-download"></i> Pegar Link</a>'
                                    . '<a href="destroy/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-trash"></i> Excluir</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->make(true);
    }

    public function create() {
        $data = array(
            'titulo' => 'Download',
            'localizador' => 'Download',
            'info' => 'Download',
            'avatar' => Auth::user(),
        );
        return view('dashboard.download.index', $data);
    }

    public function store(Request $request) {

        $download = new Download();
        $user = Auth::user();
        if ($request->hasFile('arquivo')) {
            $arquivo = $request->file('arquivo');
            $fileName = time() . "_IDBL." . $arquivo->getClientOriginalExtension();
            $request->file('arquivo')
                    ->move(base_path() . '/public/downloads/arquivos/', $fileName);

            $download->user_id = $user->id;
            $download->arquivo = $fileName;
            $download->descricao = $request->descricao;
            $result = $download->save();

            if ($result) {

                return redirect()->back()->with('msg', 'Arquivo salvo com sucesso');
            } else {

                return redirect()->route('download.index')->with('info', 'Arquivo salvo com sucesso');
            }
        }
    }

    public function pegalink($id) {

        $data = array(
            'titulo' => 'Arquivos de  Download',
            'localizador' => 'Download',
            'info' => 'Arquivos de Download',
            'avatar' => Auth::user(),
            'link' => Download::findOrFail($id)
        );
        return view('dashboard.download.index', $data);
    }

    public function destroy($id) {
        $download = Download::findOrFail($id);
        unlink(base_path() . '/public/downloads/arquivos/' . $download->arquivo);
        $result = $download->delete();

        if ($result)
            return redirect()->back()->with('msg', 'Arquivo deletado com sucesso');
        else
            return redirect()->back()->with('msg', 'Não foi possivel deletar o arquivoÏ');
    }

}
