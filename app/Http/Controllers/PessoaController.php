<?php

namespace App\Http\Controllers;

use App\Pessoa;
use Illuminate\Http\Request;

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
        $pessoa = $this->pessoa->create($request->all());

        if($request->ddd != null and $request->fone != null) {
            $telefone = [
                'ddd' => $request->ddd,
                'fone' => $request->fone,
                'pessoa_id' => $pessoa->id
            ];
            $this->telefoneController->criar($telefone);
        }
        return redirect('/');
    }

    public function remove($id)
    {
        $this->pessoa->find($id)->delete();
        return redirect('/');
    }
}