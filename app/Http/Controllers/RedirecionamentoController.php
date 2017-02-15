<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;

class RedirecionamentoController extends Controller
{
    public function __construct()
    {
        $this->pessoa = new Pessoa();
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
}
