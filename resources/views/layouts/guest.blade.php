<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Pipavav Customs Brokers Association') }} - Member Login</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-slate-800 antialiased bg-slate-50 min-h-screen relative selection:bg-orange-500 selection:text-white">
        <!-- Subtle maritime warm geometric backdrop -->
        <div class="fixed inset-0 pointer-events-none opacity-40 bg-[radial-gradient(#e2e8f0_1px,transparent_1px)] [background-size:16px_16px]"></div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center py-10 px-4 relative z-10">
            <!-- Brand Logo -->
            <div class="mb-5">
                <a href="{{ route('home') }}" class="inline-block transition-transform hover:scale-105 duration-200">
                    <div class="bg-white px-6 py-3.5 rounded-2xl shadow-sm border border-slate-200/80">
                        <x-application-logo />
                    </div>
                </a>
            </div>

            <!-- Auth Form Card -->
            <div class="w-full sm:max-w-md px-8 py-8 bg-white shadow-xl shadow-slate-200/70 overflow-hidden rounded-2xl border border-slate-200/80">
                {{ $slot }}
            </div>

            <!-- Footer Return Link -->
            <div class="mt-6 text-center text-xs text-slate-500">
                <a href="{{ route('home') }}" class="hover:text-slate-800 font-medium transition-colors duration-150 inline-flex items-center gap-1.5">
                    <i class="bi bi-arrow-left"></i> Return to PCBA Homepage
                </a>
                <div class="mt-2 text-slate-400">Pipavav Customs Brokers Association &bull; Established 2014</div>
            </div>
        </div>
    </body>
</html>
