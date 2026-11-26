<x-guest-layout>
    <!-- Título e Boas-vindas -->
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-gray-800">Bem-vindo!</h2>
        <p class="text-gray-500 font-medium">Acesse sua agenda eletrônica</p>
    </div>

    <!-- Mensagem de erro (Conta Inativa) -->
    @if (session('error'))
        <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 text-sm font-bold rounded-r-xl animate-bounce">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="relative">
            <label for="email" class="text-xs font-bold uppercase text-gray-400 ml-2">E-mail</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                   class="block mt-1 w-full rounded-2xl border-gray-100 bg-gray-50 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition-all py-3" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <label for="password" class="text-xs font-bold uppercase text-gray-400 ml-2">Senha</label>
            <input id="password" type="password" name="password" required
                   class="block mt-1 w-full rounded-2xl border-gray-100 bg-gray-50 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition-all py-3" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-6 flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-lg border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600 font-medium">Lembrar-me</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-900 font-bold transition-colors" href="{{ route('password.request') }}">
                    Esqueceu a senha?
                </a>
            @endif
        </div>

        <div class="mt-10">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-lg transform transition-all duration-300 hover:scale-105 active:scale-95 uppercase tracking-widest">
                Entrar no Sistema
            </button>
        </div>

        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <p class="text-gray-500 text-sm">Não tem uma conta?</p>
            <a href="{{ route('register') }}" class="inline-block mt-2 text-indigo-600 font-black hover:underline uppercase text-xs tracking-tighter">
                Criar conta agora
            </a>
        </div>
    </form>
</x-guest-layout>