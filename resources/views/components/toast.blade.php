@php
    // Definimos qual mensagem e cor usar baseada na sessão
    $message = '';
    $bgColor = '';
    $icon = '';

    if (session('success')) {
        $message = session('success');
        $bgColor = 'bg-green-600';
        $icon = '✅';
    } elseif (session('update')) {
        $message = session('update');
        $bgColor = 'bg-yellow-500';
        $icon = '✏️';
    } elseif (session('delete')) {
        $message = session('delete');
        $bgColor = 'bg-red-600';
        $icon = '🗑️';
    } elseif (session('error')) {
        $message = session('error');
        $bgColor = 'bg-red-600';
        $icon = '⚠️';
    }
@endphp

@if ($message)
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed top-5 right-5 z-50 max-w-sm w-full shadow-2xl rounded-2xl pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden {{ $bgColor }}"
    >
        <div class="p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0 text-2xl">
                    {{ $icon }}
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-bold text-white">
                        {{ $message }}
                    </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button @click="show = false" class="rounded-md inline-flex text-white hover:text-gray-200 focus:outline-none">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Barra de Progresso Animada -->
        <div class="h-1 bg-white bg-opacity-40 animate-shrink"></div>
    </div>

    <style>
        @keyframes shrink { from { width: 100%; } to { width: 0%; } }
        .animate-shrink { animation: shrink 5s linear forwards; }</style>
@endif