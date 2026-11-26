<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('⚙️ Minhas Configurações') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Grid Responsivo -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Coluna 1: Informações e Senha -->
                <div class="space-y-8">
                    <div class="p-8 bg-white shadow-xl rounded-3xl border border-gray-100 transition-all hover:shadow-2xl">
                        <div class="flex items-center mb-6">
                            <span class="text-3xl mr-3">👤</span>
                            <h3 class="text-xl font-bold text-gray-800">Informações do Perfil</h3>
                        </div>
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="p-8 bg-white shadow-xl rounded-3xl border border-gray-100 transition-all hover:shadow-2xl">
                        <div class="flex items-center mb-6">
                            <span class="text-3xl mr-3">🔐</span>
                            <h3 class="text-xl font-bold text-gray-800">Segurança da Conta</h3>
                        </div>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Coluna 2: Status e Zona de Perigo -->
                <div class="space-y-8">
                    <!-- Card de Status do Usuário -->
                    <div class="p-8 bg-indigo-900 shadow-xl rounded-3xl text-white">
                        <h3 class="text-xl font-bold mb-4">Status da sua Conta</h3>
                        <div class="flex items-center space-x-4">
                            <div class="px-4 py-2 bg-white bg-opacity-20 rounded-xl font-bold uppercase tracking-widest text-xs">
                                Nível: {{ auth()->user()->role }}
                            </div>
                            <div class="px-4 py-2 bg-green-500 rounded-xl font-bold uppercase tracking-widest text-xs">
                                Status: Ativo
                            </div>
                        </div>
                        <p class="mt-6 text-indigo-200 text-sm italic">
                            Membro desde: {{ auth()->user()->created_at->format('d/m/Y') }}
                        </p>
                    </div>

                    <!-- Zona de Perigo -->
                    <div class="p-8 bg-white shadow-xl rounded-3xl border-l-8 border-red-500 transition-all hover:shadow-2xl">
                        <div class="flex items-center mb-6">
                            <span class="text-3xl mr-3">⚠️</span>
                            <h3 class="text-xl font-bold text-red-600">Zona de Perigo</h3>
                        </div>
                        <p class="text-sm text-gray-500 mb-6">Uma vez excluída, sua conta e todos os seus contatos serão removidos permanentemente.</p>
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>