@extends('layouts.panagia')

@section('conteudo')
    <h1 class="font-medieval text-4xl text-[#d4af37] border-b border-[#3a3025] pb-3 mb-8 tracking-wide text-center">Devocionário e Orações</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($oracoes as $oracao)
            <div class="bg-[#1a1a1a] border border-[#2a2015] p-6 rounded-lg shadow-lg flex flex-col justify-between">
                <div>
                    <h2 class="font-medieval text-xl text-[#d4af37] mb-4 border-b border-[#2a2015] pb-2 text-center">
                        {{ $oracao->titulo }}
                    </h2>
                    <p class="text-[#e0dacc] leading-relaxed whitespace-pre-line text-center font-serif antialiased">
                        {{ $oracao->conteudo }}
                    </p>
                </div>
                <div class="text-center text-[#d4af37] text-xs font-medieval mt-4">
                    Amém.
                </div>
            </div>
        @empty
            <div class="col-span-1 md:col-span-2 bg-[#1a1a1a] border border-[#3a3025] p-8 rounded-lg text-center">
                <p class="text-[#8a8075] italic">Nenhuma oração cadastrada no devocionário ainda.</p>
            </div>
        @endforelse
    </div>
@endsection