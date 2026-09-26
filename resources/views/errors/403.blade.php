@extends('errors.layout')

@section('code', '403')
@section('title', 'Akses Ditolak')
@section('badge_style', 'bg-rose-500/10 border border-rose-500/30 text-rose-400 shadow-rose-950/50')
@section('pill_style', 'text-rose-500 bg-rose-500/10 border border-rose-500/20')
@section('dot_style', 'bg-rose-500 animate-pulse')
@section('status_label', 'Security Middleware Interception')

@section('icon')
<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
</svg>
@endsection

@section('message')
{{ $exception->getMessage() ?: 'Anda tidak memiliki izin atau wewenang (role) yang sesuai untuk mengakses sumber daya ini.' }}
@endsection