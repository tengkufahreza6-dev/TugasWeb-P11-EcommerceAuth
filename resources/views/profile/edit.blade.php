<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-slate-100 font-sans tracking-tight">
                    Pengaturan Profil Akun
                </h2>
                <p class="text-xs text-slate-400 font-sans mt-0.5">
                    Kelola informasi identitas, kata sandi, dan keamanan akun Anda.
                </p>
            </div>
            
            <a href="{{ route('products.index') }}" class="px-3.5 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 font-sans text-xs font-bold rounded-lg transition border border-slate-700 flex items-center gap-1.5 shadow-sm">
                <span>←</span>
                <span>Kembali ke Katalog</span>
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <!-- Informasi Profil -->
        <div class="p-6 sm:p-8 bg-[#0f172a] border border-slate-800 rounded-2xl shadow-xl">
            <div class="max-w-xl text-slate-200">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password -->
        <div class="p-6 sm:p-8 bg-[#0f172a] border border-slate-800 rounded-2xl shadow-xl">
            <div class="max-w-xl text-slate-200">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Hapus Akun -->
        <div class="p-6 sm:p-8 bg-[#0f172a] border border-slate-800 rounded-2xl shadow-xl">
            <div class="max-w-xl text-slate-200">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>