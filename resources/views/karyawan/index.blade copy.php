@extends('layouts.admin')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Karyawan</h1>
            @if(session('status'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('status')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              @endif

              {{-- Error Alert --}}
              @if(session('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{session('error')}}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              @endif

            <!-- <h1>Simple Tables</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>

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
                  <a class="btn btn-primary " href="/karyawan/create">Tambah Karyawan</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class= display" id="my_table">
                  <thead>                  
                    <tr>
                      <th style="width: 1%">No</th>
                      <th style="width: 19%">Nama</th>
                      <th style="width: 10%">Jenis-Kelamin</th>
                      <th style="width: 10%">Tanggal Lahir</th>
                      <th style="width: 15%">Tanggal Masuk</th>
                      <th style="width: 5">Grade</th>
                      <th style="width: 10%">Gaji</th>
                      <th style="width: 20%">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data_karyawan as $karyawan)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{$karyawan->name ?? '' }}</td>
                      <td>{{$karyawan->jenis_kelamin ?? '' }}</td>
                      <td>{{$karyawan->tanggal_lahir ?? '' }}</td>
                      <td>{{$karyawan->tanggal_masuk ?? '' }}</td>
                      <td>{{$karyawan->grade->grade ?? ''}}</td>
                      <td>{{$karyawan->grade->gaji ?? ''}}</td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="/karyawan/{{$karyawan->id}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-warning btn-sm" type="submit" href="/karyawan/{{$karyawan->id}}/edit">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" type="submit" href="/karyawan/{{$karyawan->id}}/destroy" onclick="return confirm('hapus data nama {{$karyawan->nama}}')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          <!-- <form action="{{$karyawan->nama}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm fas fa-trash" type="submit">Delete</button>
                          </form> -->
                      </td>
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

@section('footer')
<script>
  $(document).ready( function () {
      $('#my_table').DataTable();
  } );
</script>

@endsection