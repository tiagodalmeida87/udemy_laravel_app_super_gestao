<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) 
    {
        $erro = '';
        if($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }
        
        if($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a página';
        }
        
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) 
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];
        //se não passar pelo validadte
        $request->validate($regras, $feedback);

        // Recuperamos os parametros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // iniciar o model User
        $user = new User();

        $usuario = $user->where('email', $email)
                    ->where('password', $password) 
                    ->get()
                    ->first();

        if(isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            // dd($_SESSION);

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }

        // print_r($request->all());

    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
