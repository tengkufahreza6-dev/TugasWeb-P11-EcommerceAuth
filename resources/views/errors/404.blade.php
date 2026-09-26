@extends('errors.layout')

@section('code', '404')
@section('title', 'Tidak Ditemukan')
@section('badge_style', 'bg-amber-500/10 border border-amber-500/30 text-amber-400 shadow-amber-950/50')
@section('pill_style', 'text-amber-500 bg-amber-500/10 border border-amber-500/20')
@section('dot_style', 'bg-amber-500')
@section('status_label', 'Resource Query Status')

@section('icon')
<svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
</svg>
@endsection

@section('message')
Halaman, URL rute, atau data produk yang Anda cari tidak dapat ditemukan di database atau telah dipindahkan.
@endsection