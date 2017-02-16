<?php

namespace App\Http\Controllers;

use App\Pessoa;
use App\Telefone;
use Illuminate\Http\Request;

class RedirecionamentoController extends Controller
{
    public function __construct()
    {
        $this->pessoa = new Pessoa();
        $this->telefone = new Telefone();
    }

    public function chamaHome()
    {
        return redirect('/A');
    }

    public function criarNovaPessoa()
    {
        return view('pessoas.create');
    }

    public function deletaPessoa($id)
    {
        return view('pessoas.delete', [
            'pessoa' => $this->pessoa->find($id)
        ]);
    }

    public function editarPessoa($id)
    {
        return view('pessoas.edit', [
            'pessoa' => $this->pessoa->find($id)
        ]);
    }

    public function deletaTelefone($id)
    {
        return view('telefones.delete', [
            'telefone' => $this->telefone->find($id)
        ]);
    }

    public function novoTelefone($pessoa_id)
    {
        return view('telefones.create', [
            'pessoa' => $this->pessoa->find($pessoa_id)
        ]);
    }

    public function editarTelefone($id)
    {
        return view('telefones.edit', [
            'telefone' => $this->telefone->find($id)
        ]);
    }
}
