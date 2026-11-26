<x-guest-layout>
    <!-- Título e Boas-vindas -->
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-gray-800">Recuperar Senha</h2>
        <p class="text-gray-500 font-medium">Enviaremos um link para você redefinir sua senha</p>
    </div>

    <div class="mb-6 text-sm text-gray-600 leading-relaxed">
        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link de redefinição que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status (Mensagem de sucesso quando o e-mail é enviado) -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="relative">
            <label for="email" class="text-xs font-bold uppercase text-gray-400 ml-2">Seu E-mail</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                   placeholder="seu@email.com"
                   class="block mt-1 w-full rounded-2xl border-gray-100 bg-gray-50 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition-all py-3" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-10">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-lg transform transition-all duration-300 hover:scale-105 active:scale-95 uppercase tracking-widest">
                Enviar Link de Recuperação
            </button>
        </div>

        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <a href="{{ route('login') }}" class="inline-block text-indigo-600 font-black hover:underline uppercase text-xs tracking-tighter">
                Voltar para o Login
            </a>
        </div>
    </form>
</x-guest-layout>