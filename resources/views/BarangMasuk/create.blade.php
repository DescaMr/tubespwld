<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="post" action="{{ route('BarangMasuk.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="title" value="Tanggal Masuk" />
                            <x-text-input id="tgl_masuk" type="date" name="tgl_masuk" class="mt-1 block w-full" value="{{ old('tgl_masuk')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_barang_masuk')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="title" value="Kode Barang Masuk" />
                            <x-text-input id="nama_barang" type="text" name="kode_barang_masuk" class="mt-1 block w-full" value="{{ old('kode_barang_masuk')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_barang_masuk')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="quantity" value="Jumlah Masuk" />
                            <x-text-input id="jumlah_masuk" type="number" name="jumlah_masuk" class="mt-1 block w-full" value="{{old('jumlah_masuk')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_masuk')" />
                        </div>
                        <x-secondary-button tag="a" href="{{ route('BarangMasuk') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>