<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function index() {
        return Prestador::paginate(10);
    }
}
