
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
                    <x-primary-button tag="a" href="{{ route('BarangKeluar.create') }}">Add</x-primary-button>
                    <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Tanggal Keluar</th>
                                <th>Kode Barang Keluar</th>
                                <th>Jumlah keluar</th>
                                <th>Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num=1; @endphp
                        @foreach($barang_keluar as $barangkeluar)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $barangkeluar->tgl_keluar }}</td>
                            <td>{{ $barangkeluar->kode_barang_keluar }}</td>
                            <td>{{ $barangkeluar->jumlah_keluar }}</td>
                            <td>{{ $barangkeluar->tujuan }}</td>
                            <td>

                                <x-primary-button tag="a" href="{{route('BarangKeluar.edit', $barangkeluar->id)}}">Edit</x-primary-button>
                                <form action="{{ route('BarangKeluar.destroy', $barangkeluar->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this barang?')">Delete Barang</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
