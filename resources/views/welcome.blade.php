<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SURATIN</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='64' height='64' viewBox='0 0 64 64'%3E%3Crect width='64' height='64' rx='14' fill='white'/%3E%3Crect x='6' y='6' width='52' height='52' rx='12' fill='%2316a34a'/%3E%3Cpath d='M16 22h32v20H16z' fill='white'/%3E%3Cpath d='M16 22l16 12 16-12' fill='none' stroke='%23ef4444' stroke-width='3'/%3E%3C/svg%3E">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
    <style>
        :root {
            --accent-primary: #16a34a;
            --accent-primary-dark: #15803d;
            --accent-soft: rgba(22, 163, 74, 0.12);
            --accent-success: #16a34a;
            --accent-success-soft: rgba(22, 163, 74, 0.12);
            --accent-danger: #ef4444;
            --accent-danger-soft: rgba(239, 68, 68, 0.12);
            --tri-red-soft: rgba(239, 68, 68, 0.08);
            --tri-green-soft: rgba(22, 163, 74, 0.08);
        }

        body {
            background:
                radial-gradient(circle at 10% 16%, rgba(22, 163, 74, 0.16) 0 60px, transparent 88px),
                radial-gradient(circle at 22% 40%, rgba(239, 68, 68, 0.12) 0 90px, transparent 126px),
                radial-gradient(circle at 38% 18%, rgba(22, 163, 74, 0.1) 0 120px, transparent 160px),
                radial-gradient(circle at 62% 12%, rgba(239, 68, 68, 0.14) 0 70px, transparent 108px),
                radial-gradient(circle at 80% 26%, rgba(22, 163, 74, 0.12) 0 110px, transparent 150px),
                radial-gradient(circle at 16% 72%, rgba(239, 68, 68, 0.1) 0 140px, transparent 185px),
                radial-gradient(circle at 44% 78%, rgba(22, 163, 74, 0.14) 0 80px, transparent 120px),
                radial-gradient(circle at 70% 70%, rgba(239, 68, 68, 0.12) 0 130px, transparent 178px),
                radial-gradient(circle at 86% 88%, rgba(22, 163, 74, 0.1) 0 95px, transparent 140px),
                radial-gradient(circle at 6% 88%, rgba(239, 68, 68, 0.08) 0 110px, transparent 160px),
                #ffffff;
        }

        .text-pink-600,
        .text-pink-700,
        .text-pink-800 {
            color: var(--accent-primary) !important;
        }

        .text-pink-100,
        .text-pink-200,
        .text-pink-100\/80,
        .text-pink-100\/70,
        .text-pink-100\/60,
        .text-pink-100\/45 {
            color: var(--accent-primary) !important;
        }

        .border-pink-100,
        .border-pink-100\/70,
        .border-pink-200,
        .border-pink-200\/60 {
            border-color: rgba(15, 23, 42, 0.12) !important;
        }

        .bg-pink-50,
        .bg-pink-50\/60,
        .bg-pink-100 {
            background-color: var(--accent-soft) !important;
        }

        .bg-pink-500\/20,
        .bg-pink-500\/15,
        .bg-pink-500\/30,
        .bg-pink-500\/45 {
            background-color: var(--accent-soft) !important;
        }

        .bg-pink-600 {
            background-color: var(--accent-primary) !important;
        }

        .hover\:bg-pink-700:hover {
            background-color: var(--accent-primary-dark) !important;
        }

        .text-rose-600,
        .text-rose-700,
        .text-rose-800 {
            color: var(--accent-danger) !important;
        }

        .bg-rose-50,
        .bg-rose-100,
        .bg-rose-200 {
            background-color: var(--accent-danger-soft) !important;
        }

        .bg-fuchsia-100,
        .bg-fuchsia-500\/20 {
            background-color: var(--accent-danger-soft) !important;
        }

        .text-fuchsia-600,
        .text-fuchsia-700 {
            color: var(--accent-danger) !important;
        }

        .shadow-pink-500\/30 {
            --tw-shadow-color: rgba(22, 163, 74, 0.35) !important;
        }

        .shadow-\[0_30px_60px_-40px_rgba\(236\,72\,153\,0\.45\)\] {
            box-shadow: 0 30px 60px -40px rgba(22, 163, 74, 0.28) !important;
        }

        .text-emerald-600,
        .text-emerald-700,
        .text-emerald-800 {
            color: var(--accent-success) !important;
        }

        .bg-emerald-50,
        .bg-emerald-100 {
            background-color: var(--accent-success-soft) !important;
        }

        .from-pink-500,
        .from-pink-600 {
            --tw-gradient-from: var(--accent-primary) !important;
        }

        .via-rose-500 {
            --tw-gradient-stops: var(--accent-primary), var(--accent-danger) !important;
        }

        .to-rose-500,
        .to-rose-600 {
            --tw-gradient-to: var(--accent-danger) !important;
        }

        .from-rose-50 {
            --tw-gradient-from: var(--tri-red-soft) !important;
        }

        .via-pink-50 {
            --tw-gradient-stops: var(--tri-red-soft), var(--tri-green-soft) !important;
        }

        .to-white {
            --tw-gradient-to: #ffffff !important;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-b from-rose-50 via-pink-50 to-white text-slate-800" style="font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif;">
    <header class="border-b border-pink-100/70 bg-white/80 backdrop-blur">
        <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-4 py-5 sm:px-6 lg:px-8">
            <div class="flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-pink-500 to-rose-500 text-xl font-bold text-white shadow-lg shadow-pink-500/30">
                    S
                </div>
                <div>
                    <div class="text-xl font-semibold tracking-wide">SURATIN</div>
                    <div class="text-xs font-medium text-pink-600">Sistem Surat Internal</div>
                </div>
            </div>
            @if (Route::has('login'))
                <a class="inline-flex items-center gap-2 rounded-full bg-pink-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-pink-700" href="{{ route('login') }}">
                    Masuk Dashboard
                </a>
            @endif
        </div>
    </header>

    <main class="mx-auto w-full max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr]">
            <div>
                <div class="inline-flex items-center gap-2 rounded-full border border-pink-200 bg-white px-3 py-1 text-xs font-semibold text-pink-700 shadow-sm">
                    Platform Surat Internal
                </div>
                <h1 class="mt-5 text-4xl font-semibold leading-tight text-slate-900 sm:text-5xl">
                    Kelola surat internal dengan cepat, rapi, dan aman.
                </h1>
                <p class="mt-4 text-base text-slate-600">
                    SURATIN membantu tim Anda mengirim, melacak, dan mengarsipkan surat antar divisi dalam satu
                    dashboard yang modern dan mudah digunakan.
                </p>
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    @if (Route::has('login'))
                        <a class="inline-flex items-center gap-2 rounded-full bg-pink-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-pink-700" href="{{ route('login') }}">
                            Mulai Sekarang
                        </a>
                    @endif
                    <div class="text-sm font-medium text-slate-500">Tema profesional dengan aksen biru, hijau, dan merah.</div>
                </div>
            </div>
            <div class="rounded-3xl border border-pink-100 bg-white/90 p-6 shadow-[0_30px_60px_-40px_rgba(37,99,235,0.28)]">
                <div class="rounded-2xl bg-gradient-to-br from-pink-500 via-rose-500 to-rose-600 p-6 text-white">
                    <div class="text-sm font-semibold uppercase tracking-widest text-pink-100">Dashboard Preview</div>
                    <div class="mt-3 text-2xl font-semibold">SURATIN</div>
                    <p class="mt-2 text-sm text-pink-100">
                        Pantau surat masuk, keluar, dan arsip dalam satu tempat.
                    </p>
                    <div class="mt-6 grid gap-3 sm:grid-cols-3">
                        <div class="rounded-2xl bg-white/15 p-3">
                            <div class="text-xl font-semibold">24</div>
                            <div class="text-xs text-pink-100">Masuk</div>
                        </div>
                        <div class="rounded-2xl bg-white/15 p-3">
                            <div class="text-xl font-semibold">18</div>
                            <div class="text-xs text-pink-100">Keluar</div>
                        </div>
                        <div class="rounded-2xl bg-white/15 p-3">
                            <div class="text-xl font-semibold">56</div>
                            <div class="text-xs text-pink-100">Arsip</div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 grid gap-4">
                    <div class="flex items-center gap-3 rounded-2xl border border-pink-100 bg-white p-4 shadow-sm">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-pink-100 text-pink-700">
                            <span class="text-sm font-semibold">SM</span>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-900">Surat masuk terbaru</div>
                            <div class="text-xs text-slate-500">Notifikasi real-time untuk setiap divisi.</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl border border-pink-100 bg-white p-4 shadow-sm">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-rose-100 text-rose-600">
                            <span class="text-sm font-semibold">PDF</span>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-900">Export dokumen</div>
                            <div class="text-xs text-slate-500">Unduh surat dalam format PDF resmi.</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl border border-pink-100 bg-white p-4 shadow-sm">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            <span class="text-sm font-semibold">AR</span>
                        </div>
                        <div>
                            <div class="text-sm font-semibold text-slate-900">Arsip terstruktur</div>
                            <div class="text-xs text-slate-500">Cari surat yang sudah selesai diproses.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
