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
                  
                  <a class="btn btn-primary " href="/grade/create">Tambah Grade</a>

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
                      <th style="width: 20%">Grade</th>
                      <th style="width: 20%">Gaji</th>
                      <th style="width: 20%">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($grade as $grade)
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{$grade->grade}}</td>
                      <td>{{$grade->gaji}}</td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="/grade/{{$grade->id}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-warning btn-sm" type="submit" href="/grade/{{$grade->id}}/edit">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" type="submit" href="/grade/{{$grade->id}}/destroy" onclick="return confirm('hapus data nama {{$grade->nama}}')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          <!-- <form action="{{$grade->nama}}" method="post" class="d-inline">
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
@endsection

@section('footer')
<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
@endsection