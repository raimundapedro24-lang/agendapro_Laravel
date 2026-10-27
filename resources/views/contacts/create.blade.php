<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('🆕 Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl rounded-3xl p-8 border border-gray-100">

                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf

                    <div class="space-y-6">
                        <!-- Nome -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nome Completo</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3 transition-all"
                                   placeholder="Nome do contato..." required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Telefone -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Telefone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                       class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3"
                                       placeholder="(00) 00000-0000" required>
                                @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <!-- Tipo -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">Categoria</label>
                                <select name="type" class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3">
                                    <option value="Pessoal">Pessoal 🏠</option>
                                    <option value="Trabalho">Trabalho 💼</option>
                                    <option value="Outros">Outros 📍</option>
                                </select>
                            </div>
                        </div>

                        <!-- E-mail -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">E-mail (Opcional)</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-3"
                                   placeholder="contato@email.com">
                        </div>

                        <!-- Notas -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Notas Rápidas</label>
                            <textarea name="notes" rows="3"
                                      class="w-full rounded-xl border-gray-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                      placeholder="Alguma observação importante?">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="mt-10 flex items-center justify-between">
                        <a href="{{ route('contacts.index') }}" class="text-gray-400 hover:text-gray-600 font-bold transition-colors">
                            ⬅️ Voltar
                        </a>
                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-10 rounded-2xl shadow-lg transform transition-all duration-300 hover:scale-105 active:scale-95">
                            Salvar Contato
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>