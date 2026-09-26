@extends('errors.layout')

@section('code', '419')
@section('title', 'Sesi Kedaluwarsa')
@section('badge_style', 'bg-blue-500/10 border border-blue-500/30 text-blue-400 shadow-blue-950/50')
@section('pill_style', 'text-blue-500 bg-blue-500/10 border border-blue-500/20')
@section('dot_style', 'bg-blue-500')
@section('status_label', 'CSRF Token Validation')

@section('icon')
<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
@endsection

@section('message')
Sesi keamanan formulir Anda telah habis masa berlakunya karena tidak ada aktivitas. Silakan muat ulang halaman dan coba kembali.
@endsection