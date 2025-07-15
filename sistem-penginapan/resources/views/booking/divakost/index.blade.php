@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Booking Divakost</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('divakost.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Tambah Booking</a>

    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Nama Penghuni</th>
                <th class="py-2 px-4 border-b">Nomor KTP</th>
                <th class="py-2 px-4 border-b">No HP</th>
                <th class="py-2 px-4 border-b">Nomor Kamar</th>
                <th class="py-2 px-4 border-b">Tipe Kamar</th>
                <th class="py-2 px-4 border-b">Tanggal Check-in</th>
                <th class="py-2 px-4 border-b">Tanggal Check-out</th>
                <th class="py-2 px-4 border-b">Jenis Sewa</th>
                <th class="py-2 px-4 border-b">Tarif per Unit</th>
                <th class="py-2 px-4 border-b">Status Pembayaran</th>
                <th class="py-2 px-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td class="py-2 px-4 border-b">{{ $booking->nama_penghuni }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->no_ktp }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->no_hp }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->nomor_kamar }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->tipe_kamar }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->tanggal_check_in->format('d-m-Y') }}</td>
                <td class="py-2 px-4 border-b">{{ $booking->tanggal_check_out->format('d-m-Y') }}</td>
                <td class="py-2 px-4 border-b">{{ ucfirst($booking->jenis_sewa) }}</td>
                <td class="py-2 px-4 border-b">Rp {{ number_format($booking->tarif_per_unit, 0, ',', '.') }}</td>
                <td class="py-2 px-4 border-b">
                    @if($booking->status_pembayaran == 'bayar')
                        <span class="text-green-600 font-semibold">Lunas</span>
                    @else
                        <span class="text-red-600 font-semibold">Belum Bayar</span>
                    @endif
                </td>
                <td class="py-2 px-4 border-b">
                    <a href="{{ route('divakost.edit', $booking->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('divakost.destroy', $booking->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
