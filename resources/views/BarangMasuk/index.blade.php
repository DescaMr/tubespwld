<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight text-grey">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-blue-600 p-4 rounded-lg">
                        <h2 class="text-3xl font-semibold text-white mb-4">Barang Masuk</h2>
                        <x-primary-button tag="a" href="{{ route('BarangMasuk.create') }}" class="bg-green-500 hover:bg-green-600 text-white">
                            Add
                        </x-primary-button>
                        <x-primary-button tag="a" href="{{ route('BarangMasuk.print') }}"  class="bg-green-500 hover:bg-green-600 text-white">Cetak Data Buku</x-primary-button>
                        <x-primary-button tag="a" href="{{ route('BarangMasuk.export') }}"  class="bg-green-500 hover:bg-green-600 text-white">Export Excel</x-primary-button>
                    </div>

                    <br /><br />
                    <x-table class="min-w-full bg-white border border-white-300 shadow-md rounded-lg overflow-hidden">
                        <x-slot name="header">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">No</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Tanggal Masuk</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Kode Barang Masuk</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Jumlah Barang Masuk</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-white bg-blue-600">Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach($barang_masuk as $barangmasuk)
                        <tr class="{{ $num % 2 === 0 ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $num++ }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $barangmasuk->tgl_masuk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $barangmasuk->kode_barang_masuk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-800">{{ $barangmasuk->jumlah_masuk }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <x-primary-button tag="a" href="{{ route('BarangMasuk.edit', $barangmasuk->id) }}" class="bg-yellow-500 hover:bg-yellow-400 text-white">
                                    Edit
                                </x-primary-button>
                                <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-barangmasuk-deletion')"
                                    x-on:click="$dispatch('set-action', '{{ route('BarangMasuk.destroy', $barangmasuk->id) }}')"
                                    class="bg-red-500 hover:bg-red-700 text-white">
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
