<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TelefoneController extends Controller
{
    public function __construct()
    {
        $this->telefone = new Telefone();
    }

    public function criar($telefone)
    {
        $this->telefone->create($telefone);
    }

    public function remove($id)
    {
        $this->telefone->find($id)->delete();
        return redirect('/');
    }

    public function novoTelefone(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        } else {
            $this->telefone->create($request->all());

            return redirect('/telefones/novo/' . $request->pessoa_id);
        }
    }

    public
    function update(Request $request)
    {
        $telefone = $this->telefone->find($request->id);

        $telefone->update($request->all());

        return redirect('/');
    }

    private
    function validacao($data)
    {
        $regras = [
            'ddd' => 'required|min:2|max:2',
            'fone' => 'required|min:8|max:9',
            'pessoa_id' => 'required'
        ];

        $mensagens = [
            'ddd.required' => 'Campo ddd é obrigatório',
            'ddd.min' => 'Campo ddd deve ter 2 dígitos',
            'ddd.max' => 'Campo ddd deve ter 2 dígitos',
            'fone.required' => 'Campo telefone é obrigatório',
            'fone.min' => 'Campo telefone deve ter ao menos 8 dígitos',
            'fone.max' => 'Campo telefone deve ter no máximo 9 dígitos',
            'pessoa_id' => 'É obrigatório informar pessoa'
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
