<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data" class="max-w-xl">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updates -->

                        <div class="mb-4">
                            <x-input-label for="kode_barang" value="Kode Barang" />
                            <x-text-input id="kode_barang" type="text" name="kode_barang" class="mt-1 block w-full" value="{{ old('kode_barang', $barang->kode_barang) }}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_barang')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nama_barang" value="Nama Barang" />
                            <x-text-input id="nama_barang" type="text" name="nama_barang" class="mt-1 block w-full" value="{{ old('nama_barang', $barang->nama_barang) }}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('nama_barang')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jenis_barang_id" value="Jenis Barang" />
                            <x-select-input id="jenis" name="jenis_barang_id" class="mt-1 block w-full" required>
                                <option value="">--Pilih jenis barang--</option>
                                @foreach($JenisBarangs as $jenisBarang)
                                    <option value="{{ $jenisBarang->id }}" {{ ($jenisBarang->id == $barang->jenis_barang_id) ? 'selected' : '' }}>
                                        {{ $jenisBarang->nama }}
                                    </option>
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="harga" value="Harga" />
                            <x-text-input id="harga" type="number" name="harga" class="mt-1 block w-full" value="{{ old('harga', $barang->harga) }}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="cover" value="Halaman Sampul Depan" />
                            <x-file-input id="cover" name="cover" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('cover')" />
                        </div>

                        <x-secondary-button tag="a" href="{{ route('barang') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="false">Save Changes</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
