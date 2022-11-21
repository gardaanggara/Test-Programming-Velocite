<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('Kasir.update', $editdata->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label>Nama Barang</label>
                          <input type="text" class="form-control" value="{{$editdata->nama_barang}}" name="nama_barang">
                          <small class="form-text text-muted">Ubah data sesuai data terbaru</small>
                        </div>
                        <div class="form-group">
                          <label >Harga Satuan</label>
                          <input type="text" class="form-control" value="{{$editdata->harga_satuan}}" name="harga_satuan">
                          <small class="form-text text-muted">Ubah data sesuai data terbaru</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
