@extends('layouts.app')
@section('page', 'Pembayaran Bulanan Siswa')
@section('content-app')
<div class="content-wrapper">
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('page')</h1>
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
<div class="content">
  <div class="container-fluid">
    @if($data != null)
    <div class="row">
      <div class="col-md-3">
        <div class="card card-orange card-outline">
          <div class="card-header">
            Data Siswa
          </div>
          <div class="card-body">
            <div class="form-group text-center">
              @if ($img != '-')
                  <img src="{{$img}}" alt="Logo" class="img" width="200" height="200">        
              @else
                  <h1>Tidak Ada Foto</h1>
              @endif
            </div>
            <div class="form-group">
              <label>NISN</label>
              <input type="text" name="nisn" id="nisn" class="form-control" value="{{$data->nisn}}" readonly>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="{{$data->nama}}" readonly>
            </div>
            <div class="form-group">
              <label>Kelas</label>
              <input type="text" name="kelas_siswa" id="kelas_siswa" class="form-control" value="{{$data->nama_kelas}}" readonly>
            </div>
            <div class="form-group">
              <label>Jurusan</label>
              <input type="text" name="jurusan_siswa" id="jurusan_siswa" class="form-control" value="{{$data->nama_jurusan}}" readonly>
            </div>
          </div>
          <div class="card-footer">
            <form action="{{route('pembayaran_siswa')}}" method="GET">
                <input type="hidden" name="tahun_ajaran" id="tahun_ajaran" value="{{$data_bulanan->id_tahun_ajaran}}">
                <input type="hidden" name="kode_siswa" id="kode_siswa" value="{{$data_bulanan->kode_siswa}}">
                <button type="submit" class="btn btn-danger">Back</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card card-outline card-orange">
            <div class="card-header">
                Data Pembayaran Bulanan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse ($detail_bulanan as $c)
                                    <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$c->bulan_pembayaran}}</td>
                                    <td>Rp.{{number_format($c->tagihan_pembayaran)}}.-</td>
                                    <td>Rp.{{number_format($c->nominal_pembayaran)}}.-</td>
                                    <td> @if ($c->status_pembayaran == '0')
                                        <span class="badge badge-primary"> {{'Belum Lunas'}}</span>
                                          @else
                                          <span class="badge badge-success">{{'Lunas'}}</span>
                                      @endif
                                    </td>
                                      <td>
                                        @if ($c->status_pembayaran == '0')
                                        <a href="#" data-toggle="modal" data-target="#modal-bulanan-<?= $c->id_bulanan?>" class="btn-sm btn-success"><i class="fas fa-cash-register"></i> Bayar</a>
                                          @else
                                      <a href="#" class="btn-sm btn-primary"><i class="fas fa-print"></i> Cetak Struk</a>
                                      @endif
                                      </td>
                                    </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @forelse ($detail_bulanan as $item)
        @include('pembayaran_siswa.modal.bayar_bulanan')
        @empty
        @endforelse
      </div>
    </div>
    @endif
</div>
</div>
</div>
@endsection