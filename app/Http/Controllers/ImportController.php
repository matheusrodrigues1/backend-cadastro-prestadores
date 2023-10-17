<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Prestador;
use League\Csv\Reader;

class ImportController extends Controller
{

    public function importCSV(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ]);

        $file = $request->file('file');
        $reader = Reader::createFromPath($file->getPathname(), 'r');
        $reader->setHeaderOffset(0);

        try {
            foreach ($reader->getRecords() as $row) {
                $prestador = new Prestador();
                $prestador->nome = $row['nome'];
                $prestador->telefone = $row['telefone'];
                $prestador->email = $row['email'];
                $prestador->foto = $this->saveCsvFile($row['foto'], $file);
                $prestador->nome_servico = $row['nome_servico'];
                $prestador->descricao = $row['descricao'];
                $prestador->valor = $row['valor'];

                $prestador->save();
            }

            return response()->json(['message' => 'CSV importado com sucesso']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao importar CSV'], 500);
        }
    }

    private function saveCsvFile($filename, $file)
    {
        $directory = 'uploads';
        $path = Storage::putFileAs($directory, $file, $filename);

        return $path;
    }


}
