<?php

namespace App\Http\Controllers;

use App\Models\Prestador;
use Illuminate\Http\Request;

class PrestadorController extends Controller
{
    public function index() {
        return Prestador::paginate(10);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:prestadores',
            'telefone' => 'required|string',
            'foto' => 'file',
            'nome_servico' => 'required|string',
            'descricao' => 'required|string',
            'valor' => 'required|numeric',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $data['foto'] = file_get_contents($file);
        }

        $prestador = Prestador::create($data);

        return response()->json(['message' => 'Prestador cadastrado com sucesso', 'prestador' => $prestador], 201);
    }
}
