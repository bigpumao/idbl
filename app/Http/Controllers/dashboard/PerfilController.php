<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Auth;

class PerfilController extends Controller {

    public function profile() {
        $data = array(
            'titulo' => 'Configuração do usuário',
            'info' => 'Configuração do Perfil',
            'localizador' => 'Perfil',
            'avatar' => Auth::user()
        );
        return view('dashboard.perfil.imagem_perfil', $data);
    }

    public function update_avatar(Request $request) {
        $data = array(
            'titulo' => 'Configuração do usuário',
            'info' => 'Configuração do Perfil',
            'localizador' => 'Perfil',
            'avatar' => Auth::user()
        );
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('dashboard.perfil.imagem_perfil', $data);
    }

    public function update_perfil(Request $request, $id) {
        $user = Auth::user();

        if ($request->password == null) {
            $user->name = $request->name;
            $user->save();
            return redirect()->back()->with('info', 'Usuário atualizado, Mais a senha nao foi atualizada ');
        }
        if ($request->password === $request->contraSenha and $request->name == null) {
            $user->name = $user->name;
            $user->password = bcrypt($request->password);
            $return = $user->save();
            if ($return) {
                return redirect()->route('perfil')->with('info', 'Senha atualizado com sucesso, Mais o usuário nao foi atualizado');
            } else {
                return redirect()->back()->with('error', 'Não foi possivel atualizar o usuário!');
            }
        }elseif($request->password === $request->contraSenha && $request->name == true) {
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $return = $user->save();
            if ($return) {
                return redirect()->back()->with('msg', 'Usuario e Senha atualizados com sucesso');
            } else {
                return redirect()->back()->with('erro', 'Não foi possivel atualizar o usuário');
            }
        }
    }
    

}
