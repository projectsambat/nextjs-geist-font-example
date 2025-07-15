@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-6xl">
    <h1 class="text-3xl font-bold mb-6">Dashboard Penginapan</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-xl font-semibold mb-2">Total Occupancy</h2>
            <p class="text-4xl font-bold">{{ $totalOccupancy }}</p>
        </div>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-xl font-semibold mb-2">Total Pendapatan</h2>
            <p class="text-4xl font-bold">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-xl font-semibold mb-2">Tamu Belum Bayar (Greendoors)</h2>
            <ul class="list-disc pl-5 max-h-48 overflow-y-auto">
                @forelse($unpaidGuestsGreendoors as $guest)
                    <li>{{ $guest->nama_penghuni }} - {{ $guest->nomor_kamar }} ({{ $guest->total_bayar }})</li>
                @empty
                    <li>Tidak ada tamu belum bayar.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-xl font-semibold mb-2">Tamu Belum Bayar (Divakost)</h2>
            <ul class="list-disc pl-5 max-h-48 overflow-y-auto">
                @forelse($unpaidGuestsDivakost as $guest)
                    <li>{{ $guest->nama_penghuni }} - {{ $guest->nomor_kamar }} ({{ $guest->total_bayar }})</li>
                @empty
                    <li>Tidak ada tamu belum bayar.</li>
                @endforelse
            </ul>
        </div>
        <div class="bg-white shadow rounded p-6">
            <h2 class="text-xl font-semibold mb-2">Tamu Belum Bayar (Goldenkost)</h2>
            <ul class="list-disc pl-5 max-h-48 overflow-y-auto">
                @forelse($unpaidGuestsGoldenkost as $guest)
                    <li>{{ $guest->nama_penghuni }} - {{ $guest->nomor_kamar }} ({{ $guest->total_bayar }})</li>
                @empty
                    <li>Tidak ada tamu belum bayar.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
