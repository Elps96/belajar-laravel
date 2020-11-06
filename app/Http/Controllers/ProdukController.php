<?php

namespace App\Http\Controllers;

use App\Produk;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_produk = Produk::all();
        //dd($data_produk);
        return view('produk.index', compact('data_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'harga' => 'required',
            'berat' => 'required',
            'deskripsi' => 'required',
            'image' => ['required', 'image']
        ]);

        if (request('image'))
        {
            request('image');
            $imagePath = request('image')->store('produk', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000 , 1000);
            $image->save();
            // $imageArray = ['image'=> $imagePath];
        }
        
        Produk::create(array_merge(
            $data,
            ['image' => $imagePath]
        ));
        return redirect('/produk')->with('status', 'Produk Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('produk.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
