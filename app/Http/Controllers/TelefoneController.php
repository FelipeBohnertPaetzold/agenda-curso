<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;

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
        $this->telefone->create($request->all());

        return redirect('/telefones/novo/' . $request->pessoa_id);
    }

    public function update(Request $request)
    {
        $telefone = $this->telefone->find($request->id);

        $telefone->update($request->all());

        return redirect('/');
    }
}
