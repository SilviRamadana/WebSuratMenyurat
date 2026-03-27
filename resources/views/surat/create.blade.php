@extends('layouts.app')

@section('title', 'Buat Surat - SURATIN')

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <style>
        .choices__inner,
        .choices__list--dropdown,
        .choices__list[aria-expanded] {
            border-color: rgba(0, 115, 178, 0.25) !important;
            border-radius: 1rem;
            box-shadow: 0 12px 26px -18px rgba(0, 115, 178, 0.25);
            background: #ffffff !important;
            color: #0f172a !important;
        }

        .choices__inner {
            padding: 0.55rem 0.75rem;
        }

        .choices__input,
        .choices__list--single .choices__item,
        .choices__list--dropdown .choices__item {
            background: transparent !important;
            color: #0f172a !important;
        }

        .choices__list--single .choices__item,
        .choices__list--multiple .choices__item,
        .choices__list--dropdown .choices__item,
        .choices__input {
            text-shadow: none !important;
        }

        .choices__list--dropdown .choices__item--selectable.is-highlighted {
            background: rgba(0, 115, 178, 0.08) !important;
        }

        .choices__list--multiple .choices__item {
            background: rgba(0, 115, 178, 0.12) !important;
            border: 1px solid rgba(0, 115, 178, 0.25) !important;
            color: #0073B2 !important;
        }

        .choices__placeholder {
            color: #6b7b8c !important;
            opacity: 1 !important;
        }

        input.bg-black\/40,
        select.bg-black\/40,
        textarea.bg-black\/40 {
            color: #0f172a !important;
        }

        #jenis option,
        #template_name option,
        #recipient_divisions option,
        #tembusan option {
            background: #ffffff;
            color: #0f172a;
        }

        .choices[data-type*="select-multiple"] .choices__button {
            border-left-color: rgba(0, 115, 178, 0.4);
        }

        .template-card {
            border-radius: 1.25rem;
            border: 1px solid rgba(0, 115, 178, 0.18);
            background: #f7fbff;
            box-shadow: 0 18px 36px -26px rgba(0, 115, 178, 0.25);
        }

        .template-preview {
            background: #ffffff;
            color: #0f172a;
            min-height: 360px;
            border-radius: 1rem;
            padding: 1.25rem;
            border: 1px solid rgba(0, 115, 178, 0.22);
            box-shadow: inset 0 0 0 1px rgba(0, 115, 178, 0.05);
            overflow: auto;
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.45;
        }

        .template-preview [contenteditable="true"]:focus {
            outline: 2px solid rgba(0, 115, 178, 0.45);
            border-radius: 6px;
        }

        .template-preview .editable {
            background: rgba(0, 115, 178, 0.08);
            padding: 0 6px;
            border-radius: 6px;
        }

        .template-preview .label {
            font-weight: bold;
            width: 90px;
            display: inline-block;
        }
    </style>
@endpush

