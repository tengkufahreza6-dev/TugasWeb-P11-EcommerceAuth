<section>
    <header>
        <h2 class="text-lg font-bold text-slate-100 font-sans">
            {{ __('Perbarui Kata Sandi') }}
        </h2>

        <p class="mt-1 text-xs text-slate-400 font-sans">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-4 font-sans text-xs">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-slate-300 mb-1 font-bold">{{ __('Kata Sandi Saat Ini') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500 font-sans" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-rose-400 text-[11px]" />
        </div>

        <div>
            <label for="update_password_password" class="block text-slate-300 mb-1 font-bold">{{ __('Kata Sandi Baru') }}</label>
            <input id="update_password_password" name="password" type="password" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500 font-sans" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-rose-400 text-[11px]" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-slate-300 mb-1 font-bold">{{ __('Konfirmasi Kata Sandi Baru') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500 font-sans" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-rose-400 text-[11px]" />
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl transition shadow-lg shadow-emerald-950 font-sans">
                {{ __('Simpan Kata Sandi') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs text-emerald-400 font-mono"
                >✓ {{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>