<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function create(Request $request) {
        $gambar = $request->file('gambar')->store('gambar_buku');
        $buku = Buku::create([
            'judul' => $request->get('judul'),
            'deskripsi' => $request->get('deskripsi'),
            'gambar' => $gambar,
            'harga' => $request->get('harga'),
            'stok' => $request->get('stok'),
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Berhasil membuat buku',
            'buku' => $buku
        ],200); 
    }

    public function index() {
        $buku = Buku::all();
        
        return response()->json([
            'status' => 1,
            'message' => 'Daftar buku',
            'buku' => $buku
        ],200);
    }

    public function detail($id) {
        $buku = Buku::findOrFail($id);

        return response()->json([
            'status' => 1,
            'mesaage' => 'Detail buku',
            'buku' => $buku
        ], 200);
    }

    public function update(Request $request) {
        //mendapatkan id untuk mencari buku dimana
        //yang akan diupdate
        $id = $request->get('id');
        //mengambil buku dari database
        $buku = Buku::findOrFail($id);
        //Ngupdate buku didatabase
        $buku->update($request->all());
        //Ngupdate variabel $buku untuk berubah
        //sesuai dengan yang diupdate
        $buku->refresh();
        return response()->json([
            'status' => 1,
            'message' => 'Buku berhasil diedit',
            'buku' => $buku
        ], 200);
    }

    public function delete(Request $request) {
        $id = $request->get('id');
        $buku = Buku::findOrFail($id);
        $buku->delete();

        return response()->json([
            'status' => 1,
            'message' => 'Buku berhasil dihapus'
        ], 200);
    }
}
