<?php

namespace App\Http\Controllers;

use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Testamento::all();
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        $testamento = Testamento::create($request->all());

        if ($testamento) {
            return response()->json([
                'message' => ' Testamento Cadastrado com sucesso!'
            ], 201);
        }

        return response()->json([
            'message' => ' Erro ao cadastrar o livro'
        ], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $testamento)
    {
        $testamento = Testamento::find($testamento);

        if ($testamento) {
            // uniao do testamento e o livro em funcao do relacionamento feito na model
            $response = [
                'testamento' => $testamento,
                'livros' => $testamento->livros
            ];

            return $response;
        }

        return response()->json([
            'message' => ' Erro ao pesquisar o livro.'
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $testamento)
    {
        $testamento = Testamento::findOrfail($testamento);

        $testamento->update($request->all());

        return $testamento;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $testamento)
    {
        return Testamento::destroy($testamento);
    }
}
