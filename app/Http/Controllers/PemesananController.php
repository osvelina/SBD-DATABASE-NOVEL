<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemesananController extends Controller
{
    public function index() {
        $datas = DB::select('select * from pemesanan');

        return view('pemesanan.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pemesanan.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pemesanan' => 'required',
            'id_pembeli' => 'required',
            'jumlah' => 'required',
            'id_novel' => 'required',
            'harga' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pemesanan(id_pemesanan, id_pembeli, jumlah, id_novel, harga) VALUES (:id_pemesanan, :id_pembeli, :jumlah, :id_novel, :harga)',
        [
            'id_pemesanan' => $request->id_pemesanan,
            'id_novel' => $request->id_novel,
            'jumlah' => $request->jumlah,
            'id_novel' => $request->id_novel,
            'harga' => $request->harga,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pemesanan')->where('id_pemesanan', $id)->first();

        return view('pemesanan.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pemesanan' => 'required',
            'id_pembeli' => 'required',
            'jumlah' => 'required',
            'id_novel' => 'required',
            'harga' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pemesanan SET id_pemesanan = :id_pemesanan, id_pembeli = :id_pembeli, jumlah = :jumlah, id_novel = :id_novel, harga = :harga WHERE id_pemesanan
         = :id',
        [
            'id' => $id,
            'id_pemesanan' => $request->id_pemesanan,
            'id_pembeli' => $request->id_pembeli,
            'jumlah' => $request->jumlah,
            'id_novel' => $request->id_novel,
            'harga' => $request->harga,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pemesanan WHERE id_pemesanan = :id_pemesanan', ['id_pemesanan' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Data pemesanan berhasil dihapus');
    }
    public function search(Request $request) {
        if($request->has('search')){
            $datas = DB::table('pembeli')->where('id_pembeli', 'LIKE', $request->search )->get();
        }else{
            $datas = DB::select('select * from pembeli');
        }
        return view('pembeli.index')->with('datas', $datas);
    }

}