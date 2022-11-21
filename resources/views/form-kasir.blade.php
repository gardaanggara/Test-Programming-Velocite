<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kasir Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form>
                        <h3>Kasir Pembayaran</h3>
                        <div class="form-group row align-items-center mb-4">
                          <div class="col">
                              <label>Pilih Barang</label>
                          </div>
                          <div class="col-12 col-md">
                              <select class="form-control" name="">
                                  <option>Pilih Barang</option>
                                  @foreach($ListDataBarang as $item)
                                      <option value="{{$item->id}}"
                                        data-id="{{$item->id}}"
                                        data-harga_satuan>{{$item->nama_barang}}</option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class="form-group row align-items-center mb-4">
                        <div class="col">
                            <label>Jumlah yang dibeli</label>
                        </div>
                        <div class="col-12 col-md">
                            <input type="text" required class="form-control" name="jumlah"/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-4">
                      <div class="col">
                          <label>Total Harga</label>
                      </div>
                      <div class="col-12 col-md">
                          <input type="text" required class="form-control mb-3" name="total_harga1" readonly/>
                          <input type="text" required class="form-control" name="total_harga" placeholder="Masukkan Jumlah Uang"/>                        
                      </div>
                    </div>
                    <div class="form-group text-right">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="container mt-5">
              <div class="card">
                  <div class="card-body">
                     <h2 class="mb-4">List Faktur Transaksi</h2>
                     <div class="table-responsive">
                         <table class="table table-bordered" id="kasir-datatable">
                             <thead>
                                 <tr>
                                     <th>No</th>
                                     <th>Nama</th>
                                     <th>Harga Satuan</th>
                                     <th>Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach($ListDataBarang as $key => $d)
                                     <tr>
                                         <td>{{$key+1 }}</td>
                                         <td>{{$d->nama_barang }}</td>
                                         <td>{{$d->harga_satuan }}</td>
                                         <td>
                                             <form action="{{ route('Kasir.destroy', $d->id) }}" method="post">
                                                 @csrf
                                                 @method('DELETE')
                                                 <a href="{{ route('Kasir.edit', $d->id) }}"
                                                     class="btn btn-success">Edit</a>
         
                                                 <button type="submit" class="btn btn-danger"
                                                     onclick="return confirm('Apakah anda yakin?')">
                                                     Hapus
                                                 </button>
                                             </form>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
      </div>
                      <div class="container mt-5">
                        <div class="card">
                            <div class="card-body">
                               <h2 class="mb-4">List Data Barang</h2>
                               <div class="table-responsive">
                                   <table class="table table-bordered" id="kasir1-datatable">
                                       <thead>
                                           <tr>
                                               <th>No</th>
                                               <th>Nama</th>
                                               <th>Harga Satuan</th>
                                               <th>Aksi</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           @foreach($ListDataBarang as $key => $d)
                                               <tr>
                                                   <td>{{$key+1 }}</td>
                                                   <td>{{$d->nama_barang }}</td>
                                                   <td>{{$d->harga_satuan }}</td>
                                                   <td>
                                                       <form action="{{ route('Barang.destroy', $d->id) }}" method="post">
                                                           @csrf
                                                           @method('DELETE')
                                                           <a href="{{ route('Barang.edit', $d->id) }}"
                                                               class="btn btn-success">Edit</a>
                   
                                                           <button type="submit" class="btn btn-danger"
                                                               onclick="return confirm('Apakah anda yakin?')">
                                                               Hapus
                                                           </button>
                                                       </form>
                                                   </td>
                                               </tr>
                                           @endforeach
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
    <x-slot name="script">
      <script type="text/javascript">
          $(document).ready(function () {
              $('#kasir-datatable').DataTable() 
          })  
          $(document).ready(function () {
              $('#kasir1-datatable').DataTable() 
          })  
      </script>
  
      <script type="text/javascript">
          jQuery(document).ready(function (){
              jQuery('select[name="kode"]').on('change', function(){
                  var id = jQuery(this).val();
  
                  sks = $(this).find(':selected').attr('data-sks');
                  $('#sks').val(sks);
                  
                  if(id)
                  {
                      jQuery.ajax({
                          url : 'dosen/nama_matkul/' +id,
                          type : "GET",
                          dataType : "json",
                          success:function(data)
                          {
                              console.log(data);
                              jQuery.each(data, function(key, value){
                                  $('input[name="mk"]').val(value);
                              })
                          }
                      })
                  }
              })
          })
      </script>
  </x-slot>
</x-app-layout>
