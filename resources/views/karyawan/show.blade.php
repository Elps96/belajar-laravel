@extends('layouts.admin')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6 p-5">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="/storage/{{$karyawan->image}}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$karyawan->nama}}</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Jenis Kelamin</b> <a class="float-right">{{$karyawan->jenis_kelamin}}</a>
              </li>
              <li class="list-group-item">
                <b>Tanggal Lahir</b> <a class="float-right">{{$karyawan->tanggal_lahir}}</a>
              </li>
              <li class="list-group-item">
                <b>Tanggal Masuk</b> <a class="float-right">{{$karyawan->tanggal_masuk}}</a>
              </li>
            </ul>
            <!-- <a class="btn btn-danger btn-sm" type="submit" href="/karyawan/{{$karyawan->id}}/destroy" onclick="return confirm('hapus data nama {{$karyawan->nama}}')">
                <i class="fas fa-trash">
                </i>
                Delete
            </a> -->
            @can('update', $karyawan->grade)
                    <a href="/grade/create" class="btn btn-outline-dark " role="button" aria-disabled="true">Add Grade</a>
            @endcan
                    <a href="/grade/create" class="btn btn-outline-dark " role="button" aria-disabled="true">Add Grade</a>
            <!-- <form action="{{$karyawan->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm fas fa-trash" type="submit">Delete</button>
                          </form>
                          <a class="btn btn-primary " href="/grade/create">Tambah Grade</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection