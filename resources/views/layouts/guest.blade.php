<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>StockFlow</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
        <!-- Background decor -->
        <div class="fixed inset-0 -z-10 overflow-hidden">
            <div class="absolute -top-40 -left-40 h-96 w-96 rounded-full bg-indigo-600/20 blur-3xl"></div>
            <div class="absolute top-24 -right-40 h-[28rem] w-[28rem] rounded-full bg-cyan-500/10 blur-3xl"></div>
            <div class="absolute bottom-[-10rem] left-1/3 h-[32rem] w-[32rem] rounded-full bg-fuchsia-500/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(255,255,255,0.08),transparent_55%)]"></div>
        </div>

        <main class="min-h-screen flex items-center justify-center px-4 py-12">
            <div class="w-full max-w-md">
                <!-- Brand header -->
                <div class="text-center mb-6">
                    <a href="/" class="inline-flex items-center justify-center">
                        <div class="relative">
                            <div class="absolute inset-0 rounded-2xl bg-indigo-500/25 blur-xl"></div>
                            <div class="relative rounded-2xl bg-white/5 ring-1 ring-white/10 p-4">
                                <x-application-logo class="w-10 h-10 fill-current text-indigo-400" />
                            </div>
                        </div>
                    </a>

                    <h1 class="mt-4 text-2xl font-semibold tracking-tight">
                        Smart Inventory
                    </h1>
                    <p class="mt-1 text-sm text-slate-400">
                        Masuk untuk melanjutkan ke dashboard
                    </p>
                </div>

                <!-- Card -->
                <div
                    class="relative rounded-2xl bg-white/5 ring-1 ring-white/10 shadow-2xl backdrop-blur-xl p-7
                           motion-safe:animate-[fadeIn_600ms_ease-out]"
                >
                    <!-- subtle border glow -->
                    <div class="pointer-events-none absolute inset-0 rounded-2xl ring-1 ring-inset ring-indigo-500/10"></div>

                    {{ $slot }}

                    <div class="mt-6 text-center text-xs text-slate-500">
                        © {{ date('Y') }} Smart Inventory Management System
                    </div>
                </div>
            </div>
        </main>

        <style>
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
        </style>
    </body>
</html>
