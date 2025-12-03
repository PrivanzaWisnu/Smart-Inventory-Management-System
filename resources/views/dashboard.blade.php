<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <style>
        /* Dashboard Specific Styles */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 640px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .stats-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .stat-card {
            background: var(--sf-card);
            border: 1px solid var(--sf-border);
            border-radius: 16px;
            padding: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon.blue {
            background: var(--sf-accent-light);
            color: var(--sf-accent);
        }

        .stat-icon.green {
            background: var(--sf-success-light);
            color: var(--sf-success);
        }

        .stat-icon.purple {
            background: rgba(139, 92, 246, 0.1);
            color: #8b5cf6;
        }

        .stat-icon.orange {
            background: var(--sf-warning-light);
            color: var(--sf-warning);
        }

        .stat-icon svg {
            width: 26px;
            height: 26px;
        }

        .stat-content {
            flex: 1;
            min-width: 0;
        }

        .stat-label {
            font-size: 0.85rem;
            color: var(--sf-text-muted);
            margin-bottom: 0.25rem;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--sf-text);
            line-height: 1.2;
        }

        .stat-unit {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--sf-text-muted);
            margin-left: 0.25rem;
        }

        /* Content Grid */
        .content-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        @media (min-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Cards */
        .dashboard-card {
            background: var(--sf-card);
            border: 1px solid var(--sf-border);
            border-radius: 16px;
            overflow: hidden;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--sf-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--sf-text);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title-icon {
            width: 20px;
            height: 20px;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Alert List */
        .alert-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .alert-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.875rem 1rem;
            background: rgba(239, 68, 68, 0.05);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 10px;
            transition: all 0.2s ease;
        }

        .alert-item:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        .alert-item-name {
            font-weight: 600;
            color: var(--sf-text);
            font-size: 0.9rem;
        }

        .alert-item-badge {
            font-size: 0.75rem;
            font-weight: 700;
            padding: 0.35rem 0.75rem;
            background: var(--sf-danger);
            color: white;
            border-radius: 100px;
        }

        .alert-empty {
            text-align: center;
            padding: 2rem;
            color: var(--sf-success);
        }

        .alert-empty-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 0.75rem;
            background: var(--sf-success-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert-empty-icon svg {
            width: 24px;
            height: 24px;
            color: var(--sf-success);
        }

        /* Chart container */
        .chart-container {
            height: 280px;
            position: relative;
        }

        /* Transaction Table */
        .transaction-table {
            width: 100%;
        }

        .transaction-table thead th {
            text-align: left;
            padding: 0.875rem 1rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--sf-text-muted);
            border-bottom: 1px solid var(--sf-border);
            background: rgba(0, 0, 0, 0.2);
        }

        .transaction-table tbody td {
            padding: 1rem;
            border-bottom: 1px solid var(--sf-border);
            font-size: 0.875rem;
        }

        .transaction-table tbody tr:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        .transaction-table tbody tr:last-child td {
            border-bottom: none;
        }

        .transaction-product {
            font-weight: 600;
            color: var(--sf-text);
        }

        .transaction-date {
            color: var(--sf-text-muted);
        }

        .transaction-type {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .transaction-type.in {
            background: var(--sf-success-light);
            color: var(--sf-success);
        }

        .transaction-type.out {
            background: var(--sf-danger-light);
            color: var(--sf-danger);
        }

        .transaction-qty {
            font-weight: 600;
            color: var(--sf-text);
        }

        .transaction-user {
            color: var(--sf-text-muted);
            font-size: 0.8rem;
        }

        .empty-table {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--sf-text-muted);
        }
    </style>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon blue">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Produk</div>
                <div class="stat-value">{{ number_format($totalBarang) }}<span class="stat-unit">Unit</span></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon green">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Total Supplier</div>
                <div class="stat-value">{{ number_format($totalSupplier) }}<span class="stat-unit">Mitra</span></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon purple">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Kategori Aktif</div>
                <div class="stat-value">{{ number_format($totalKategori) }}<span class="stat-unit">Jenis</span></div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon orange">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <div class="stat-content">
                <div class="stat-label">Stok Menipis</div>
                <div class="stat-value">{{ $barangMenipis->count() }}<span class="stat-unit">Item</span></div>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Low Stock Alert -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg class="card-title-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--sf-danger);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                    Peringatan Stok Menipis
                </h3>
            </div>
            <div class="card-body">
                @if($barangMenipis->count() > 0)
                    <div class="alert-list">
                        @foreach($barangMenipis as $item)
                            <div class="alert-item">
                                <span class="alert-item-name">{{ $item->nama_barang }}</span>
                                <span class="alert-item-badge">Sisa: {{ $item->stok }} {{ $item->satuan }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert-empty">
                        <div class="alert-empty-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p style="font-weight: 600;">Semua Stok Aman!</p>
                        <p style="font-size: 0.85rem; color: var(--sf-text-muted);">Tidak ada barang dengan stok menipis.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Category Chart -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3 class="card-title">
                    <svg class="card-title-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--sf-accent);">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                    </svg>
                    Komposisi Stok per Kategori
                </h3>
            </div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="dashboard-card">
        <div class="card-header">
            <h3 class="card-title">
                <svg class="card-title-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--sf-success);">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Riwayat Transaksi Terakhir
            </h3>
        </div>
        @if($transaksiTerbaru->count() > 0)
            <table class="transaction-table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Tipe</th>
                        <th>Jumlah</th>
                        <th>Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksiTerbaru as $tr)
                        <tr>
                            <td class="transaction-date">{{ $tr->tanggal_transaksi->format('d M Y') }}</td>
                            <td class="transaction-product">{{ $tr->barang->nama_barang }}</td>
                            <td>
                                @if($tr->tipe_transaksi == 'masuk')
                                    <span class="transaction-type in">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                        </svg>
                                        Masuk
                                    </span>
                                @else
                                    <span class="transaction-type out">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 13l-5 5m0 0l-5-5m5 5V6"/>
                                        </svg>
                                        Keluar
                                    </span>
                                @endif
                            </td>
                            <td class="transaction-qty">{{ $tr->jumlah }}</td>
                            <td class="transaction-user">{{ $tr->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-table">
                <p>Belum ada transaksi.</p>
            </div>
        @endif
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('categoryChart');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Jumlah Jenis Barang',
                    data: {!! json_encode($chartValues) !!},
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(139, 92, 246, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(236, 72, 153, 0.8)',
                    ],
                    borderColor: [
                        'rgba(59, 130, 246, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(139, 92, 246, 1)',
                        'rgba(245, 158, 11, 1)',
                        'rgba(239, 68, 68, 1)',
                        'rgba(236, 72, 153, 1)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: '#94a3b8',
                            padding: 15,
                            font: {
                                family: "'Plus Jakarta Sans', sans-serif",
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
