<x-guest-layout>
    <!-- Título e Boas-vindas -->
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-gray-800">Crie sua Conta</h2>
        <p class="text-gray-500 font-medium">Comece a organizar sua agenda hoje</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="relative">
            <label for="name" class="text-xs font-bold uppercase text-gray-400 ml-2">Nome Completo</label>
            <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                   placeholder="Ex: João Silva"
                   class="block mt-1 w-full rounded-2xl border-gray-100 bg-gray-50 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition-all py-3" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-6 relative">
            <label for="email" class="text-xs font-bold uppercase text-gray-400 ml-2">E-mail</label>
            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                   placeholder="seu@email.com"
                   class="block mt-1 w-full rounded-2xl border-gray-100 bg-gray-50 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition-all py-3" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6 relative">
            <label for="password" class="text-xs font-bold uppercase text-gray-400 ml-2">Senha</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   placeholder="••••••••"
                   class="block mt-1 w-full rounded-2xl border-gray-100 bg-gray-50 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition-all py-3" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-6 relative">
            <label for="password_confirmation" class="text-xs font-bold uppercase text-gray-400 ml-2">Confirmar Senha</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   placeholder="••••••••"
                   class="block mt-1 w-full rounded-2xl border-gray-100 bg-gray-50 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 transition-all py-3" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-10">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-black py-4 rounded-2xl shadow-lg transform transition-all duration-300 hover:scale-105 active:scale-95 uppercase tracking-widest">
                Finalizar Cadastro
            </button>
        </div>

        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <p class="text-gray-500 text-sm">Já possui uma conta?</p>
            <a href="{{ route('login') }}" class="inline-block mt-2 text-indigo-600 font-black hover:underline uppercase text-xs tracking-tighter">
                Fazer Login
            </a>
        </div>
    </form>
</x-guest-layout>