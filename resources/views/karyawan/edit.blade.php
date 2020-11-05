@extends('layouts.admin')

@section('content')
dd{{$karyawan}}
dd{{$grade}}
<section class="content-header">
    <div class="container-fluid">
        <div class="col md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/karyawan/{{$karyawan->id}}">
                @method('patch')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Enter Nama" name="nama" value="{{$karyawan->name}}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin :</label> <br>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" data-placeholder="Pilih Jenis">
                            <option name="jenis_kelamin" value="L" @if($karyawan->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                            <option name="jenis_kelamin" value="P" @if($karyawan->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                        </select>
                    <!-- <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin :</label> <br>
                        <!-- <div class="form-check form-check-inline">
                            <label for="jenis_kelamin">
                                <input type="radio" name="jenis_kelamin" value="L" id="jenis_kelamin" selected>Laki-Laki
                                <input type="radio" name="jenis_kelamin" value="P" id="jenis_kelamin">Perempuan
                            </label>
                        </div> -->
                        <!-- @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror -->
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal_Lahir</label>
                        <input type="Date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal_lahir" name="tanggal_lahir" value="{{$karyawan->tanggal_lahir}}">
                        @error('tanggal_lahir')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal_Masuk</label>
                        <input type="Date" class="form-control @error('tanggal_masuk') is-invalid @enderror"" id="tanggal_masuk" placeholder="Tanggal_Masuk" name="tanggal_masuk" value="{{$karyawan->tanggal_masuk}}">
                        @error('tanggal_masuk')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="grade_id">Grade :</label> <br>
                        <select class="form-control" name="grade_id" id="grade_id" data-placeholder="Pilih Jenis">
                        @foreach($grade as $grade)
                            <option name="grade_id" value="{{$grade->id}}" @if($karyawan->grade_id == $grade->id) selected @endif >{{$grade->grade}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>


                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="{{$karyawan->password}}">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                        </div>
                        </div>
                    </div>
                    <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div> -->
                
                </div>
                <!-- @can('update', $karyawan->grade)
                    <a href="/grade/create" class="btn btn-outline-dark " role="button" aria-disabled="true">Add Grade</a>
                @endcan -->
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