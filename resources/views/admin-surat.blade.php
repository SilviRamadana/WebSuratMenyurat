@extends('layouts.app')

@section('title', 'Surat Semua Divisi - SURATIN')

@section('content')
<script src="https://unpkg.com/lucide@latest"></script>

@php
    $suratCount = collect($surats ?? [])->count();
@endphp

<div class="rounded-3xl border border-pink-100 bg-white/90 p-8 shadow-[0_30px_60px_-40px_rgba(236,72,153,0.45)]">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="text-sm font-semibold uppercase tracking-widest text-pink-600">Admin</div>
            <h1 class="mt-1 text-2xl font-semibold text-slate-900">Surat Semua Divisi</h1>
            <p class="mt-1 text-sm text-slate-500">Lihat surat masuk dan keluar seluruh divisi.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" aria-label="Kembali" title="Kembali" class="inline-flex items-center justify-center rounded-full border border-pink-200 bg-white p-2.5 text-pink-700 shadow-sm transition hover:bg-pink-50">
                <i data-lucide="arrow-left" class="h-5 w-5"></i>
            </a>
            <div class="inline-flex items-center gap-2 rounded-full border border-pink-200 bg-white px-4 py-2 text-sm font-semibold text-pink-700 shadow-sm">
                Total: {{ $suratCount }}
            </div>
        </div>
    </div>

    <div class="mb-5 flex flex-wrap gap-2">
        <a class="rounded-full px-4 py-2 text-sm font-semibold transition {{ ($tipe ?? 'masuk') === 'masuk' ? 'bg-pink-600 text-white shadow-sm' : 'border border-pink-200 bg-white text-pink-700 hover:bg-pink-50' }}" href="{{ route('admin.surat.index', ['tipe' => 'masuk']) }}">
            Surat Masuk
        </a>
        <a class="rounded-full px-4 py-2 text-sm font-semibold transition {{ ($tipe ?? 'masuk') === 'keluar' ? 'bg-pink-600 text-white shadow-sm' : 'border border-pink-200 bg-white text-pink-700 hover:bg-pink-50' }}" href="{{ route('admin.surat.index', ['tipe' => 'keluar']) }}">
            Surat Keluar
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-pink-100">
        <div class="overflow-auto">
            <table class="w-full text-sm">
                <thead class="bg-pink-50/60 text-left text-xs font-semibold uppercase tracking-wider text-slate-600">
                    <tr>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Nomor</th>
                        <th class="px-4 py-3">Pengirim</th>
                        <th class="px-4 py-3">Penerima</th>
                        <th class="px-4 py-3">CC</th>
                        <th class="px-4 py-3">Perihal</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-pink-100/70 bg-white">
                    @forelse ($surats ?? [] as $surat)
                        @php
                            $ccList = collect($surat->cc_divisions ?? [])->filter()->implode(', ');
                        @endphp
                        <tr>
                            <td class="px-4 py-3 text-slate-600">{{ optional($surat->sent_at)?->timezone(config('app.timezone'))->format('d M Y H:i') ?? '-' }}</td>
                            <td class="px-4 py-3 font-medium text-slate-800">{{ $surat->nomor_surat ?? '-' }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $surat->sender_division }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $surat->recipient_division }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ $ccList !== '' ? $ccList : '-' }}</td>
                            <td class="px-4 py-3 font-medium text-slate-800">{{ $surat->judul }}</td>
                            <td class="px-4 py-3 text-right">
                                <a class="text-sm font-semibold text-pink-700 hover:text-pink-800" href="{{ route('surat.show', $surat) }}">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-4 text-sm text-slate-500">Belum ada data surat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    lucide.createIcons();
</script>
@endsection
