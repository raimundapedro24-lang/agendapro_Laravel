<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('📂 Minha Agenda') }}
            </h2>
            <a href="{{ route('contacts.create') }}"
               class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-full font-bold text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <span class="mr-2">+</span> Adicionar Contato
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-500 text-white rounded-lg shadow-md animate-fade-in-down flex items-center">
                    <span class="mr-2">✅</span> {{ session('success') }}
                </div>
            @endif

            <!-- Grid de Contatos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($contacts as $contact)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 group">
                        <div class="p-6">
                            <div class="flex items-center mb-6">
                               <div class="w-14 h-14 rounded-2xl shadow-lg overflow-hidden transform group-hover:rotate-12 transition-transform">
                                    @if($contact->photo)
                                        <img src="{{ asset('storage/' . $contact->photo) }}" alt="{{ $contact->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-bold text-2xl uppercase">
                                            {{ substr($contact->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-xl font-bold text-gray-800 group-hover:text-indigo-600 transition-colors">{{ $contact->name }}</h3>
                                    <p class="text-sm text-gray-400 font-medium">{{ $contact->type }}</p>
                                </div>
                            </div>

                            <div class="space-y-3 text-gray-600">
                                <div class="flex items-center p-2 rounded-lg group-hover:bg-indigo-50 transition-colors">
                                    <span class="text-xl mr-3">📞</span>
                                    <span class="font-medium">{{ $contact->phone }}</span>
                                </div>
                                @if($contact->email)
                                <div class="flex items-center p-2 rounded-lg group-hover:bg-indigo-50 transition-colors">
                                    <span class="text-xl mr-3">✉️</span>
                                    <span class="font-medium text-sm">{{ $contact->email }}</span>
                                </div>
                                @endif
                            </div>

                            <div class="mt-8 flex justify-between items-center border-t pt-4">
                                <a href="{{ route('contacts.edit', $contact) }}" class="text-indigo-600 hover:text-indigo-900 font-bold text-sm transition-all hover:underline">
                                    Editar Contato
                                </a>
                                <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf @method('DELETE')
                                    <button class="w-10 h-10 flex items-center justify-center rounded-full text-red-500 hover:bg-red-100 transition-all transform hover:rotate-12">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-3xl p-12 text-center shadow-sm border-2 border-dashed border-gray-200">
                        <div class="text-6xl mb-4 text-gray-300">📭</div>
                        <h3 class="text-xl font-bold text-gray-700">Sua agenda está vazia</h3>
                        <p class="text-gray-500 mt-2">Comece adicionando seu primeiro contato clicando no botão acima.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>