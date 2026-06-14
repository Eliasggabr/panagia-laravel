<?php

namespace App\Http\Controllers;

use App\Models\Santo;
use Illuminate\Http\Request;

class SantoController extends Controller
{
    // Método para o usuário
    public function publicIndex()
    {
        $santos = Santo::orderBy('nome', 'asc')->get();
        return view('public.santos', compact('santos'));
    }

    // Lista de santos no painel do Administrador
    public function index()
    {
        $santos = Santo::orderBy('nome', 'asc')->get();
        return view('admin.santos.index', compact('santos'));
    }

    // Tela de criação de novo santo (Admin)
    public function create()
    {
        return view('admin.santos.create');
    }

    // Salvar o novo santo no banco de dados (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'biografia' => 'required|string',
        ]);

        Santo::create($request->all());

        return redirect()->route('santos.index')->with('success', 'Hagiografia/Santo adicionado com sucesso!');
    }

    // Tela de edição de santo (Admin)
    public function edit(Santo $santo)
    {
        return view('admin.santos.edit', compact('santo'));
    }

    // Atualizar os dados do santo no banco (Admin)
    public function update(Request $request, Santo $santo)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'biografia' => 'required|string',
        ]);

        $santo->update($request->all());

        return redirect()->route('santos.index')->with('success', 'Biografia do santo atualizada com sucesso!');
    }

    // Excluir um santo do banco (Admin)
    public function destroy(Santo $santo)
    {
        $santo->delete();
        return redirect()->route('santos.index')->with('success', 'Registro do santo removido!');
    }
}