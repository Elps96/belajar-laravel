@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="col md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Produk</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" method="post" action="/produk">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div> 
                    
                    <div class="form-group">
                        <label for="harga">harga</label>
                        <input type="harga" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Enter harga" name="harga" value="{{old('harga')}}">
                        @error('harga')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="berat">berat</label>
                        <input type="berat" class="form-control @error('berat') is-invalid @enderror" id="berat" placeholder="Enter berat" name="berat" value="{{old('berat')}}">
                        @error('berat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="deskripsi">deskripsi</label>
                        

                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" value="{{old('deskripsi')}}" class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        <!-- <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" value="{{old('deskripsi')}}"></textarea> -->
                        <!-- <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Enter deskripsi" deskripsi="deskripsi" value="{{old('deskripsi')}}"> -->
                        @error('deskripsi')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div> 
                    
                    <div class="form-group">
                        <label for="image" class=" col-form-label">{{ __('image') }}</label>
                        <input type="file", class="form-control-file" id="image" name="image">
                        
                        @error('image')
                        <strong>{{ $message }}</strong>
                        
                        @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>

            
@endsection