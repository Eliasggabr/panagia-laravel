<?php

namespace App\Http\Controllers;

use App\Models\Oracao;
use Illuminate\Http\Request;

class OracaoController extends Controller
{
    // Método para o usuário
    public function publicIndex()
    {
        $oracoes = Oracao::orderBy('titulo', 'asc')->get();
        return view('public.oracoes', compact('oracoes'));
    }

    // Lista de orações no painel do Administrador
    public function index()
    {
        $oracoes = Oracao::orderBy('titulo', 'asc')->get();
        return view('admin.oracoes.index', compact('oracoes'));
    }

    // Tela de criação de nova oração (Admin)
    public function create()
    {
        return view('admin.oracoes.create');
    }

    // Salvar nova oração no banco (Admin)
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        Oracao::create($request->all());

        return redirect()->route('oracoes.index')->with('success', 'Oração cadastrada com sucesso!');
    }

    // Tela de edição de oração (Admin)
    public function edit(Oracao $oracao)
    {
        return view('admin.oracoes.edit', compact('oracao'));
    }

    // Atualizar a oração no banco (Admin)
    public function update(Request $request, Oracao $oracao)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'conteudo' => 'required|string',
        ]);

        $oracao->update($request->all());

        return redirect()->route('oracoes.index')->with('success', 'Oração atualizada com sucesso!');
    }

    // Remover a oração do banco (Admin)
    public function destroy(Oracao $oracao)
    {
        $oracao->delete();
        return redirect()->route('oracoes.index')->with('success', 'Oração removida com sucesso!');
    }
}
