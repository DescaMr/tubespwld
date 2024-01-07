
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('BarangKeluar.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="kode_barang_keluar" value="Kode Barang Keluar" />
                            <x-text-input id="kode_barang_keluar" type="text" name="kode_barang_keluar" class="mt-1 block w-full" value="{{ old('kode_barang_keluar')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('kode_barang_keluar')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jumlah_keluar" value="Jumlah Keluar" />
                            <x-text-input id="jumlah_keluar" type="number" name="jumlah_keluar" class="mt-1 block w-full" value="{{ old('jumlah_keluar')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_keluar')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tujuan" value="Tujuan" />
                            <x-text-input id="tujuan" type="text" name="tujuan" class="mt-1 block w-full" value="{{ old('tujuan')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="tgl_keluar" value="Tanggal Keluar" />
                            <x-text-input id="tgl_keluar" type="date" name="tgl_keluar" class="mt-1 block w-full" value="{{old('tgl_keluar')}}"
                                required />
                            <x-input-error class="mt-2" :messages="$errors->get('tgl_keluar')" />
                        </div>
   
                        <x-secondary-button tag="a" href="{{ route('BarangKeluar') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save_and_create" value="true">Save & Create Another</x-primary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
