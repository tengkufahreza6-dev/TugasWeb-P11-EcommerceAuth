<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-slate-100 font-sans tracking-tight">
            Pengaturan Profil Akun
        </h2>
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