<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master_barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data1 = Master_barang::create([
            'id' => 1,
            'nama_barang' => 'Sabun Batang',
            'harga_satuan' => 3000
        ]);
        $data2 = Master_barang::create([
            'id' => 2,
            'nama_barang' => 'Mi Instan',
            'harga_satuan' => 2000
        ]);
        $data3 = Master_barang::create([
            'id' => 3,
            'nama_barang' => 'Pensil',
            'harga_satuan' => 1000
        ]);
        $data4 = Master_barang::create([
            'id' => 4,
            'nama_barang' => 'Kopi Sachet',
            'harga_satuan' => 1500
        ]);
        $data5 = Master_barang::create([
            'id' => 5,
            'nama_barang' => 'Air Minum Galon',
            'harga_satuan' => 20000
        ]);
    }
}
