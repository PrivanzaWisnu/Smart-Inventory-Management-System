<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nama --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}"
                                   class="shadow border rounded w-full py-2 px-3 text-gray-700
                                          @error('name') border-red-500 @enderror"
                                   required>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}"
                                   class="shadow border rounded w-full py-2 px-3 text-gray-700
                                          @error('email') border-red-500 @enderror"
                                   required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Role --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Role <span class="text-red-500">*</span>
                            </label>
                            <select name="role" 
                                    class="shadow border rounded w-full py-2 px-3 text-gray-700
                                           @error('role') border-red-500 @enderror"
                                    required>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="staff" {{ old('role', $user->role) == 'staff' ? 'selected' : '' }}>Staff Gudang</option>
                            </select>
                            @error('role')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <hr class="my-6">
                        <p class="text-sm text-gray-600 mb-4">
                            <strong>Note:</strong> Kosongkan password jika tidak ingin mengubahnya
                        </p>

                        {{-- Password (Optional) --}}
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Password Baru (Opsional)
                            </label>
                            <input type="password" 
                                   name="password" 
                                   class="shadow border rounded w-full py-2 px-3 text-gray-700
                                          @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">
                                Konfirmasi Password Baru
                            </label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   class="shadow border rounded w-full py-2 px-3 text-gray-700">
                        </div>

                        {{-- Tombol --}}
                        <div class="flex items-center justify-between">
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                            <a href="{{ route('users.index') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>