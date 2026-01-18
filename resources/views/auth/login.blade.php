<x-guest-layout>
    <div class="space-y-5">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" value="Email" class="text-slate-300" />
                <x-text-input
                    id="email"
                    class="mt-1 block w-full rounded-xl bg-slate-950/40 border-white/10 text-slate-100 placeholder:text-slate-500
                           focus:border-indigo-500 focus:ring-indigo-500"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="nama@domain.com"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between">
                    <x-input-label for="password" value="Kata Sandi" class="text-slate-300" />

                    @if (Route::has('password.request'))
                        <a
                            class="text-sm text-indigo-300 hover:text-indigo-200 underline underline-offset-4"
                            href="{{ route('password.request') }}"
                        >
                            Lupa kata sandi?
                        </a>
                    @endif
                </div>

                <x-text-input
                    id="password"
                    class="mt-1 block w-full rounded-xl bg-slate-950/40 border-white/10 text-slate-100 placeholder:text-slate-500
                           focus:border-indigo-500 focus:ring-indigo-500"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between">
                <label for="remember_me" class="inline-flex items-center gap-2">
                    <input
                        id="remember_me"
                        type="checkbox"
                        class="rounded border-white/10 bg-slate-950/40 text-indigo-500 shadow-sm
                               focus:ring-indigo-500 focus:ring-offset-0"
                        name="remember"
                    >
                    <span class="text-sm text-slate-300">Ingat saya</span>
                </label>
            </div>

            <!-- Button -->
            <div class="pt-2">
                <button
                    type="submit"
                    class="group relative w-full inline-flex items-center justify-center rounded-xl px-4 py-3
                           bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700
                           text-white font-semibold shadow-lg shadow-indigo-600/20
                           transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-0"
                >
                    <span class="absolute inset-0 rounded-xl bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                    <span class="relative">MASUK</span>
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
