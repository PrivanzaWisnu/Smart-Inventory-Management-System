<x-app-layout>
    <x-slot name="header">Kategori</x-slot>

    <style>
        /* Page Header */
        .page-header {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        @media (min-width: 640px) {
            .page-header {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }
        }

        .page-header-title {
            font-size: 0.95rem;
            color: var(--sf-text-muted);
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            background: linear-gradient(135deg, var(--sf-accent) 0%, #60a5fa 100%);
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert-success {
            background: var(--sf-success-light);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--sf-success);
        }

        .alert-error {
            background: var(--sf-danger-light);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--sf-danger);
        }

        .alert-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* Data Card */
        .data-card {
            background: var(--sf-card);
            border: 1px solid var(--sf-border);
            border-radius: 16px;
            overflow: hidden;
        }

        /* Table Styles */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead th {
            text-align: left;
            padding: 1rem 1.25rem;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--sf-text-muted);
            background: rgba(0, 0, 0, 0.2);
            border-bottom: 1px solid var(--sf-border);
        }

        .data-table tbody td {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--sf-border);
            font-size: 0.9rem;
            color: var(--sf-text);
        }

        .data-table tbody tr {
            transition: background 0.2s ease;
        }

        .data-table tbody tr:hover {
            background: rgba(59, 130, 246, 0.05);
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .table-number {
            color: var(--sf-text-muted);
            font-weight: 600;
            width: 50px;
        }

        .table-name {
            font-weight: 600;
        }

        .table-desc {
            color: var(--sf-text-muted);
            font-size: 0.85rem;
            max-width: 300px;
        }

        .table-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            padding: 0.35rem 0.75rem;
            background: var(--sf-accent-light);
            color: var(--sf-accent);
            font-size: 0.75rem;
            font-weight: 700;
            border-radius: 100px;
        }

        /* Action Buttons */
        .action-btns {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid var(--sf-border);
            background: transparent;
            color: var(--sf-text-muted);
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-action:hover {
            background: var(--sf-accent-light);
            color: var(--sf-accent);
            border-color: var(--sf-accent);
        }

        .btn-action.danger:hover {
            background: var(--sf-danger-light);
            color: var(--sf-danger);
            border-color: var(--sf-danger);
        }

        .btn-action svg {
            width: 16px;
            height: 16px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: var(--sf-secondary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-icon svg {
            width: 40px;
            height: 40px;
            color: var(--sf-text-muted);
        }

        .empty-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--sf-text);
            margin-bottom: 0.5rem;
        }

        .empty-desc {
            color: var(--sf-text-muted);
            margin-bottom: 1.5rem;
        }

        /* Responsive Table */
        @media (max-width: 768px) {
            .data-table thead {
                display: none;
            }

            .data-table tbody tr {
                display: block;
                padding: 1rem;
                border-bottom: 1px solid var(--sf-border);
            }

            .data-table tbody td {
                display: flex;
                justify-content: space-between;
                padding: 0.5rem 0;
                border: none;
            }

            .data-table tbody td::before {
                content: attr(data-label);
                font-weight: 600;
                color: var(--sf-text-muted);
                font-size: 0.75rem;
                text-transform: uppercase;
            }
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <p class="page-header-title">Kelola semua kategori barang di gudang Anda.</p>
        </div>
        @if(Auth::user()->isAdmin())
        <a href="{{ route('kategori.create') }}" class="btn-primary">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Kategori
        </a>
        @endif
    </div>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    <!-- Data Card -->
    <div class="data-card">
        @if($kategoris->count() > 0)
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                        <th>Jumlah Barang</th>
                        @if(Auth::user()->isAdmin())
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $index => $kategori)
                        <tr>
                            <td class="table-number" data-label="No">{{ $index + 1 }}</td>
                            <td class="table-name" data-label="Nama">{{ $kategori->nama_kategori }}</td>
                            <td class="table-desc" data-label="Deskripsi">{{ $kategori->deskripsi ?? '-' }}</td>
                            <td data-label="Jumlah Barang">
                                <span class="table-badge">
                                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                    {{ $kategori->barangs_count ?? 0 }} Barang
                                </span>
                            </td>
                            @if(Auth::user()->isAdmin())
                            <td data-label="Aksi">
                                <div class="action-btns">
                                    <a href="{{ route('kategori.edit', $kategori) }}" class="btn-action" title="Edit">
                                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus kategori {{ $kategori->nama_kategori }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action danger" title="Hapus">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <h3 class="empty-title">Belum ada kategori</h3>
                <p class="empty-desc">Mulai dengan membuat kategori pertama Anda.</p>
                @if(Auth::user()->isAdmin())
                <a href="{{ route('kategori.create') }}" class="btn-primary">
                    <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Kategori
                </a>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>
