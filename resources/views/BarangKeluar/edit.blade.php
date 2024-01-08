<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Data Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('BarangKeluar.update', $barangkeluar->id) }}" enctype="multipart/form-data" class="mt-6 space-y-6 ">
                        @csrf
                        @meth8od('PATCH')
                    
                        <div class="mb-4">
                            <x-input-label for="jumlah_keluar" value="Jumlah Keluar" />
                            <x-text-input id="jumlah_keluar" type="number" name="jumlah_keluar" class="mt-1 block w-full" value="{{ $barangkeluar->jumlah_keluar }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_keluar')" />
                        </div>
                    
                        <div class="mb-4">
                            <x-input-label for="tujuan" value="Tujuan" />
                            <x-text-input id="tujuan" type="text" name="tujuan" class="mt-1 block w-full" value="{{ $barangkeluar->tujuan }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tujuan')" />
                        </div>
                    
                        <div class="mb-4">
                            <x-input-label for="tgl_keluar" value="Tanggal Keluar" />
                            <x-text-input id="tgl_keluar" type="date" name="tgl_keluar" class="mt-1 block w-full" value="{{ $barangkeluar->tgl_keluar }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('tgl_keluar')" />
                        </div>
                    
                        <div class="flex justify-between items-center">
                            <x-secondary-button tag="a" href="{{ route('BarangKeluar') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</x-secondary-button>
                            <x-primary-button name="save" value="true" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Save</x-primary-button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
