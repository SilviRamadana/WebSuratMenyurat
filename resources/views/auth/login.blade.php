@extends('layouts.app')

@section('title', 'Login - SURATIN')

@section('content')
<div class="h-screen overflow-hidden">
    <div class="grid h-screen lg:grid-cols-[1.2fr_0.8fr]">
        <div class="flex items-center justify-center bg-emerald-50/20 px-6 py-10 sm:px-10 lg:px-16">
            <div class="max-w-xl text-center">
                <div class="flex flex-col items-center gap-4">
                    <div class="flex h-16 w-16 items-center justify-center rounded-3xl bg-pink-600 text-white shadow-lg">
                        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M4 6.5A2.5 2.5 0 0 1 6.5 4h11A2.5 2.5 0 0 1 20 6.5v9A2.5 2.5 0 0 1 17.5 18h-11A2.5 2.5 0 0 1 4 15.5v-9z"></path>
                            <path d="m5 7 7 5 7-5"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-3xl font-semibold text-slate-900">SURATIN</div>
                        <div class="text-sm font-medium text-pink-700">Sistem Surat Internal</div>
                    </div>
                </div>
                <p class="mt-4 text-base text-slate-600">
                    Kelola surat masuk dan keluar antar divisi dengan cepat, rapi, dan aman.
                </p>
            </div>
        </div>

        <div class="flex items-stretch">
            <div class="flex w-full flex-col justify-center border-l border-emerald-600/25 bg-emerald-600/45 px-8 py-10 shadow-[0_30px_60px_-40px_rgba(20,83,45,0.22)] sm:px-10 lg:px-12">
                <div class="mx-auto w-full max-w-md">
                    <div class="mb-6 text-center">
                        <h1 class="text-2xl font-semibold text-emerald-950">Masuk</h1>
                        <p class="mt-2 text-sm text-emerald-900/85">Gunakan email dan password akun Anda.</p>
                    </div>

                    <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
                        @csrf
                        <div>
                        <label for="email" class="text-sm font-semibold text-emerald-950">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="mt-2 w-full rounded-2xl border border-emerald-700/25 bg-white/82 px-4 py-3 text-sm text-emerald-950 shadow-sm outline-none transition placeholder:text-emerald-900/45 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-400/30">
                        @error('email')
                            <div class="mt-2 text-sm text-rose-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="text-sm font-semibold text-emerald-950">Password</label>
                        <input id="password" name="password" type="password" required
                            class="mt-2 w-full rounded-2xl border border-emerald-700/25 bg-white/82 px-4 py-3 text-sm text-emerald-950 shadow-sm outline-none transition placeholder:text-emerald-900/45 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-400/30">
                        @error('password')
                            <div class="mt-2 text-sm text-rose-700">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-rose-400/80 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-rose-500/90" type="submit">
                        Masuk
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
