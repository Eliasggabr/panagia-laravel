@extends('layouts.panagia')

@section('conteudo')
    <h1 class="font-medieval text-4xl text-[#d4af37] border-b border-[#3a3025] pb-3 mb-8 tracking-wide text-center">Vida dos Santos (Hagiografias)</h1>

    <div class="space-y-8">
        @forelse($santos as $santo)
            <article class="bg-[#1a1a1a] border border-[#2a2015] p-6 rounded-lg shadow-lg">
                <div class="flex items-center space-x-3 mb-4 border-b border-[#2a2015] pb-2">
                    <span class="text-[#d4af37] text-xl">✠</span>
                    <h2 class="font-medieval text-2xl text-[#d4af37]">{{ $santo->nome }}</h2>
                </div>
                <p class="text-[#c0babc] leading-relaxed whitespace-pre-line italic font-serif">
                    {{ $santo->biografia }}
                </p>
            </article>
        @empty
            <div class="bg-[#1a1a1a] border border-[#3a3025] p-8 rounded-lg text-center">
                <p class="text-[#8a8075] italic">Nenhuma hagiografia cadastrada no momento.</p>
            </div>
        @endforelse
    </div>
@endsection