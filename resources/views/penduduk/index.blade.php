@extends('layouts.admin')

@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jumlah Penduduk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
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
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Penduduk</li>
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


                  <a class="btn btn-primary "  data-toggle="modal" data-target="#importExcel">IMPORT</a>
                  <a href="/penduduk/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

                <!-- Import Excel -->
                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                @endif
        
                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $sukses }}</strong>
                </div>
                @endif

                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="/penduduk/import_excel" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">
        
                                    {{ csrf_field() }}
        
                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>
        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="table_penduduk">
                  <thead>                  
                    <tr>
                      <th >No</th>
                      <th >provinsi</th>
                      <th >kabupaten</th>
                      <th >kecamatan</th>
                      <th >status</th>
                      <th >kode_pum</th>
                      <th >kelurahan</th>
                      <th >tanggal</th>
                      <th >tanggal_str</th>
                      <th >laki-laki</th>
                      <th >perempuan</th>
                      <th >jumlah penduduk</th>
                      <th >jumlah kk</th>
                      <th >kepadatan</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_penduduk as $penduduk)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{$penduduk->provinsi}}</td>
                      <td>{{$penduduk->kabupaten}}</td>
                      <td>{{$penduduk->kecamatan}}</td>
                      <td>{{$penduduk->status}}</td>
                      <td>{{$penduduk->kode_pum}}</td>
                      <td>{{$penduduk->kelurahan}}</td>
                      <td>{{$penduduk->tanggal}}</td>
                      <td>{{$penduduk->tanggal_str}}</td>
                      <td>{{$penduduk->laki_laki}}</td>
                      <td>{{$penduduk->perempuan}}</td>
                      <td>{{$penduduk->jumlah_pddk}}</td>
                      <td>{{$penduduk->jumlah_kk}}</td>
                      <td>{{$penduduk->kepadatan}}</td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection

@section('script')
    <script>
      $(document).ready( function () {
          $('#table_penduduk').DataTable();
      } );
    </script>

@endsection