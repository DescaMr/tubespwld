<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-600 leading-tight text-white">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-blue-600 p-4 rounded-lg">
                        <h2 class="text-3xl font-semibold text-white mb-4">Barang Keluar</h2>
                        <x-primary-button tag="a" href="{{ route('BarangMasuk.create') }}" class="bg-green-500 hover:bg-green-600 text-white">
                            Add
                        </x-primary-button>
                    </div>

                    <br /><br />
                    <x-table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg overflow-hidden">
                        <x-slot name="header">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">No</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Tanggal Keluar</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Kode Barang Keluar</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Jumlah Keluar</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Tujuan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($barang_keluar as $barangkeluar)
                        <tr class="{{ $num % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $num++ }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $barangkeluar->tgl_keluar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $barangkeluar->kode_barang_keluar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $barangkeluar->jumlah_keluar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $barangkeluar->tujuan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-primary-button tag="a" href="{{ route('BarangKeluar.edit', $barangkeluar->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white">
                                    Edit
                                </x-primary-button>
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-barangmasuk-deletion')"
                                    x-on:click="$dispatch('set-action', '{{ route('BarangKeluar.destroy', $barangkeluar->id) }}')"
                                    class="bg-red-500 hover:bg-red-700 text-white"
                                >
                                    Delete
                                </x-danger-button>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                    <x-modal name="confirm-barangmasuk-deletion" focusable maxWidth="xl">
                        <form method="post" x-bind:action="action" class="p-6">
                            @csrf
                            @method('delete')
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah anda yakin akan menghapus data?') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Setelah proses dilaksanakan. Data akan dihilangkan secara permanen.') }}
                            </p>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                                <x-danger-button class="ml-3">
                                    {{ __('Delete!!!') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
