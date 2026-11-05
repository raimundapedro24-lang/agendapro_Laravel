<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('📊 Painel de Controle') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h3 class="text-lg font-bold text-gray-700 mb-6">Resumo da sua Agenda</h3>

            <!-- Grid de Estatísticas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">

                <!-- Card Total -->
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center transform transition hover:scale-105">
                    <div class="p-4 bg-indigo-100 rounded-2xl text-indigo-600 mr-4 text-2xl">📁</div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Total</p>
                        <h4 class="text-2xl font-black text-gray-800">{{ $stats['total_contacts'] }}</h4>
                    </div>
                </div>

                <!-- Card Pessoal -->
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center transform transition hover:scale-105">
                    <div class="p-4 bg-green-100 rounded-2xl text-green-600 mr-4 text-2xl">🏠</div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Pessoal</p>
                        <h4 class="text-2xl font-black text-gray-800">{{ $stats['pessoal'] }}</h4>
                    </div>
                </div>

                <!-- Card Trabalho -->
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex items-center transform transition hover:scale-105">
                    <div class="p-4 bg-blue-100 rounded-2xl text-blue-600 mr-4 text-2xl">💼</div>
                    <div>
                        <p class="text-sm text-gray-500 font-bold uppercase">Trabalho</p>
                        <h4 class="text-2xl font-black text-gray-800">{{ $stats['trabalho'] }}</h4>
                    </div>
                </div>

                <!-- Botão Rápido -->
                <a href="{{ route('contacts.create') }}" class="bg-indigo-600 p-6 rounded-3xl shadow-lg flex items-center justify-center text-white hover:bg-indigo-700 transition-all transform hover:scale-105 group">
                    <span class="text-2xl mr-2 group-hover:rotate-12 transition-transform">+</span>
                    <span class="font-bold">Novo Contato</span>
                </a>
            </div>

            @if(auth()->user()->role === 'admin')
                <h3 class="text-lg font-bold text-gray-700 mb-6">Administração do Sistema</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-indigo-900 p-6 rounded-3xl text-white shadow-xl">
                        <p class="opacity-70 font-bold uppercase text-xs">Usuários Totais</p>
                        <h4 class="text-4xl font-black">{{ $stats['total_users'] }}</h4>
                    </div>
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-orange-200">
                        <p class="text-orange-500 font-bold uppercase text-xs">Aguardando Ativação</p>
                        <h4 class="text-4xl font-black text-gray-800">{{ $stats['pending_users'] }}</h4>
                        <a href="{{ route('admin.users') }}" class="text-indigo-600 text-sm font-bold hover:underline mt-2 inline-block">Ver pendentes →</a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>