<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index ()
    {
        return view('app.fornecedor.index');
    }

    public function listar (Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%'.$request->input('nome').'%')
                                    ->where('site', 'like', '%'.$request->input('site').'%')
                                    ->where('uf', 'like', '%'.$request->input('uf').'%')
                                    ->where('email', 'like', '%'.$request->input('email').'%')
                                    ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar (Request $request)
    {
        $msg = '';
        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.max' => 'O campo nome não pode conter mais que 40 caracteres',
                'uf.min' => 'O campo UF deve conter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve conter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $editar = $fornecedor->update($request->all());

            if ($editar) {
                $msg = 'Edição realizada com sucesso!';
            } else {
                $msg = 'Erro ao tentar editar o fornecedor';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar ($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir ($id)
    {
        // usando soft delete (coluna deleted_at)
        Fornecedor::find($id)->delete();
        // deleter 100% do banco
        Fornecedor::find($id)->forceDelete();

        return redirect()->route('app.fornecedor');
    }
}
