@extends('layouts.admin')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Karyawan</h1>
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
                <a href="javascript:void(0)" class="btn btn-primary" id="tombol-tambah">Tambah Karyawan</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class= "table table-bordered display" id="table_karyawan">
                  <thead>                  
                    <tr>
                      <th>No</th>
                      <th>id</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jenis-Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Tanggal Masuk</th>
                      <th>Grade</th>
                      <th>Gaji</th>
                      <th>Opsi</th>
                      
                    </tr>
                  </thead>
                  

                </table>
              </div>
              <!-- /.card-body -->

            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

      <div class="modal fade" tabindex="-1" role="dialog" id="detail-modal" data-backdrop="false">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">PERHATIAN</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p><b>PPP</b></p>
                    
                  </div>
                  <div class="modal-footer bg-whitesmoke br">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="false">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">PERHATIAN</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p><b>Jika menghapus Karyawana maka</b></p>
                      <p>*data pegawai tersebut hilang selamanya, apakah anda yakin?</p>
                  </div>
                  <div class="modal-footer bg-whitesmoke br">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                          Data</button>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="tambah-edit-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id=modal-judul></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal" enctype="multipart/form-data" >
              <div class="row">
                <div class="col-sm-12">

                  <input type="hidden" name="id" id="id">

                    <div class="form-group">
                      <label for="name" class="col-sm-12 control-label">Nama Karyawan</label>
                      <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name" value="" required>
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-sm-12 control-label">Email</label>
                        <div class="col-sm-12">
                          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="" required>

                        </div>
                    </div> 

                    <div class="form-group">
                        <label for="jenis_kelamin" class="col-sm-12 control-label">Jenis Kelamin :</label> <br>
                        <div class="col-sm-12">
                          <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" data-placeholder="Pilih Jenis">
                              <option name="jenis_kelamin" value="L" id="jenis_kelamin">Laki-laki</option>
                              <option name="jenis_kelamin" value="P" id="jenis_kelamin">Perempuan</option>
                          </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir" class="col-sm-12 control-label">Tanggal_Lahir</label>
                        <div class="col-sm-12">
                          <input type="Date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Tanggal_lahir" name="tanggal_lahir" value="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk" class="col-sm-12 control-label">Tanggal_Masuk</label>
                        <div class="col-sm-12">
                          <input type="Date" class="form-control @error('tanggal_masuk') is-invalid @enderror"" id="tanggal_masuk" placeholder="Tanggal_Masuk" name="tanggal_masuk" value="">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="grade_id" class="col-sm-12 control-label">Grade :</label> <br>
                        <div class="col-sm-12">
                          <select class="form-control" name="grade_id" id="grade_id" data-placeholder="Pilih Jenis">
                          @foreach($grade as $grade)
                            <option name="grade_id" value="{{$grade->id}}" >{{$grade->grade}}</option>
                          @endforeach
                          </select>

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password" class="col-sm-12 control-label" >{{ __('Password') }}</label>
                        <div class="col-sm-12">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="">

                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="password-confirm" class="col-sm-12 control-label" >{{ __('Confirm Password') }}</label>
                        <div class="col-sm-12">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class=" col-form-label" class="col-sm-12 control-label" >{{ __('image') }}</label>
                        <div class="col-sm-12">
                          <input type="file", class="form-control-file" id="image" name="image" >

                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-12 modal-footer justify-content-between" >
                      <button type="submit" class="btn btn-primary" id="tombol-simpan" value="create">Simpan</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>
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
      <!-- /.modal -->

      <!-- MULAI MODAL KONFIRMASI DELETE-->

      
@stop

@section('script')
<script>
  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  });

        //TOMBOL TAMBAH DATA
        //jika tombol-tambah diklik maka
  $('#tombol-tambah').click(function () {
      $('#button-simpan').val("create-post"); //valuenya menjadi create-post
      $('#id').val(''); //valuenya menjadi kosong
      $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
      $('#modal-judul').html("Tambah Karyawan Baru"); //valuenya tambah pegawai baru
      $('#tambah-edit-modal').modal('show'); //modal tampil
  });

  $(document).ready( function () {
      $('#table_karyawan').DataTable({
        processing:true,
        serverSide:true,
        ajax:{
          url:"{{route('karyawan.index')}}",
          type : 'GET'
        },
        columns:[
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data:'id', name:'id'},
          {data:'name', name:'name'},
          {data:'email', name:'email'},
          {data:'jenis_kelamin', name:'jenis_kelamin'},
          {data:'tanggal_lahir', name:'tanggal_lahir'},
          {data:'tanggal_masuk', name:'tanggal_masuk'},
          {data:'grade.grade', name:'grade'},
          {data:'grade.gaji', name:'gaji'},
          {data:'action', name:'action'},
          

        ],
         //order: [[0,'updated_at - created_at']]
      });
  });
  
   //SIMPAN & UPDATE DATA DAN VALIDASI
  if ($("#form-tambah-edit").length > 0) {
    $("#form-tambah-edit").validate({
        submitHandler: function (form) {
            var actionType = $('#tombol-simpan').val();
            $('#tombol-simpan').html('Sending..');

            $.ajax({
                data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                url: "{{ route('karyawan.store') }}", //url simpan data
                type: "POST", //karena simpan kita pakai method POST
                        
                dataType: 'json', //data tipe kita kirim berupa JSON
                success: function (data) { //jika berhasil 
                    $('#form-tambah-edit').trigger("reset"); //form reset
                    $('#tambah-edit-modal').modal('hide'); //modal hide
                    $('#tombol-simpan').html('Simpan'); //tombol simpan
                            
                    var oTable = $('#table_karyawan').dataTable(); //inialisasi datatable
                    oTable.fnDraw(false); //reset datatable
                    iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                        title: 'Data Berhasil Disimpan',
                        message: '{{ Session('success')}}',
                        position: 'bottomRight',
                    });
                },
                error: function (data) { //jika error tampilkan error pada console
                    console.log('Error:', data);
                    $('#tombol-simpan').html('Simpan');
                }
            });
        }
    })
  }

  $('body').on('click', '.edit-post', function () {
    var data_id = $(this).data('id');
    $.get('karyawan/' + data_id + '/edit', function (data) {
        $('#modal-judul').html("Edit Post");
        $('#tombol-simpan').val("edit-post");
        $('#tambah-edit-modal').modal('show');

                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
        $('#id').val(data.id);
        $('#name').val(data.name);
        $('#email').val(data.email);
        $('#jenis_kelamin').val(data.jenis_kelamin);
        $('#tanggal_lahir').val(data.tanggal_lahir);
        $('#tanggal_masuk').val(data.tanggal_masuk);
    })
  });


  $(document).on('click', '.delete-post', function () {
    dataId = $(this).data('id');
    $('#konfirmasi-modal').modal('show');
  });


  $('#tombol-hapus').click(function () {
      $.ajax({

          url: "karyawan/" + dataId, //eksekusi ajax ke url ini
          type: 'DELETE',
          beforeSend: function () {
              $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
          },
          success: function (data) { //jika sukses
              setTimeout(function () {
                  $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                  var oTable = $('#table_karyawan').dataTable();
                  oTable.fnDraw(false); //reset datatable
              });
              iziToast.warning({ //tampilkan izitoast warning
                  title: 'Data Berhasil Dihapus',
                  message: '{{ Session('
                  delete ')}}',
                  position: 'bottomRight'
              });
          }
      })
  });

  $(document).on('click', '.detail-post', function () {
    dataId = $(this).data('id');
    $('#detail-modal').modal('show');
  });


  //abdurrohim.saifi@avocacode.com
</script>
@stop

