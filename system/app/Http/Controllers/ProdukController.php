<?php

namespace App\Http\Controllers;

use App\Models\Product;

// use App\Models\Produk;

class ProdukController extends Controller
{
    function index()
    {
        $user = request()->user();
        $data['list_produk'] = Product::all();
        return view('produk.index', $data);
    }

    function create()
    {
        return view('produk.create');
    }

    function store()
    {
        $produk = new Product();
        $produk->id_user = request()->user()->id;
        $produk->nama = request('nama');
        $produk->stok = request('stok');
        $produk->foto = request('foto');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        $produk->handleUploadFoto();

        return redirect('admin/produk')->with('success', 'berhasil di tambahkan');
    }

    function show(Product $produk)
    {
        $data['produk'] = $produk;
        return view('produk.show', $data);
    }

    function edit(Product $produk)
    {
        $data['produk'] = $produk;
        return view('produk.edit', $data);
    }

    function update(Product $produk)
    {
        $produk->nama = request('nama');
        $produk->stok = request('stok');
        $produk->harga = request('harga');
        $produk->berat = request('berat');
        $produk->deskripsi = request('deskripsi');
        $produk->save();

        $produk->handleUploadFoto();

        return redirect('admin/produk')->with('success', 'berhasil di Edit');
    }

    function destroy(Product $produk)
    {
        $produk->handleDelete();
        $produk->delete();
        return redirect('admin/produk')->with('danger', 'berhasil di hapus');
    }


    function filter()
    {
        $nama = request('nama');
        $stok = explode(",", request('stok'));
        $data['harga_min'] = $harga_min = request('harga_min');
        $data['harga_max'] = $harga_max = request('harga_max');
        $data['list_produk'] = Product::where('nama', 'like', "%$nama%")->get();
        // $data['list_produk'] = Produk::whereIn('stok', $stok)->get();
        $data['list_produk'] = Product::whereBetween('harga', [$harga_min, $harga_max])->get();
        // $data['list_produk'] = Produk::where('stok', '<>', $stok)->get();
        // $data['list_produk'] = Produk::whereNotIn('stok', $stok)->get();
        // $data['list_produk'] = Produk::whereNotBetween('harga', [$harga_min, $harga_max])->get();
        // $data['list_produk'] = Produk::whereNotNull('stok')->get();
        // $data['list_produk'] = Produk::whereDate('created_at', ['2022-08-15', '2022-08-17'])->get();
        // $data['list_produk'] = Produk::whereBetween('harga', [$harga_min, $harga_max])->whereIn('stok', [10])->get();
        $data['nama'] = $nama;
        $data['stok'] = request('stok');



        return view('produk.index', $data);
    }
}
