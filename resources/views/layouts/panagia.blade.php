<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panagia - Tradição Católica</title>
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
            
            <div class="flex items-center space-x-6 font-medieval text-sm">
                <a href="/artigos" class="hover:text-[#d4af37] transition">Artigos</a>
                <a href="/santos" class="hover:text-[#d4af37] transition">Santos</a>
                <a href="/oracoes" class="hover:text-[#d4af37] transition">Orações</a>
                
                @auth
                    <span class="text-[#8a8075] border-l border-[#3a3025] pl-6">Olá, <span class="text-[#e0dacc] font-bold">{{ Auth::user()->name }}</span>!</span>
                    <a href="/dashboard" class="text-[#d4af37] hover:underline">Painel</a>
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-400 hover:text-red-300 transition uppercase tracking-wider text-xs border border-red-400/20 px-2 py-1 rounded hover:bg-red-400/5">Sair</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-[#d4af37] transition">Conecte-se</a>
                    <a href="{{ route('register') }}" class="bg-[#d4af37] text-black px-3 py-1 rounded hover:bg-[#b89424] transition font-bold">Cadastre-se</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-5xl mx-auto w-full px-4 py-12">
        @yield('conteudo')
    </main>

    <footer class="bg-[#0a0a0a] border-t border-[#2a2015] text-center py-6 text-xs text-[#8a8075] font-medieval tracking-wider">
        <p>Ad maiorem Dei gloriam — Panagia 2026</p>
    </footer>

</body>
</html>