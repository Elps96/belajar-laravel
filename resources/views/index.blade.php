@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
        @foreach($data_produk as $key => $produk)
        
        <div class="col-2 p-4" >
            <div class="thumbnail">
                <img src="/storage/{{ $produk->image }}" class="w-100">
                <div class="caption pb-2">
                    <h3 class="nama-produk"><a href="/show">{{$produk->name}}</a></h3>
                    <span>Rp. {{$produk->harga}}</span>
                </div>

            </div>
        </div>
        @endforeach


    </div>

    <!-- <div class="row pt-5">
        @foreach($data_produk as $key => $produk)
            <div class="col-4 pb-4"></div>
                <img src="/storage/{{ $produk->image }}" class="w-100">
            </div>
        @endforeach   
    </div> -->

</div>
@endsection
