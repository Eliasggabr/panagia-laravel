@extends('layouts.panagia')

@section('conteudo')
    <div class="flex justify-between items-center border-b border-[#3a3025] pb-4 mb-6">
        <h1 class="font-medieval text-3xl text-[#d4af37]">Gerenciar Devocionário</h1>
        <a href="{{ route('oracoes.create') }}" class="bg-[#d4af37] text-black font-medieval font-bold px-4 py-2 rounded hover:bg-[#b89424] transition">Nova Oração</a>
    </div>

    @if(session('success'))
        <div class="bg-green-900 border border-green-700 text-green-100 px-4 py-3 rounded mb-6 font-medieval text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#1a1a1a] border border-[#3a3025] rounded-lg overflow-hidden shadow-xl">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-[#262626] border-b border-[#3a3025] font-medieval text-[#d4af37]">
                    <th class="p-4">Título da Oração</th>
                    <th class="p-4">Trecho Inicial</th>
                    <th class="p-4 text-center">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#2a2015]">
                @foreach($oracoes as $oracao)
                    <tr class="hover:bg-[#202020] transition">
                        <td class="p-4 font-bold text-[#e0dacc]">{{ $oracao->titulo }}</td>
                        <td class="p-4 text-sm text-[#8a8075] max-w-xs truncate italic">{{ $oracao->conteudo }}</td>
                        <td class="p-4">
                            <div class="flex justify-center items-center space-x-4">
                                <a href="{{ route('oracoes.edit', $oracao->id) }}" class="text-blue-400 hover:text-blue-300 font-medieval tracking-wider uppercase text-xs border border-blue-400/30 px-2 py-1 rounded hover:bg-blue-400/10 transition">Editar</a>
                                
                                <form action="{{ route('oracoes.destroy', $oracao->id) }}" method="POST" onsubmit="return confirm('Deseja mesmo remover esta oração do devocionário?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 font-medieval tracking-wider uppercase text-xs border border-red-400/30 px-2 py-1 rounded hover:bg-red-400/10 transition">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection