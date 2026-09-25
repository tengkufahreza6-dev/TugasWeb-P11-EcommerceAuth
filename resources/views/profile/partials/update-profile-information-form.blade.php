<section>
    <header>
        <h2 class="text-lg font-bold text-slate-100 font-sans">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-xs text-slate-400 font-sans">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-4 font-sans text-xs">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-slate-300 mb-1 font-bold">{{ __('Nama Lengkap') }}</label>
            <input id="name" name="name" type="text" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500 font-sans" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-rose-400 text-[11px]" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-slate-300 mb-1 font-bold">{{ __('Alamat Email') }}</label>
            <input id="email" name="email" type="email" class="w-full bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-emerald-500 font-sans" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2 text-rose-400 text-[11px]" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-xs mt-2 text-slate-400">
                        {{ __('Alamat email Anda belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-xs text-emerald-400 hover:text-emerald-300 rounded-md focus:outline-none font-bold">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-xs text-emerald-400">
                            {{ __('Tautan verifikasi baru telah dikirimkan ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-2">
            <button type="submit" class="px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 text-white font-bold rounded-xl transition shadow-lg shadow-emerald-950 font-sans">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
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