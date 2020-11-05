@extends('layouts.admin')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Grade</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Grade</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between align-items-baseline">
                    <!-- SEARCH FORM -->
                  <form action="{{ url()->current() }}" class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                      <input class="form-control form-control-navbar" type="text" name="keyword" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#tambah-modal">
                    Tambah Produk
                    </button>

                    <!-- <a class="btn btn-primary " href="/produk/create">Tambah Grade</a> -->
                  

                  @if (session('status'))
                    <div class="alert alert-success">
                      {{session('status')}}
                    </div>
                  @endif
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 1%">No</th>
                      <th style="width: 20%">Produk</th>
                      <th style="width: 20%">Harga</th>
                      <th style="width: 20%">Berat</th>
                      <th style="width: 20%">Deskripsi</th>
                      <th style="width: 20%">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_produk as $produk)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{$produk->name}}</td>
                      <td>{{$produk->harga}}</td>
                      <td>{{$produk->berat}}</td>
                      <td>{{$produk->deskripsi}}</td>
                      
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="tambah-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id=modal-judul>Tambah Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
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
                        <!-- <div class="form-group">
                            <label for="image">File input</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id=image" name="image">
                                <label class="custom-file-label" for=image">{{ __('Post image') }}</label>
                                @error('image')
                                    <strong>{{ $message }}</strong>
                                    
                                @enderror
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              <div class="modal-footer">

              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection

@section('footer')
<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
@endsection