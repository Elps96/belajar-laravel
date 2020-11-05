@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="col md-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Tambah Grade</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"  method="post" action="/grade">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="grade">grade</label>
                        <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" placeholder="Enter grade" name="grade" value="{{old('grade')}}">
                        @error('grade')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="gaji">gaji</label>
                        <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji" placeholder="Enter gaji" name="gaji" value="{{old('gaji')}}">
                        @error('gaji')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
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