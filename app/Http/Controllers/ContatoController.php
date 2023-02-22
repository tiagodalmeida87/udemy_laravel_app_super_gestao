<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function principal (Request $request) {

        // var_dump($_POST);
            // echo '<pre>';
            // print_r($request->all());
            // echo '</pre>';
            // echo $request->input('nome');
            // echo '<br>';
            // echo $request->input('email');
        /*
        $contato = new SiteContato();

        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email= $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');

        // print_r($contato->getAttributes());
        $contato->save();
        */

            // $contato = new SiteContato();
            // $contato->create($request->all());
        // atraves do metodo Fill
            // $contato->fill($request->all());
            // $contato->save();

        // print_r($contato->getAttributes());

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', compact('motivo_contatos'));
    }

    public function salvar(Request $request) {

        $regras = [
            'nome' => 'required|min:3|max:80',  // nome com minimo 3 caracteres e no maximo 40
            'telefone' => 'required',
            'email' => 'required|email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1500',            
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 80 caracteres',
            'telefone.required' => 'O campo telefone precisa ser preenchido',
            // 'email.required' => 'O campo email precisa ser preenchido',
            'email.unique' => 'O email já está em uso',
            'email.email' => 'O email informado não é válido',
            // 'motivo_contatos_id.required' => 'O campo motivo contatos deve ter 1 item selecionado',
            // 'mensagem.required' => 'O campo mensagem precisa ser preenchido',
            'mensagem.max' => 'A mensagem  deve ter no máximo 1500 caracteres',

            'required' => 'O campo :attribute deve ser preenchido',
        ]; 
        
        // realizar a validação dos dados do formulário recebidos no request
        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
