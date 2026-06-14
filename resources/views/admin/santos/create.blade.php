@extends('layouts.panagia')

@section('conteudo')
    <h1 class="font-medieval text-3xl text-[#d4af37] border-b border-[#3a3025] pb-3 mb-6">Cadastrar Santo / Hagiografia</h1>

    <form action="{{ route('santos.store') }}" method="POST" class="bg-[#1a1a1a] border border-[#2a2015] p-6 rounded-lg space-y-6 shadow-xl">
        @csrf 

        <div>
            <label class="block font-medieval text-[#d4af37] mb-2">Nome do Santo</label>
            <input type="text" name="nome" required class="w-full bg-[#262626] border border-[#3a3025] rounded p-3 text-[#e0dacc] focus:outline-none focus:border-[#d4af37]">
        </div>

        <div>
            <label class="block font-medieval text-[#d4af37] mb-2">Biografia / Vida do Santo</label>
            <textarea name="biografia" rows="10" required class="w-full bg-[#262626] border border-[#3a3025] rounded p-3 text-[#e0dacc] focus:outline-none focus:border-[#d4af37] whitespace-pre-line"></textarea>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-700 text-white font-medieval px-6 py-2 rounded hover:bg-green-600 transition">Salvar Santo</button>
            <a href="{{ route('santos.index') }}" class="bg-zinc-700 text-zinc-200 font-medieval px-6 py-2 rounded hover:bg-zinc-600 transition">Cancelar</a>
        </div>
    </form>
@endsection