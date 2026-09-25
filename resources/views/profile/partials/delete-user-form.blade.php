<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-slate-100 font-sans">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-xs text-slate-400 font-sans">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen.') }}
        </p>
    </header>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-4 py-2 bg-rose-600 hover:bg-rose-500 text-white font-bold rounded-xl transition shadow-lg text-xs font-sans"
    >{{ __('Hapus Akun Saya') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-[#0f172a] border border-slate-800 rounded-2xl text-slate-100">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-slate-100 font-sans">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-2 text-xs text-slate-400 font-sans">
                {{ __('Setelah akun Anda dihapus, semua data akan hilang permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.') }}
            </p>

            <div class="mt-4">
                <label for="password" class="sr-only">{{ __('Kata Sandi') }}</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full sm:w-3/4 bg-[#080c14] border border-slate-800 rounded-xl p-3 text-slate-100 focus:outline-none focus:border-rose-500 text-xs font-sans"
                    placeholder="{{ __('Masukkan Kata Sandi Anda') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-rose-400 text-[11px]" />
            </div>

            <div class="mt-6 flex justify-end gap-3 font-sans text-xs">
                <button 
                    type="button" 
                    x-on:click="$dispatch('close')" 
                    class="px-4 py-2.5 bg-slate-800 text-slate-300 hover:bg-slate-700 rounded-xl font-bold"
                >
                    {{ __('Batal') }}
                </button>

                <button 
                    type="submit" 
                    class="px-4 py-2.5 bg-rose-600 hover:bg-rose-500 text-white font-bold rounded-xl transition shadow-lg"
                >
                    {{ __('Ya, Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>