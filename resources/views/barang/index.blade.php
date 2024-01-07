<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <x-primary-button tag="a" href="{{ route('barang.create') }}">Add</x-primary-button>
                    <br /><br />
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Jenis</th> 
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </x-slot>
                        @php $num = 1; @endphp
                        @foreach($data as $barang)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{ $barang['kode_barang'] }}</td>
                            <td>{{ $barang['nama_barang'] }}</td>
                            <td>{{ $barang['jenis'] }}</td> 
                            <td>{{ $barang['harga'] }}</td>
                            <td>
                                <img src="{{ asset('storage/cover_barang/'.$barang['cover']) }}" width="100px" />
                            </td>
                           
                           
                        </tr>
                        @endforeach
                    </x-table>
                  
                </div>
</x-app-layout>