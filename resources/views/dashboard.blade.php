@extends('layouts.panagia')

@section('conteudo')
    <div class="text-center max-w-3xl mx-auto mb-12">
        <span class="text-[#d4af37] text-3xl">☦︎</span>
        <h1 class="font-medieval text-4xl text-[#d4af37] mt-2 tracking-widest uppercase">Painel de Controle Litúrgico</h1>
        <p class="text-sm text-[#8a8075] mt-2 italic">Acessado por: {{ Auth::user()->name }} ({{ Auth::user()->email }})</p>
    </div>

    <div class="bg-[#1a1a1a] border border-[#3a3025] rounded-lg p-8 shadow-2xl max-w-4xl mx-auto">
        @if(Auth::user()->role === 'admin')
            <h2 class="font-medieval text-xl text-[#d4af37] mb-4 text-center sm:text-left border-b border-[#3a3025] pb-2">
                Mesa de Administração do Repositório
            </h2>
            <p class="text-[#c0babc] text-sm mb-8 leading-relaxed">
                Seu nível de credencial concede autoridade sobre os registros do banco de dados. Escolha uma das seções sacras abaixo para inserir, modificar ou expurgar conteúdos:
            </p>
            
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 font-medieval">
                <a href="{{ route('artigos.index') }}" class="block p-5 bg-[#222222] border border-[#3a3025] text-center rounded hover:border-[#d4af37] hover:bg-[#2a2a2a] transition group">
                    <span class="block text-xl text-[#d4af37] mb-2 group-hover:scale-110 transition"></span>
                    <span class="text-[#e0dacc] font-bold tracking-wide">Gerenciar Artigos</span>
                </a>
                
                <a href="{{ route('santos.index') }}" class="block p-5 bg-[#222222] border border-[#3a3025] text-center rounded hover:border-[#d4af37] hover:bg-[#2a2a2a] transition group">
                    <span class="block text-xl text-[#d4af37] mb-2 group-hover:scale-110 transition"></span>
                    <span class="text-[#e0dacc] font-bold tracking-wide">Gerenciar Santos</span>
                </a>
                
                <a href="{{ route('oracoes.index') }}" class="block p-5 bg-[#222222] border border-[#3a3025] text-center rounded hover:border-[#d4af37] hover:bg-[#2a2a2a] transition group">
                    <span class="block text-xl text-[#d4af37] mb-2 group-hover:scale-110 transition"></span>
                    <span class="text-[#e0dacc] font-bold tracking-wide">Gerenciar Orações</span>
                </a>
            </div>
        @else
            <div class="text-center py-6">
                <h2 class="font-medieval text-2xl text-[#d4af37] mb-2">Saudações, Irmão!</h2>
                <p class="text-[#c0babc] max-w-md mx-auto">Você está autenticado em nosso portal como leitor regular. Sinta-se livre para usar o menu superior para contemplar nossos conteúdos de devoção.</p>
            </div>
        @endif
    </div>
@endsection