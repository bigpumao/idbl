<?php

namespace App\Http\Controllers\dashboard\Acl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Gate;
use Yajra\Datatables\Datatables;
class AclController extends Controller
{
    public function index(User $user)
    {
        $result = $user->all();
        $data = array(
            'titulo'            =>  'Permições Administrativa',
            'localizador'       => 'Permições Administrativa',
            'info'              => 'Permições Administrativa',
            'avatar'            =>  Auth::user(),
            'users'             =>  $result,
        );
        return view('dashboard.acl.index',$data);
    }
    public function get_datatable() {
        $post = User::select(['id', 'name', 'email', 'admin', 'created_at']);

        return Datatables::of($post)
                        ->addColumn('action', function ($list) {
                            return '<a href="edit/' . $list->id . '" class="btn btn-xs btn-primary" style="margin-left:3px;"><i class="fa fa-pencil-square-o" ></i> Editar</a>';
                        })
                        ->editColumn('id', '{{$id}}')
                        ->removeColumn('password')
                        ->make(true);
    }
    public function edit(User $user,$id)
    {
        $acl = $user->findOrFail($id);
        $data = array(
             'titulo'            =>  'Permições Administrativa',
             'localizador'       => 'Permições Administrativa',
             'info'              => 'Permições Administrativa',
             'avatar'            =>  Auth::user(),
             'user'             =>  $acl,
         );
        if(auth()->user()->admin)
        {
            return view('dashboard.acl.edit' , $data);
        } else
        {
            return redirect()->route('acl.index')->with('error' , 'Você não tem status administrativo para fazer essa operação');
        }
    }
    public function update(Request $request , $id)
    {
       
        $user = User::findOrFail($id);
        
        if($user->id == '1')
        {
            return redirect()->route('acl.index')->with('error' , 'Você não tem status administrativo para fazer essa operação');
        }
        if($request->input('admin') == '1')
        {
            $user->admin = true;
            $user->save();
            return redirect()->route('acl.index')->with('msg' , 'Usuário Atualizado com sucesso');
        }else
        {
            $user->admin = false;
            $user->save();
            return redirect()->route('acl.index')->with('msg' , 'Usuário Atualizado com sucesso');;
        }
        
        
    }
}
