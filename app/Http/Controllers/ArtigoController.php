<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use Illuminate\Http\Request;

class ArtigoController extends Controller
{
    // Método para o usuário
    public function publicIndex()
    {
        $artigos = Artigo::latest()->get();
        return view('public.artigos', compact('artigos'));
    }

    // Lista de artigos no painel do Administrador
    public function index()
    {
        $artigos = Artigo::latest()->get();
        return view('admin.artigos.index', compact('artigos'));
    }

    // Tela de criação de novo artigo (Admin)
    public function create()
    {
        return view('admin.artigos.create');
    }

    // Salvar o novo artigo no banco de dados (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        Artigo::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'autor' => $request->autor ?? 'Admin - Elias', // Usa o padrão se vier vazio
        ]);

        return redirect()->route('artigos.index')->with('success', 'Artigo litúrgico criado com sucesso!');
    }

    // Tela de edição de artigo existente (Admin)
    public function edit(Artigo $artigo)
    {
        return view('admin.artigos.edit', compact('artigo'));
    }

    // Atualizar o artigo editado no banco de dados (Admin)
    public function update(Request $request, Artigo $artigo)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        $artigo->update($request->all());

        return redirect()->route('artigos.index')->with('success', 'Artigo atualizado com sucesso!');
    }

    // Excluir um artigo do banco de dados (Admin)
    public function destroy(Artigo $artigo)
    {
        $artigo->delete();
        return redirect()->route('artigos.index')->with('success', 'Artigo removido com sucesso!');
    }
}
