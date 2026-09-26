@extends('errors.layout')

@section('code', '500')
@section('title', 'Kesalahan Server')
@section('badge_style', 'bg-rose-500/10 border border-rose-500/30 text-rose-400 shadow-rose-950/50')
@section('pill_style', 'text-rose-500 bg-rose-500/10 border border-rose-500/20')
@section('dot_style', 'bg-rose-500 animate-ping')
@section('status_label', 'Internal Server Status')

@section('icon')
<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
</svg>
@endsection

@section('message')
Terjadi kendala teknis internal pada sistem server aplikasi. Silakan hubungi administrator sistem atau kembali beberapa saat lagi.
@endsection