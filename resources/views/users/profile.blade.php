@extends('layouts.app')

@section('title', 'Profil - SURATIN')

@section('content')
<div class="mx-auto max-w-3xl">
    <div class="relative overflow-hidden rounded-[28px] border border-pink-100 bg-white/90 p-8 shadow-[0_34px_70px_-48px_rgba(11,94,215,0.35)]">
        <div class="pointer-events-none absolute -left-10 -top-16 h-48 w-48 rounded-full bg-pink-500/20 blur-2xl"></div>
        <div class="pointer-events-none absolute right-6 top-10 h-32 w-32 rounded-full bg-fuchsia-500/20 blur-2xl"></div>
        <div class="pointer-events-none absolute bottom-8 right-20 h-24 w-24 rounded-full bg-rose-500/10 blur-2xl"></div>

        <div class="relative z-10 flex flex-col gap-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div>
                    <div class="text-xs font-semibold uppercase tracking-[0.28em] text-pink-600">Profil Akun</div>
                    <h1 class="mt-2 text-2xl font-semibold text-slate-900">{{ $user->username }}</h1>
                    <p class="mt-1 text-sm text-slate-500">Identitas akun dan divisi aktif.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-full border border-pink-200 bg-white p-2.5 text-pink-700 shadow-sm transition hover:bg-pink-50" aria-label="Kembali ke Dashboard" title="Kembali ke Dashboard">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M15 6l-6 6 6 6"></path>
                    </svg>
                </a>
            </div>

            <div class="flex flex-wrap items-center gap-4 rounded-2xl border border-pink-200/60 bg-black/35 px-4 py-3 text-pink-100">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-pink-500/25 text-base font-semibold">
                    {{ strtoupper(substr($user->username ?? 'U', 0, 1)) }}
                </span>
                <div class="min-w-[160px]">
                    <div class="text-xs uppercase tracking-wider text-pink-200">Role</div>
                    <div class="text-sm font-semibold">{{ $user->role }}</div>
                </div>
                <div class="h-8 w-px bg-pink-200/30"></div>
                <div class="min-w-[200px]">
                    <div class="text-xs uppercase tracking-wider text-pink-200">Divisi</div>
                    <div class="text-sm font-semibold">{{ $user->division ?? '-' }}</div>
                </div>
            </div>

            <div class="rounded-2xl border border-pink-100 bg-black/25 p-5">
                <div class="space-y-3 text-sm text-slate-500">
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="w-24 text-xs uppercase tracking-widest text-pink-600">Username</div>
                        <div class="text-base font-semibold text-slate-900">{{ $user->username }}</div>
                    </div>
                    <div class="h-px bg-pink-200/30"></div>
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="w-24 text-xs uppercase tracking-widest text-pink-600">Email</div>
                        <div class="text-base font-semibold text-slate-900">{{ $user->email }}</div>
                    </div>
                    <div class="h-px bg-pink-200/30"></div>
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="w-24 text-xs uppercase tracking-widest text-pink-600">Divisi</div>
                        <div class="text-base font-semibold text-slate-900">{{ $user->division ?? '-' }}</div>
                    </div>
                    <div class="h-px bg-pink-200/30"></div>
                    <div class="flex flex-wrap items-center gap-3">
                        <div class="w-24 text-xs uppercase tracking-widest text-pink-600">Role</div>
                        <div class="text-base font-semibold text-slate-900">{{ $user->role }}</div>
                    </div>
                </div>
            </div>

            @if (auth()->user()->role === 'User')
                <div class="flex justify-end">
                    <a href="{{ route('users.create') }}" class="inline-flex items-center gap-2 rounded-full bg-pink-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-pink-700">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M20 8v6"></path>
                            <path d="M23 11h-6"></path>
                        </svg>
                        Tambah Akun
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
