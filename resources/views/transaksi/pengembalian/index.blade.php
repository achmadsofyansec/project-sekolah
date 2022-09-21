@extends('layouts.app')
@section('page', 'Pengembalian')
@section('content-app')
<div class="content-wrapper">
  <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-2">
            <h1 class="m-0 text-dark" style="text-shadow: 2px 2px 4px gray;"><i class="fad fa-books-medical"></i></i> @yield('page')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home-lg-alt"></i> Home</a></li>
              <li class="breadcrumb-item active">@yield('page')</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card card-success">
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
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                  <table class="table table-bordered tble-hover table-striped table-sm">
                    <tbody>
                      <tr>
                        <td style="width:150px;">NIS Siswa</td>
                        <td>
                          <table class="table table-bordered tble-hover table-striped table-sm">
                            <tbody>
                              <tr>
                                  <div class="input-group">
                                    <select class="form-control select2" onchange="filter_siswa()" name="nisn" id="nisn" required>
                                          <option >NIS Siswa</option>

                                          @forelse ($siswa as $item)
                                          <option name="{{$item->nisn}}" id="{{$item->nisn}}">{{$item->nisn}}</option>
                                          @empty

                                          @endforelse
                                    </select>
                                  </div>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <div class="col-md-4">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td style="vertical-align:middle;text-align:center;">
                        <a class="btn bg-navy" href="{{ route('data_peminjaman.index')}}"><i class="fa fa-list-alt"> </i> Daftar Transaksi Peminjaman </a>
                        @csrf
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-md-8"> 
                <div class="col-md-12">
                  <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <td style="width:150px;vertical-align:middle;">NIS</td>
                        <td><input class="form-control nis" name="nis" type="text" id="nis" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Nama Siswa</td>
                        <td><input class="form-control nama_siswa" name="nama" type="text" id="nama" readonly></td>
                      </tr>
                      <tr>
                        <td style="vertical-align:middle;">Kelas</td>
                        <td><input class="form-control nama_kelas" name="nama_kelas" type="text" id="nama_kelas" readonly></td>
                      </tr>
                  </table>
                </div>
              </div>
              <div class="col-md-12">
                <br>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th colspan="8" style="background:#000;color:#fff;">Daftar Transaksi Pengembalian</th>
                    </tr>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Judul Buku</th>
                      <th>Tgl Pinjam</th>
                      <th>Tgl Kembali</th>
                      <th>Status</th>
                      <th>Denda</th>
                      <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                        @forelse ($data as $item)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>{{$item->kode_buku}}</td>
                      <td>{{$item->judul_buku}}</td>
                      <td>{{$item->tanggal_pinjam}}</td>
                      <td>
                        <?php $tanggal_kembali = mktime(0,0,0, date('n'), date('j') + $item->durasi, date('Y'));
                          $kembali = date('Y-m-d', $tanggal_kembali);
                          echo $kembali;
                           ?>
                      </td>
                      <td><?php if($item->status == 1){
                        echo "Belum Dikembalikan";
                      }else{
                        echo "Telah Dikembalikan";
                      } ?></td>
                      @forelse ($denda as $item1)
                      <td>
                        <?php 
                          $dendabuku = $item1->tarif_denda;
                          $tgl_sekarang = date("Y-m-d");
                          $tgl_kembali = $kembali;
                          $sel1 = explode('-',$tgl_kembali);
                          $sel1_pecah = $sel1[0].'-'.$sel1[1].'-'.$sel1[2];
                          $sel2 = explode('-',$tgl_sekarang);
                          $sel2_pecah = $sel2[0].'-'.$sel2[1].'-'.$sel2[2];
                          $selisih = strtotime($sel2_pecah) - strtotime($sel1_pecah);
                          $selisih = $selisih/86400;
                          if($selisih < 0){
                            echo "Tidak Ada";
                          }else{
                          echo $selisih." hari (Rp.". $dendabuku*$selisih.")";
                        }
                         ?>
                        </td>
                        @empty
                        @endforelse
                      <td class="text-center">
                    <form action="{{route('peminjaman_buku.update',$item->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                      <?php $i = 0; ?>
                        <input type="hidden" name="status" id="status" value="<?php echo $i; ?>">
                        <input type="hidden" name="keperluan" id="keperluan" value="<?php echo "Kembali Buku"; ?>">
                        <?php if($item->status == 1){ ?>
                          <button  class="btn btn-primary btn-xs"  onclick="return confirm('Yakin ingin mengembalikan buku ini ?');"><i class="fa fa-edit"> </i> Kembali</i></button></td>
                        <?php }else{ ?>
                    </form>
                    <button class="btn btn-success btn-xs"><i class="fa fa-edit" readonly> </i>Dikembalikan</i></button></td>
                        <?php } ?>
                      @empty
                        <tr>
                        <td colspan="8" class="text-center text-mute">Tidak Ada Data</td>
                        </tr>
                    </tr>
                    @endforelse
                  </tbody>
                </table>

              </div>

            </div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
</div>
@endsection
@section('content-script')
<script>
  function filter_siswa(){
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    var x = document.getElementById("nisn").value;
    $.ajax({
             type:'POST',
             url:"{{ route('ajaxRequestNisn.filter_siswa') }}",
             data:{nisn:x},
             success:function(data){
              const ray = data[0];
              $('#nis').val(ray.nisn)
              $('#nama').val(ray.nama)
              $('#nama_kelas').val(ray.nisn)
              $('#nama_siswa').val(ray.nama)
              $('#nis_siswa').val(ray.nisn)
              $('#kelas').val(ray.nisn)
             }
          });
  }
</script>
@endsection