<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panagia - Tradição Oriental</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lora:ital,wght@0,400;0,700;1,400&display=swap');
        .font-medieval { font-family: 'Cinzel', serif; }
        .font-body { font-family: 'Lora', serif; }
    </style>
</head>
<body class="bg-[#121212] text-[#e0dacc] font-body min-h-screen flex flex-col justify-between">

    <header class="bg-[#1a1a1a] border-b border-[#3a3025] shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="/" class="font-medieval text-2xl font-bold text-[#d4af37] tracking-wider">PANAGIA</a>
            
            <div class="space-x-6 font-medieval text-sm">
                <a href="/artigos" class="hover:text-[#d4af37] transition">Artigos</a>
                <a href="/santos" class="hover:text-[#d4af37] transition">Santos</a>
                <a href="/oracoes" class="hover:text-[#d4af37] transition">Orações</a>
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-[#d4af37] border border-[#d4af37] px-3 py-1 rounded hover:bg-[#d4af37] hover:text-black transition">Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-[#d4af37] transition">Conecte-se</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-[#d4af37] text-black px-3 py-1 rounded hover:bg-[#b89424] transition font-bold">Cadastre-se</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col items-center justify-center text-center px-4 py-16 max-w-3xl mx-auto">
        <span class="text-[#d4af37] text-4xl mb-4">☦︎</span>
        <h1 class="font-medieval text-5xl md:text-6xl text-[#d4af37] tracking-widest mb-6 uppercase">Panagia</h1>
        
        <p class="text-xl italic text-[#8a8075] font-serif mb-8 border-y border-[#3a3025] py-4 w-full">
            "Contemplando a sã doutrina, a vida dos santos e o sagrado devocionário cristão."
        </p>
        
        <p class="text-[#c0babc] leading-relaxed max-w-xl mb-12 text-lg">
            Seja bem-vindo ao portal digital voltado ao estudo teológico e à devoção espiritual. Explore nossos artigos, hagiografias tradicionais e orações seculares.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 w-full max-w-2xl font-medieval">
            <a href="/artigos" class="border border-[#3a3025] bg-[#1a1a1a] p-5 rounded hover:border-[#d4af37] transition group">
                <h2 class="text-[#d4af37] text-lg font-bold group-hover:scale-105 transition">Artigos Litúrgicos</h2>
                <p class="text-xs text-[#8a8075] mt-2 font-body">Estudos sobre a Fé Ortodoxa.</p>
            </a>
            
            <a href="/santos" class="border border-[#3a3025] bg-[#1a1a1a] p-5 rounded hover:border-[#d4af37] transition group">
                <h2 class="text-[#d4af37] text-lg font-bold group-hover:scale-105 transition">Vida dos Santos</h2>
                <p class="text-xs text-[#8a8075] mt-2 font-body">Crônicas edificantes e exemplos heroicos de fé.</p>
            </a>
            
            <a href="/oracoes" class="border border-[#3a3025] bg-[#1a1a1a] p-5 rounded hover:border-[#d4af37] transition group">
                <h2 class="text-[#d4af37] text-lg font-bold group-hover:scale-105 transition">Devocionário</h2>
                <p class="text-xs text-[#8a8075] mt-2 font-body">Orações tradicionais para o revigoramento da alma.</p>
            </a>
        </div>
    </main>

    <footer class="bg-[#0a0a0a] border-t border-[#2a2015] text-center py-6 text-xs text-[#8a8075] font-medieval tracking-wider">
        <p>Ad maiorem Dei gloriam — Panagia 2026</p>
    </footer>

</body>
</html>