@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-4xl">
    <h1 class="text-2xl font-bold mb-6">Edit Booking Goldenkost</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('goldenkost.update', $booking->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_penghuni" class="block font-semibold mb-1">Nama Penghuni</label>
            <input type="text" name="nama_penghuni" id="nama_penghuni" value="{{ old('nama_penghuni', $booking->nama_penghuni) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="no_ktp" class="block font-semibold mb-1">Nomor KTP/ID</label>
            <input type="text" name="no_ktp" id="no_ktp" value="{{ old('no_ktp', $booking->no_ktp) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="no_hp" class="block font-semibold mb-1">No HP</label>
            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $booking->no_hp) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="nomor_kamar" class="block font-semibold mb-1">Nomor Kamar</label>
            <input type="text" name="nomor_kamar" id="nomor_kamar" value="{{ old('nomor_kamar', $booking->nomor_kamar) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="tipe_kamar" class="block font-semibold mb-1">Tipe Kamar</label>
            <input type="text" name="tipe_kamar" id="tipe_kamar" value="{{ old('tipe_kamar', $booking->tipe_kamar) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="tanggal_check_in" class="block font-semibold mb-1">Tanggal Check-in</label>
            <input type="date" name="tanggal_check_in" id="tanggal_check_in" value="{{ old('tanggal_check_in', $booking->tanggal_check_in->format('Y-m-d')) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="tanggal_check_out" class="block font-semibold mb-1">Tanggal Check-out</label>
            <input type="date" name="tanggal_check_out" id="tanggal_check_out" value="{{ old('tanggal_check_out', $booking->tanggal_check_out->format('Y-m-d')) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="jenis_sewa" class="block font-semibold mb-1">Jenis Sewa</label>
            <select name="jenis_sewa" id="jenis_sewa" required class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="harian" {{ old('jenis_sewa', $booking->jenis_sewa) == 'harian' ? 'selected' : '' }}>Harian</option>
                <option value="mingguan" {{ old('jenis_sewa', $booking->jenis_sewa) == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                <option value="bulanan" {{ old('jenis_sewa', $booking->jenis_sewa) == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
            </select>
        </div>

        <div>
            <label for="tarif_per_unit" class="block font-semibold mb-1">Tarif per Unit</label>
            <input type="number" name="tarif_per_unit" id="tarif_per_unit" value="{{ old('tarif_per_unit', $booking->tarif_per_unit) }}" step="0.01" min="0" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="metode_pembayaran" class="block font-semibold mb-1">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" id="metode_pembayaran" value="{{ old('metode_pembayaran', $booking->metode_pembayaran) }}" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="status_pembayaran" class="block font-semibold mb-1">Status Pembayaran</label>
            <select name="status_pembayaran" id="status_pembayaran" required class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="bayar" {{ old('status_pembayaran', $booking->status_pembayaran) == 'bayar' ? 'selected' : '' }}>Bayar</option>
                <option value="belum_bayar" {{ old('status_pembayaran', $booking->status_pembayaran) == 'belum_bayar' ? 'selected' : '' }}>Belum Bayar</option>
            </select>
        </div>

        <div>
            <label for="catatan_staf" class="block font-semibold mb-1">Catatan Staf</label>
            <textarea name="catatan_staf" id="catatan_staf" rows="3" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('catatan_staf', $booking->catatan_staf) }}</textarea>
        </div>

        <div>
            <label for="lama_menginap" class="block font-semibold mb-1">Lama Menginap (hari)</label>
            <input type="number" name="lama_menginap" id="lama_menginap" value="{{ old('lama_menginap', $booking->lama_menginap) }}" min="1" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="total_bayar" class="block font-semibold mb-1">Total Bayar</label>
            <input type="number" name="total_bayar" id="total_bayar" value="{{ old('total_bayar', $booking->total_bayar) }}" step="0.01" min="0" required class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div class="pt-4">
            <button type="submit" class="bg-blue-600 text-white font-semibold px-6 py-2 rounded hover:bg-blue-700">Simpan</button>
            <a href="{{ route('goldenkost.index') }}" class="ml-4 text-gray-600 hover:underline">Batal</a>
        </div>
    </form>
</div>
@endsection