@section('content')
<div class="mx-auto max-w-4xl rounded-3xl border border-pink-100 bg-white/90 p-8 shadow-[0_30px_60px_-40px_rgba(236,72,153,0.45)]">
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-900">Buat Surat</h1>
        <p class="mt-2 text-sm text-slate-500">Siapkan surat internal dan kirim ke satu atau beberapa divisi.</p>
    </div>

    <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data" class="grid gap-5 sm:grid-cols-2">
        @csrf
        <div class="sm:col-span-1">
            <label class="text-sm font-semibold text-slate-700">Pengirim</label>
            <div class="mt-2 rounded-2xl border border-pink-200/60 bg-black/40 px-4 py-3 text-sm font-medium text-pink-100">{{ $user->division }}</div>
        </div>

        <div class="sm:col-span-1">
            <label for="jenis" class="text-sm font-semibold text-slate-700">Jenis Surat</label>
            <select id="jenis" name="jenis" required
                class="mt-2 w-full rounded-2xl border border-pink-200/60 bg-black/40 px-4 py-3 text-sm text-pink-100 shadow-sm outline-none transition focus:border-pink-300 focus:ring-2 focus:ring-pink-300/40">
                @foreach ($jenisList as $jenis)
                    <option value="{{ $jenis }}" @selected(old('jenis') === $jenis)>{{ $jenis }}</option>
                @endforeach
            </select>
            @error('jenis')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <label for="template_name" class="text-sm font-semibold text-slate-700">Template Surat</label>
            <select id="template_name" name="template_name" required
                class="mt-2 w-full rounded-2xl border border-pink-200/60 bg-black/40 px-4 py-3 text-sm text-pink-100 shadow-sm outline-none transition focus:border-pink-300 focus:ring-2 focus:ring-pink-300/40">
                @foreach ($templateList as $template)
                    <option value="{{ $template }}" @selected(old('template_name') === $template)>{{ $template }}</option>
                @endforeach
            </select>
            <div class="mt-2 text-xs text-pink-100/70">Pilih format template yang akan digunakan.</div>
            @error('template_name')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <label for="judul" class="text-sm font-semibold text-slate-700">Judul</label>
            <input id="judul" name="judul" type="text" value="{{ old('judul') }}" required
                class="mt-2 w-full rounded-2xl border border-pink-200/60 bg-black/40 px-4 py-3 text-sm text-pink-100 shadow-sm outline-none transition placeholder:text-pink-200/45 focus:border-pink-300 focus:ring-2 focus:ring-pink-300/40">
            @error('judul')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <label class="text-sm font-semibold text-slate-700">Preview Template (ketik langsung)</label>
            <input id="isi" type="hidden" name="isi" value="{{ old('isi') }}">
            <div class="template-card mt-2 p-4">
                <div class="mb-3 flex flex-wrap items-center justify-between gap-3 text-xs text-pink-100/80">
                    <div>(Nomor akan terisi otomatis saat dikirim.)</div>
                    <div>Bagian berwarna biru muda bisa diketik.</div>
                </div>
                <div id="templatePreview" class="template-preview" contenteditable="true"></div>
            </div>
            @error('isi')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <label for="lampiran" class="text-sm font-semibold text-slate-700">Lampiran (opsional)</label>
            <input id="lampiran" name="lampiran" type="file"
                class="mt-2 w-full rounded-2xl border border-pink-200/60 bg-black/40 px-4 py-3 text-sm text-pink-100 file:mr-4 file:rounded-full file:border-0 file:bg-pink-500/30 file:px-3 file:py-1.5 file:text-sm file:font-semibold file:text-pink-100 hover:file:bg-pink-500/45">
            <div class="mt-2 text-xs text-pink-100/70">Lampiran mendukung JPG/JPEG/PDF. Preview isi lampiran di halaman berikut PDF surat hanya untuk JPG/JPEG.</div>
            @error('lampiran')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <label for="recipient_divisions" class="text-sm font-semibold text-slate-700">Divisi Tujuan</label>
            <select id="recipient_divisions" name="recipient_divisions[]" multiple required
                class="mt-2 w-full rounded-2xl border border-pink-200/60 bg-black/40 px-4 py-3 text-sm text-pink-100 shadow-sm outline-none transition focus:border-pink-300 focus:ring-2 focus:ring-pink-300/40">
                @foreach ($divisions as $division)
                    <option value="{{ $division }}" @selected(collect(old('recipient_divisions', []))->contains($division))>{{ $division }}</option>
                @endforeach
            </select>
            <div class="mt-2 text-xs text-pink-100/70">Anda bisa memilih lebih dari satu divisi.</div>
            @error('recipient_divisions')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
            @error('recipient_divisions.*')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <label for="tembusan" class="text-sm font-semibold text-slate-700">Tembusan</label>
            <select id="tembusan" name="tembusan[]" multiple
                class="mt-2 w-full rounded-2xl border border-pink-200/60 bg-black/40 px-4 py-3 text-sm text-pink-100 shadow-sm outline-none transition focus:border-pink-300 focus:ring-2 focus:ring-pink-300/40">
                @foreach ($divisions as $division)
                    <option value="{{ $division }}" @selected(collect(old('tembusan', []))->contains($division))>{{ $division }}</option>
                @endforeach
            </select>
            <div class="mt-2 text-xs text-pink-100/70">Pilih satu atau beberapa divisi tembusan.</div>
            @error('tembusan')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
            @error('tembusan.*')
                <div class="mt-2 text-sm text-rose-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <button class="inline-flex items-center gap-2 rounded-full bg-pink-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-pink-700" type="submit">
                Kirim
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        const recipientSelect = document.getElementById('recipient_divisions');
        if (recipientSelect) {
            new Choices(recipientSelect, {
                removeItemButton: true,
                placeholder: true,
                placeholderValue: 'Pilih divisi tujuan',
                searchPlaceholderValue: 'Cari divisi...',
                shouldSort: false,
            });
        }

        const tembusanSelect = document.getElementById('tembusan');
        if (tembusanSelect) {
            new Choices(tembusanSelect, {
                removeItemButton: true,
                placeholder: true,
                placeholderValue: 'Pilih divisi tembusan',
                searchPlaceholderValue: 'Cari divisi...',
                shouldSort: false,
            });
        }

        const jenisSelect = document.getElementById('jenis');
        if (jenisSelect) {
            new Choices(jenisSelect, {
                searchEnabled: false,
                itemSelectText: '',
                shouldSort: false,
                allowHTML: false,
            });
        }

        const templateSelect = document.getElementById('template_name');
        if (templateSelect) {
            new Choices(templateSelect, {
                searchEnabled: false,
                itemSelectText: '',
                shouldSort: false,
                allowHTML: false,
            });
        }

        const previewEl = document.getElementById('templatePreview');
        const isiInput = document.getElementById('isi');
        const judulInput = document.getElementById('judul');
        const lampiranInput = document.getElementById('lampiran');

        const templateMap = {
            'Formal Divisi': `
                <div data-doc-title style="text-align:center;font-weight:bold;font-size:14pt;margin-bottom:10px;">SURAT INTERNAL ANTAR DIVISI</div>
                <div>
                    <span class="label">Nomor</span>: <span data-nomor>Otomatis saat dikirim</span>
                </div>
                <div>
                    <span class="label">Lampiran</span>: <span data-lampiran>-</span>
                </div>
                <div>
                    <span class="label">Perihal</span>: <span data-judul>-</span>
                </div>
                <div style="margin:14px 0;">
                    <div>Kepada Yth.</div>
                    <div><strong>Manager <span class="editable">[Divisi Tujuan]</span></strong></div>
                    <div>Di Tempat</div>
                </div>
                <div>Dengan hormat,</div>
                <div class="editable" style="margin-top:6px;">[Ketik isi surat di sini...]</div>
                <div style="margin-top:14px;">Demikian surat ini kami sampaikan. Atas perhatian dan kerja samanya kami ucapkan terima kasih.</div>
                <div style="margin-top:18px;">
                    <div>Hormat kami,</div>
                    <div style="height:48px;"></div>
                    <div>(....................................)</div>
                    <div class="editable">[Nama/Divisi Pengirim]</div>
                </div>
            `,
            'Ringkas Operasional': `
                <div data-doc-title style="text-align:center;font-weight:bold;font-size:13pt;margin-bottom:8px;">SURAT INTERNAL</div>
                <div>
                    <span class="label">Nomor</span>: <span data-nomor>Otomatis saat dikirim</span>
                </div>
                <div>
                    <span class="label">Perihal</span>: <span data-judul>-</span>
                </div>
                <div style="margin:12px 0;">
                    <strong>Kepada:</strong> <span class="editable">[Divisi Tujuan]</span>
                </div>
                <div class="editable">[Isi singkat operasional di sini...]</div>
                <div style="margin-top:14px;"><strong>Catatan:</strong> <span class="editable">[Jika ada catatan tambahan]</span></div>
                <div style="margin-top:18px;">
                    <div>Hormat kami,</div>
                    <div style="height:40px;"></div>
                    <div class="editable">[Nama/Divisi Pengirim]</div>
                </div>
            `,
            'Memo Internal': `
                <div data-doc-title style="text-align:center;font-weight:bold;font-size:13pt;margin-bottom:8px;">MEMO INTERNAL</div>
                <div>
                    <span class="label">Nomor</span>: <span data-nomor>Otomatis saat dikirim</span>
                </div>
                <div>
                    <span class="label">Perihal</span>: <span data-judul>-</span>
                </div>
                <div style="margin:12px 0;">
                    <strong>Kepada:</strong> <span class="editable">[Divisi Tujuan]</span>
                </div>
                <div class="editable">[Isi memo internal di sini...]</div>
                <div style="margin-top:16px;">
                    <strong>Catatan:</strong> <span class="editable">[Opsional]</span>
                </div>
                <div style="margin-top:18px;">
                    <div>Hormat kami,</div>
                    <div style="height:40px;"></div>
                    <div class="editable">[Nama/Divisi Pengirim]</div>
                </div>
            `,
        };

        function buildDocTitle() {
            if (!jenisSelect) {
                return 'SURAT INTERNAL';
            }

            const jenis = (jenisSelect.value || '').trim();
            return jenis === '' ? 'SURAT INTERNAL' : jenis.toUpperCase();
        }

        function syncJenis() {
            if (!previewEl) {
                return;
            }

            const target = previewEl.querySelector('[data-doc-title]');
            if (target) {
                target.textContent = buildDocTitle();
            }
        }

        function syncJudul() {
            if (!previewEl || !judulInput) {
                return;
            }
            const target = previewEl.querySelector('[data-judul]');
            if (target) {
                target.textContent = judulInput.value || '-';
            }
        }

        function syncLampiran() {
            if (!previewEl || !lampiranInput) {
                return;
            }
            const target = previewEl.querySelector('[data-lampiran]');
            if (target) {
                const files = lampiranInput.files;
                target.textContent = files && files.length > 0 ? '1 berkas' : '-';
            }
        }

        function loadTemplate() {
            if (!previewEl || !templateSelect) {
                return;
            }
            const name = templateSelect.value || 'Formal Divisi';
            previewEl.innerHTML = templateMap[name] || templateMap['Formal Divisi'];
            syncJenis();
            syncJudul();
            syncLampiran();
        }

        if (previewEl && isiInput) {
            previewEl.addEventListener('input', function () {
                isiInput.value = previewEl.innerHTML;
            });
        }

        if (judulInput) {
            judulInput.addEventListener('input', syncJudul);
        }

        if (jenisSelect) {
            jenisSelect.addEventListener('change', syncJenis);
        }

        if (lampiranInput) {
            lampiranInput.addEventListener('change', syncLampiran);
        }

        if (templateSelect) {
            templateSelect.addEventListener('change', loadTemplate);
        }

        if (previewEl && isiInput && isiInput.value.trim() !== '') {
            previewEl.innerHTML = isiInput.value;
        } else {
            loadTemplate();
            if (previewEl && isiInput) {
                isiInput.value = previewEl.innerHTML;
            }
        }
    </script>
@endpush
