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
}
