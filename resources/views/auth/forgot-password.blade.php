<x-guest-layout>
    <div class="mb-6 text-sm text-slate-400 leading-relaxed">
        Lupa kata sandi? Masukkan alamat email Anda dan kami akan mengirimkan
        tautan untuk mengatur ulang kata sandi Anda.
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
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
                placeholder="nama@domain.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        
        <div class="pt-2">
            <button
                type="submit"
                class="group relative w-full inline-flex items-center justify-center rounded-xl px-4 py-3
                       bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700
                       text-white font-semibold shadow-lg shadow-indigo-600/20
                       transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-0"
            >
                <span class="absolute inset-0 rounded-xl bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                <span class="relative">KIRIM TAUTAN RESET KATA SANDI</span>
            </button>

        <div class="pt-2">
            <button
                type="submit"
                class="group relative w-full inline-flex items-center justify-center rounded-xl px-4 py-3
                       bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700
                       text-white font-semibold shadow-lg shadow-indigo-600/20
                       transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-0"
            >
                <span class="absolute inset-0 rounded-xl bg-white/10 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                <span class="relative">KIRIM TAUTAN RESET KATA SANDI</span>
            </button>

            <div class="mt-4 text-center">
                <a
                    href="{{ route('login') }}"
                    class="text-sm text-indigo-300 hover:text-indigo-200 underline underline-offset-4"
                >
                    Kembali ke halaman masuk
                </a>
            </div>
        </div>
    </form>
</x-guest-layout>
