<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NovelController extends Controller
{
    public function index() {
        $datas = DB::select('select * from novel WHERE deleted_at is null ');

        return view('novel.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('novel.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_novel' => 'required',
            'pengarang' => 'required',
            'harga' => 'required',
            'penerbit' => 'required',
            'judul' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO novel(id_novel, pengarang, harga, penerbit, judul) VALUES (:id_novel, :pengarang, :harga, :penerbit, :judul)',
        [
            'id_novel' => $request->id_novel,
            'pengarang' => $request->pengarang,
            'harga' => $request->harga,
            'penerbit' => $request->penerbit,
            'judul' => $request->judul,
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

        return redirect()->route('novel.index')->with('success', 'Data novel berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('novel')->where('id_novel', $id)->first();

        return view('novel.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_novel' => 'required',
            'pengarang' => 'required',
            'harga' => 'required',
            'penerbit' => 'required',
            'judul' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE novel SET id_novel = :id_novel, pengarang = :pengarang, harga = :harga, penerbit = :penerbit, judul = :judul WHERE id_novel = :id',
        [
            'id' => $id,
            'id_novel' => $request->id_novel,
            'pengarang' => $request->pengarang,
            'harga' => $request->harga,
            'penerbit' => $request->penerbit,
            'judul' => $request->judul,
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

        return redirect()->route('novel.index')->with('success', 'Data novel berhasil diubah');
    }


    
public function search(Request $request) {
    if($request->has('search')){
        $datas = DB::table('novel')->where('id_novel', 'LIKE', $request->search )->get();
    }else{
        $datas = DB::select('select * from novel');
    }
    return view('novel.index')->with('datas', $datas);
}


public function softDeleted($id){
    DB::update('UPDATE novel SET deleted_at = now() WHERE id_novel = :id_novel',
    [
        'id_novel' => $id,
    ]);
    return redirect('novel')->with('success', 'Data novel berhasil dibuang');
}

public function trash() {
    $datas = DB::select('select * from novel WHERE deleted_at is not null ');

    return view('novel.trash')
        ->with('datas', $datas);
}

public function restore($id){
    DB::update('UPDATE novel SET deleted_at = null WHERE id_novel = :id_novel',
    [
        'id_novel' => $id,
    ]);
    return redirect('novel/trash')->with('success', 'Data novel berhasil di restore');
}

public function delete($id) {
    DB::delete('DELETE FROM novel WHERE id_novel = :id_novel', 
    [
        'id_novel' => $id
    ]);

    return redirect('novel/trash')->with('success', 'Data novel berhasil dihapus');
}


}



