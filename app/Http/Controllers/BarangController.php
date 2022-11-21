<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Master_barang;
use App\Models\Transaksi_pembelian;
use App\Models\Transaksi_pembelian_barang;
use Yajra\Datatables\Datatables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()-> role == 1) {

            $data = Master_barang::all();
            return view('form-kasir', ['ListDataBarang' => $data]);
    
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()-> role == 1) {

            $data = new transaksi_pembelian;
            $data->total_harga = $request->total_harga;

            $data->save();
            return view('form-kasir', ['ListDataBarang' => $data]);
    
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()-> role == 1) {

            $editdata = Master_barang::findOrFail($id);
            return view('form-edit-barang', ['editdata' => $editdata]);
    
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()-> role == 1) {

            $updatedata = Master_barang::findOrFail($id);
            $updatedata->nama_barang = $request->nama_barang;
            $updatedata->harga_satuan = $request->harga_satuan;
            
            $updatedata->update();
            return redirect()->route('Kasir.index');
    
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Master_barang::find($id);
        $hapus->delete();
        return back();
    }
}
