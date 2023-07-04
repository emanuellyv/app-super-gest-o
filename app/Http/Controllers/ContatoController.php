<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{

    public function index ()
    {
        $motivo = MotivoContato::all();

        return view('site.contato', ['motivo' => $motivo]);
    }

    public function salvar (Request $request) {

//        $contato = new SiteContato();
        $regras = [
            'nome' => 'required|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido',
            'nome.unique' => 'Este nome já está sendo utilizado',
            'email.email' => 'Preencha um e-mail válido',
            'required' => 'O campo :attribute precisa ser preenchido',
            'mensagem.max' => 'A mensagem não pode conter mais de 2000 caracteres',
        ];

        $request->validate($regras, $feedback);
        SiteContato::create($request->all());

//        $contato->save();

//        $contato = new SiteContato();
//        $contato->nome = $request->input('nome');
//        $contato->telefone = $request->input('telefone');
//        $contato->email = $request->input('email');
//        $contato->motivo = $request->input('motivo');
//        $contato->mensagem = $request->input('mensagem');
//        $contato->save();

        return response()->redirectTo(route('site.principal'));
    }
}
