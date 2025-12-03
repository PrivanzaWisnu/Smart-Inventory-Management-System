<x-app-layout>
    <x-slot name="header">Edit Kategori</x-slot>

    <style>
        /* Breadcrumb */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .breadcrumb-link {
            color: var(--sf-text-muted);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .breadcrumb-link:hover {
            color: var(--sf-accent);
        }

        .breadcrumb-separator {
            color: var(--sf-text-muted);
        }

        .breadcrumb-current {
            color: var(--sf-text);
            font-weight: 600;
        }

        /* Form Card */
        .form-card {
            background: var(--sf-card);
            border: 1px solid var(--sf-border);
            border-radius: 16px;
            max-width: 600px;
        }

        .form-card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--sf-border);
        }

        .form-card-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--sf-text);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .form-card-title-icon {
            width: 40px;
            height: 40px;
            background: var(--sf-warning-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--sf-warning);
        }

        .form-card-body {
            padding: 1.5rem;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--sf-text);
            margin-bottom: 0.5rem;
        }

        .form-label-optional {
            font-weight: 400;
            color: var(--sf-text-muted);
            font-size: 0.8rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: var(--sf-primary);
            border: 1px solid var(--sf-border);
            border-radius: 10px;
            color: var(--sf-text);
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--sf-accent);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }

        .form-input::placeholder {
            color: var(--sf-text-muted);
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-error {
            color: var(--sf-danger);
            font-size: 0.8rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        /* Info Box */
        .info-box {
            background: var(--sf-secondary);
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-box-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            font-size: 0.85rem;
        }

        .info-box-row:not(:last-child) {
            border-bottom: 1px solid var(--sf-border);
        }

        .info-box-label {
            color: var(--sf-text-muted);
        }

        .info-box-value {
            color: var(--sf-text);
            font-weight: 500;
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 0.75rem;
            padding-top: 1rem;
            border-top: 1px solid var(--sf-border);
            margin-top: 1.5rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-secondary {
            background: var(--sf-secondary);
            border: 1px solid var(--sf-border);
            color: var(--sf-text-muted);
        }

        .btn-secondary:hover {
            background: var(--sf-border);
            color: var(--sf-text);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--sf-accent) 0%, #60a5fa 100%);
            border: none;
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.4);
        }
    </style>

    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="{{ route('kategori.index') }}" class="breadcrumb-link">Kategori</a>
        <span class="breadcrumb-separator">/</span>
        <span class="breadcrumb-current">Edit: {{ $kategori->nama_kategori }}</span>
    </nav>

    <!-- Form Card -->
    <div class="form-card">
        <div class="form-card-header">
            <h2 class="form-card-title">
                <div class="form-card-title-icon">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                Edit Kategori
            </h2>
        </div>

        <div class="form-card-body">
            <!-- Info Box -->
            <div class="info-box">
                <div class="info-box-row">
                    <span class="info-box-label">Dibuat pada</span>
                    <span class="info-box-value">{{ $kategori->created_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="info-box-row">
                    <span class="info-box-label">Terakhir diubah</span>
                    <span class="info-box-value">{{ $kategori->updated_at->format('d M Y, H:i') }}</span>
                </div>
            </div>

            <form action="{{ route('kategori.update', $kategori) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input
                        type="text"
                        id="nama_kategori"
                        name="nama_kategori"
                        class="form-input"
                        value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                        required
                        autofocus
                    >
                    @error('nama_kategori')
                        <p class="form-error">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="deskripsi" class="form-label">
                        Deskripsi <span class="form-label-optional">(Opsional)</span>
                    </label>
                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        class="form-input form-textarea"
                        placeholder="Deskripsi singkat tentang kategori ini..."
                    >{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="form-error">
                            <svg width="14" height="14" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
