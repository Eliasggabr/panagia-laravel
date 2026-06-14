@extends('layouts.panagia')

@section('conteudo')
    <h1 class="font-medieval text-4xl text-[#d4af37] border-b border-[#3a3025] pb-3 mb-8 tracking-wide text-center">Artigos Litúrgicos</h1>

    <div class="space-y-8">
        @forelse($artigos as $artigo)
            <article class="bg-[#1a1a1a] border border-[#2a2015] p-6 rounded-lg shadow-lg">
                <h2 class="font-medieval text-2xl text-[#d4af37] mb-2">{{ $artigo->titulo }}</h2>
                <p class="text-xs text-[#8a8075] mb-4 font-medieval">Escrito por: {{ $artigo->autor }} | {{ $artigo->created_at->format('d/m/Y') }}</p>
                <p class="text-[#c0babc] leading-relaxed whitespace-pre-line">{{ $artigo->conteudo }}</p>
            </article>
        @empty
            <p class="text-center text-[#8a8075] italic">Nenhum artigo publicado ainda.</p>
        @endforelse
    </div>
@endsection