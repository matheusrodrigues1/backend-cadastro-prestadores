<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestador;

class PrestadorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'telefone' => 'required|string|min:6|max:20',
            'email' => 'required|string|email|max:191|unique:prestadores',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome_servico' => 'required|string|min:5',
            'descricao' => 'required|string|min:5|max:200',
            'valor' => 'required|numeric',
        ]);

        $prestador = new Prestador();
        $prestador->nome = $request->nome;
        $prestador->telefone = $request->telefone;
        $prestador->email = $request->email;
        $prestador->nome_servico = $request->nome_servico;
        $prestador->descricao = $request->descricao;
        $prestador->valor = $request->valor;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nomeFoto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('uploads', $nomeFoto, 'public');
            $prestador->foto = $nomeFoto;
        }

        $prestador->save();

        return response()->json(['message' => 'Prestador cadastrado com sucesso']);
    }

    public function index()
    {
        $prestadores = Prestador::all();
        return response()->json($prestadores);
    }

    public function destroy($id)
    {
        Prestador::destroy($id);
        return response()->json(['message' => 'Prestador excluído com sucesso']);
    }

}
