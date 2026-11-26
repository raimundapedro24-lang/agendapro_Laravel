<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AgendaPro | Sua Agenda Inteligente</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-gray-50">

        <!-- Navbar -->
        <nav class="absolute w-full z-50 px-6 py-6">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-white rounded-xl shadow-lg flex items-center justify-center text-xl">📅</div>
                    <span class="text-white font-black text-xl tracking-tighter">AgendaPro</span>
                </div>

                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white font-bold hover:underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white font-bold hover:underline">Entrar</a>
                        <a href="{{ route('register') }}" class="bg-white text-indigo-600 px-6 py-2 rounded-full font-black shadow-xl hover:scale-105 transition-transform">Começar Grátis</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <header class="relative bg-gradient-to-br from-indigo-600 via-purple-700 to-indigo-900 pt-32 pb-20 px-6 overflow-hidden">
            <!-- Círculos Decorativos de Fundo -->
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl"></div>

            <div class="max-w-7xl mx-auto text-center relative z-10">
                <h1 class="text-5xl md:text-7xl font-black text-white mb-6 leading-tight">
                    Organize seus contatos <br> <span class="text-indigo-200 underline decoration-indigo-400">com inteligência.</span>
                </h1>
                <p class="text-xl text-indigo-100 mb-10 max-w-2xl mx-auto font-medium">
                    A AgendaPro é a solução definitiva para gerenciar seus contatos pessoais e profissionais com segurança, fotos e relatórios profissionais.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('register') }}" class="bg-white text-indigo-700 text-lg font-black px-10 py-4 rounded-2xl shadow-2xl transform transition hover:scale-105 active:scale-95">
                        Criar Minha Agenda
                    </a>
                    <a href="#features" class="bg-indigo-500/30 backdrop-blur-md text-white text-lg font-bold px-10 py-4 rounded-2xl border border-white/20 hover:bg-indigo-500/50 transition-all">
                        Ver Recursos
                    </a>
                </div>
            </div>
        </header>

        <!-- Features Section -->
        <section id="features" class="py-24 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-black text-gray-800">Por que escolher a AgendaPro?</h2>
                    <p class="text-gray-500 mt-4 text-lg">Tudo o que você precisa em um só lugar.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                        <div class="w-16 h-16 bg-indigo-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:rotate-12 transition-transform">🔒</div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Segurança Total</h3>
                        <p class="text-gray-500 leading-relaxed">Acesso por níveis e aprovação manual. Seus dados estão protegidos e isolados.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                        <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:rotate-12 transition-transform">📸</div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Gestão Visual</h3>
                        <p class="text-gray-500 leading-relaxed">Adicione fotos aos seus contatos e identifique-os instantaneamente em um layout moderno.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-gray-100 hover:shadow-xl transition-all group">
                        <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:rotate-12 transition-transform">📄</div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Relatórios PDF</h3>
                        <p class="text-gray-500 leading-relaxed">Gere relatórios profissionais da sua agenda com apenas um clique para impressão ou backup.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section class="py-20 px-6">
            <div class="max-w-5xl mx-auto bg-indigo-600 rounded-[3rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
                <h2 class="text-4xl font-black mb-6">Pronto para organizar sua vida?</h2>
                <p class="text-indigo-100 mb-10 text-lg">Junte-se a milhares de usuários e mantenha seus contatos sempre à mão.</p>
                <a href="{{ route('register') }}" class="bg-white text-indigo-600 font-black px-12 py-4 rounded-2xl shadow-xl hover:scale-110 transition-transform inline-block">
                    Começar Agora — É Grátis
                </a>
            </div>
        </section>

        <footer class="py-10 text-center text-gray-400 text-sm">
            &copy; {{ date('Y') }} AgendaPro. Desenvolvido com Laravel e MySQL.
        </footer>

    </body>
</html>