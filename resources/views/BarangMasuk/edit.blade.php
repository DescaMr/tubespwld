<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Data Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('BarangMasuk.update', $barangMasuk->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6 ">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updates -->

                        <div class="mb-4">
                            <x-input-label for="kode_barang_masuk" value="Kode Barang Masuk" />
                            <x-text-input id="kode_barang_masuk" type="text" name="kode_barang_masuk" class="mt-1 block w-full" value="{{ old('kode_barang_masuk', $barangMasuk->kode_barang_masuk) }}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_barang_masuk')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jumlah_masuk" value="Jumlah Masuk Barang" />
                            <x-text-input id="jumlah_masuk" type="text" name="jumlah_masuk" class="mt-1 block w-full" value="{{ old('jumlah_masuk', $barangMasuk->jumlah_masuk) }}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_masuk')" />
                        </div>

                        <x-secondary-button tag="a" href="{{ route('BarangMasuk') }}" class="bg-green-500 text-white">
                            {{ __('Cancel') }}
                        </x-secondary-button>
                        
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
