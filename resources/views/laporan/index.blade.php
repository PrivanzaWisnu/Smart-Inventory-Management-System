<x-app-layout>
    <x-slot name="header">Laporan & Export</x-slot>

    <style>
        /* Page Header */
        .page-header {
            margin-bottom: 2rem;
        }

        .page-header-desc {
            font-size: 0.95rem;
            color: var(--sf-text-muted);
            max-width: 600px;
        }

        /* Report Cards Grid */
        .report-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 768px) {
            .report-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1200px) {
            .report-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Report Card */
        .report-card {
            background: var(--sf-card);
            border: 1px solid var(--sf-border);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .report-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .report-card-header {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .report-card-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .report-card-icon.blue {
            background: var(--sf-accent-light);
            color: var(--sf-accent);
        }

        .report-card-icon.green {
            background: var(--sf-success-light);
            color: var(--sf-success);
        }

        .report-card-icon.purple {
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
        }

        .report-card-icon svg {
            width: 26px;
            height: 26px;
        }

        .report-card-info h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--sf-text);
            margin-bottom: 0.25rem;
        }

        .report-card-info span {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .report-card-info span.blue { color: var(--sf-accent); }
        .report-card-info span.green { color: var(--sf-success); }
        .report-card-info span.purple { color: #8b5cf6; }

        .report-card-desc {
            font-size: 0.875rem;
            color: var(--sf-text-muted);
            line-height: 1.6;
            margin-bottom: 1.25rem;
            flex: 1;
        }

        /* Form Elements */
        .report-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-row {
            display: grid;
            gap: 0.75rem;
        }

        .form-row.cols-2 {
            grid-template-columns: 1fr 1fr;
        }

        .form-group-sm label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--sf-text-muted);
            margin-bottom: 0.35rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .form-select,
        .form-date {
            width: 100%;
            padding: 0.65rem 0.875rem;
            background: var(--sf-primary);
            border: 1px solid var(--sf-border);
            border-radius: 8px;
            color: var(--sf-text);
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .form-select:focus,
        .form-date:focus {
            outline: none;
            border-color: var(--sf-accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        /* Download Button */
        .btn-download {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.875rem 1rem;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-download.blue {
            background: linear-gradient(135deg, var(--sf-accent) 0%, #60a5fa 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-download.green {
            background: linear-gradient(135deg, var(--sf-success) 0%, #34d399 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-download.purple {
            background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .btn-download:hover {
            transform: translateY(-2px);
        }

        .btn-download.blue:hover {
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        .btn-download.green:hover {
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .btn-download.purple:hover {
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.4);
        }

        .btn-hint {
            font-size: 0.75rem;
            color: var(--sf-text-muted);
            text-align: center;
            margin-top: 0.5rem;
        }

        /* Features List */
        .features-box {
            background: var(--sf-secondary);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .features-title {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--sf-text);
            margin-bottom: 0.75rem;
        }

        .features-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .features-list li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.8rem;
            color: var(--sf-text-muted);
            padding: 0.35rem 0;
        }

        .features-list li svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        .features-list li svg.purple { color: #8b5cf6; }

        /* Help Section */
        .help-section {
            background: var(--sf-card);
            border: 1px solid var(--sf-border);
            border-radius: 16px;
            padding: 1.5rem;
        }

        .help-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--sf-text);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .help-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        @media (min-width: 768px) {
            .help-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .help-item {
            display: flex;
            gap: 0.75rem;
        }

        .help-item-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .help-item-icon.blue {
            background: var(--sf-accent-light);
            color: var(--sf-accent);
        }

        .help-item-icon.green {
            background: var(--sf-success-light);
            color: var(--sf-success);
        }

        .help-item-icon.purple {
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
        }

        .help-item-content h4 {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--sf-text);
            margin-bottom: 0.25rem;
        }

        .help-item-content p {
            font-size: 0.8rem;
            color: var(--sf-text-muted);
            line-height: 1.5;
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <p class="page-header-desc">
            Akses dan unduh laporan inventaris lengkap untuk analisis bisnis yang lebih baik. Semua laporan tersedia dalam format PDF.
        </p>
    </div>

    <!-- Report Cards Grid -->
    <div class="report-grid">
        <!-- Stock Report Card -->
        <div class="report-card">
            <div class="report-card-header">
                <div class="report-card-icon blue">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div class="report-card-info">
                    <h3>Stok Barang</h3>
                    <span class="blue">Inventory Report</span>
                </div>
            </div>
            <p class="report-card-desc">
                Cetak daftar lengkap seluruh barang di gudang, termasuk detail status stok yang menipis atau aman.
            </p>
            <form action="{{ route('laporan.stok.pdf') }}" method="GET" target="_blank" class="report-form">
                <div class="form-group-sm">
                    <label>Filter Data</label>
                    <select name="stok_menipis" class="form-select">
                        <option value="0">📄 Semua Data Barang</option>
                        <option value="1">⚠️ Hanya Stok Menipis</option>
                    </select>
                </div>
                <button type="submit" class="btn-download blue">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Download PDF Stok
                </button>
                <p class="btn-hint">File akan diunduh dalam format PDF</p>
            </form>
        </div>

        <!-- Transaction Report Card -->
        <div class="report-card">
            <div class="report-card-header">
                <div class="report-card-icon green">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                </div>
                <div class="report-card-info">
                    <h3>Riwayat Transaksi</h3>
                    <span class="green">Transaction History</span>
                </div>
            </div>
            <p class="report-card-desc">
                Rekapitulasi lengkap arus barang masuk dan keluar berdasarkan rentang periode tanggal yang dipilih.
            </p>
            <form action="{{ route('laporan.transaksi.pdf') }}" method="GET" target="_blank" class="report-form">
                <div class="form-row cols-2">
                    <div class="form-group-sm">
                        <label>Dari Tanggal</label>
                        <input type="date" name="tanggal_mulai" class="form-date" value="{{ now()->startOfMonth()->format('Y-m-d') }}">
                    </div>
                    <div class="form-group-sm">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="tanggal_akhir" class="form-date" value="{{ now()->format('Y-m-d') }}">
                    </div>
                </div>
                <button type="submit" class="btn-download green">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Download PDF Transaksi
                </button>
                <p class="btn-hint">File akan diunduh dalam format PDF</p>
            </form>
        </div>

        <!-- Summary Report Card -->
        <div class="report-card">
            <div class="report-card-header">
                <div class="report-card-icon purple">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                </div>
                <div class="report-card-info">
                    <h3>Ringkasan Eksekutif</h3>
                    <span class="purple">Executive Summary</span>
                </div>
            </div>
            <p class="report-card-desc">
                Gambaran umum performa inventaris. Berisi total nilai aset, statistik kategori, dan ringkasan aktivitas.
            </p>
            <div class="features-box">
                <div class="features-title">Yang termasuk:</div>
                <ul class="features-list">
                    <li>
                        <svg class="purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Total nilai inventaris
                    </li>
                    <li>
                        <svg class="purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Statistik kategori barang
                    </li>
                    <li>
                        <svg class="purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Aktivitas terbaru
                    </li>
                </ul>
            </div>
            <a href="{{ route('laporan.ringkasan.pdf') }}" target="_blank" class="btn-download purple">
                <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Download Ringkasan
            </a>
            <p class="btn-hint">File akan diunduh dalam format PDF</p>
        </div>
    </div>

    <!-- Help Section -->
    <div class="help-section">
        <h3 class="help-title">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Panduan Penggunaan
        </h3>
        <div class="help-grid">
            <div class="help-item">
                <div class="help-item-icon blue">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="help-item-content">
                    <h4>Laporan Stok Barang</h4>
                    <p>Pilih filter untuk melihat semua barang atau hanya stok yang menipis</p>
                </div>
            </div>
            <div class="help-item">
                <div class="help-item-icon green">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="help-item-content">
                    <h4>Rentang Tanggal</h4>
                    <p>Pastikan memilih rentang tanggal yang valid untuk laporan transaksi</p>
                </div>
            </div>
            <div class="help-item">
                <div class="help-item-icon purple">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="help-item-content">
                    <h4>Format File</h4>
                    <p>Semua laporan akan diunduh dalam format PDF yang siap cetak</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
