@extends('layouts.app')
@section('page', 'Input Nilai Harian')
@section('content-app')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-boxes nav-icon text-success"></i> @yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= url('/')?>">Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row-mb-2">
              
              <div class="col-md-12 mt-1">
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-primary">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row">
                  <div class="col-md-4 mt-1">
                      <div class="card card-info card-outline">
                          <div class="card-header">
                              <div class="card-title">
                                  Data Input Nilai
                              </div>
                          </div>
                      <form action="{{route('input_nilai.update',$data->id_nilai)}}" method="POST">
                        @csrf
                        @method('PUT')
                          <div class="card-body">
                              <div class="form-group">
                                  <label>Tanggal Input</label>
                                  <input type="date" name="tgl_input" id="tgl_input" class="form-control" value="{{$data->tgl_input}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Kelas</label>
                                  <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" value="{{$data->nama_kelas}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Jurusan</label>
                                  <input type="text" name="kode_jurusan" id="kode_jurusan" class="form-control" value="{{$data->nama_jurusan}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Tahun Ajaran</label>
                                  <input type="text" name="kode_tahun_ajaran" id="kode_tahun_ajaran" class="form-control" value="{{$data->tahun_ajaran}}" readonly>
                              </div>
                              <div class="form-group">
                                <label>Mata Pelajaran</label>
                                <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" value="{{$data->nama_mapel}}" readonly>
                              </div>
                              <div class="form-group">
                                <label>Kategori Nilai</label>
                                <input type="text" name="kategori_nilai" id="kategori_nilai" class="form-control" value="{{$data->kategori_nilai}}" readonly>
                              </div>
                              <div class="form-group">
                                  <label>Keterangan Input</label>
                                  <textarea name="desc_input" id="desc_input" cols="30" rows="10" class="form-control">{{$data->desc_input}}</textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <a type="button" href="<?php echo url('/input_harian') ?>" class="btn btn-danger">Close</a>
                          </div>
                      </form>
                      </div>
                  </div>  
                  <div class="col-md-8 mt-1">
                    <div class="card card-info card-outline card-outline-tabs">
                      <div class="card-header">
                        Data Nilai
                      </div>
                      <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <th>No</th>
                                  <th style="width: 20%;">NISN</th>
                                  <th style="width: 40%;">Nama</th>
                                  <th>Nilai</th>
                                </thead>
                                <tbody>
                                  @forelse ($data_nilai as $item)
                                  @php
                                      $s = 0;
                                      $val = 0;
                                  @endphp
                                    <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$item->nisn}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>@forelse ($detail as $r)
                                          @if ($item->id_siswa ==  $r->kode_siswa)
                                            @php
                                                $s = 1;
                                                $val = $r->nilai;
                                            @endphp
                                            @break
                                          @endif
                                        @empty
                                        @php
                                            $s = 1;
                                            $val = 0;
                                        @endphp
                                        @endforelse
                                        @if ($s > 0)
                                        <input type="number"  name="detail_nilai" id="detail_nilai" onchange="input_nilai({{$data->id_nilai}},{{$item->id_siswa}},this.value)"  value="{{$val}}" class="form-control">
                                        @else
                                        <input type="number" name="detail_nilai" id="detail_nilai" onchange="input_nilai({{$data->id_nilai}},{{$item->id_siswa}},this.value)" value="0" class="form-control">
                                        @endif
                                  </td>
                                    </tr>
                                  @empty
                                      <tr>
                                        <td class="text-muted text-center" colspan="4">Tidak Ada Data</td>
                                      </tr>
                                  @endforelse
                                </tbody>
                              </table>
                            </div>
                        </div>
                      </div>
                  </div> 
              </div>  
                  
              </div>
          </div>
      </div>
      </section>
    <!-- /.content -->
  </div>
@endsection
@section('content-script')
<script>
  function input_nilai(y,x,a){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
         type:'POST',
         url:"{{ route('ajaxRequest.input_nilai_detail') }}",
         data:{kode_siswa:x, kode_nilai:y,nilai:a},
         success:function(data){
           console.log(data)
         }
      });
  }

</script>
@endsection
