<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PessoaController extends Controller
{
    public function __construct(TelefoneController $telefoneController)
    {
        $this->pessoa = new Pessoa();
        $this->telefoneController = $telefoneController;
    }

    public function filtroLetra($letra)
    {
        return view('pessoas.index', [
            'pessoas' => $this->pessoa->filtroLetra($letra),
            'criterio' => $letra
        ]);
    }

    public function buscar(Request $request)
    {
        return view('pessoas.index', [
            'pessoas' => $this->pessoa->buscar($request->criterio),
            'criterio' => $request->criterio
        ]);
    }

    public function criar(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        } else {
            $pessoa = $this->pessoa->create($request->all());

            if ($request->ddd != null and $request->fone != null) {
                $telefone = [
                    'ddd' => $request->ddd,
                    'fone' => $request->fone,
                    'pessoa_id' => $pessoa->id
                ];
                $this->telefoneController->criar($telefone);
            }
            return redirect('/');
        }
    }

    public function update(Request $request)
    {
        $validacao = $this->validacao($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        } else {
            $pessoa = $this->pessoa->find($request->id);
            $pessoa->update($request->all());
            return redirect('/');
        }
    }

    public function remove($id)
    {
        $this->pessoa->find($id)->delete();
        return redirect('/');
    }

    private function validaComTelefone($data)
    {
        $regras = [
            'nome' => 'required',
            'ddd' => 'required|min:2|max:2',
            'fone' => 'required|min:9|max:10'
        ];

        $mensagens = [
            'nome.required' => 'Campo nome é obrigatório',
            'ddd.required' => 'Campo ddd é obrigatório',
            'ddd.min' => 'Campo ddd deve ter 2 dígitos',
            'ddd.max' => 'Campo ddd deve ter 2 dígitos',
            'fone.required' => 'Campo telefone é obrigatório',
            'fone.min' => 'Campo telefone deve ter ao menos 9 dígitos',
            'fone.max' => 'Campo telefone deve ter no máximo 10 dígitos'
        ];

        return Validator::make($data, $regras, $mensagens);
    }

    private function validacao($data)
    {

        if (array_key_exists('ddd', $data) && array_key_exists('fone', $data)) {
            if ($data['ddd'] != null || $data['fone'] != null) {
                return $this->validaComTelefone($data);
            }
        }

        $regras = [
            'nome' => 'required'
        ];

        $mensagens = [
            'nome.required' => 'Campo nome é obrigatório',
        ];


        return Validator::make($data, $regras, $mensagens);
    }
}