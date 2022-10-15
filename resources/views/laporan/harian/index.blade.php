@extends('layouts.app')
@section('page', 'Laporan Harian')
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
            <div class="card card-orange card-outline">
              <div class="card-body">
                <form action="{{route('laporan_harian')}}" method="GET">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Tgl Awal</label>
                        <input type="date" name="filter_awal" value="@if($req->filter_awal != null){{$req->filter_awal}}@endif" id="filter_awal" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Tgl Akhir</label>
                        <input type="date" name="filter_akhir" value="@if($req->filter_akhir != null){{$req->filter_akhir}}@endif" id="filter_akhir" class="form-control" required>
                      </div>
                    </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label>Search</label>
                          <input type="submit" value="Search" class="btn btn-primary" style="width: 100%">
                        </div>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        @if ($req->filter_awal != null && $req->filter_akhir != null)
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-orange">
              <div class="card-body">
                <h4>Laporan Harian</h4>
                <div class="row">
                  <div class="col-5 col-sm-3">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">                                            
                      <a class="nav-link active" id="vert-tabs-1-tab" data-toggle="pill" href="#vert-tabs-1" role="tab" aria-controls="vert-tabs-1" aria-selected="true">Bulanan Siswa</a>
                      <a class="nav-link" id="vert-tabs-2-tab" data-toggle="pill" href="#vert-tabs-2" role="tab" aria-controls="vert-tabs-2" aria-selected="true">NonBulanan Siswa</a>
                      <a class="nav-link" id="vert-tabs-3-tab" data-toggle="pill" href="#vert-tabs-3" role="tab" aria-controls="vert-tabs-3" aria-selected="false">Tabungan Siswa</a>
                      <a class="nav-link" id="vert-tabs-4-tab" data-toggle="pill" href="#vert-tabs-4" role="tab" aria-controls="vert-tabs-4" aria-selected="false">Penerimaan Lain</a>
                      <a class="nav-link" id="vert-tabs-5-tab" data-toggle="pill" href="#vert-tabs-5" role="tab" aria-controls="vert-tabs-5" aria-selected="false">Pengeluaran</a>
                    </div>
                  </div>
                  <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                      <div class="tab-pane text-left fade show active" id="vert-tabs-1" role="tabpanel" aria-labelledby="vert-tabs-1-tab">
                        <div class="card-header">
                         Bulanan Siswa
                          <div class="card-tools">
                            <a href="#" class="btn btn-primary" name="print_bulanan_harian" id="print_bulanan_harian"><i class="fas fa-print"></i> Print</a>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table" id="TABLES_1">
                              <thead>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pembayaran</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Penerimaan</th>
                                <th>Ket</th>
                              </thead>
                              <tbody>
                                @forelse ($bulanan as $item)
                                    <tr>
                                      <td>{{$loop->index + 1}}</td>
                                      <td>{{$item->tgl_bayar}}</td>
                                      <td>{{$item->nama_biaya}}</td>
                                      <td>{{$item->nama}}</td>
                                      <td>({{$item->kode_kelas}}) {{$item->nama_kelas}}</td>
                                      <td>Rp.{{number_format($item->nominal_pembayaran)}}</td>
                                      <td><span class="badge badge-primary">{{$item->nama_methode}}</span>
                                      </td>
                                    </tr>
                                @empty
                                    <tr>
                                      <td class="text-muted text-center" colspan="100%">Tidak Ada Data</td>
                                    </tr>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane text-left fade show " id="vert-tabs-2" role="tabpanel" aria-labelledby="vert-tabs-2-tab">
                        <div class="card-header">
                          NonBulanan Siswa
                           <div class="card-tools">
                             <a href="#" class="btn btn-primary" name="print_nonbulanan_harian" id="print"><i class="fas fa-print"></i> Print</a>
                           </div>
                         </div>
                         <div class="card-body">
                           <div class="table-responsive">
                             <table class="table" id="TABLES_2">
                               <thead>
                                 <th>No</th>
                                 <th>Tanggal</th>
                                 <th>Pembayaran</th>
                                 <th>Nama</th>
                                 <th>Kelas</th>
                                 <th>Penerimaan</th>
                                 <th>Ket</th>
                               </thead>
                               <tbody>
                                 @forelse ($non_bulanan as $item)
                                     <tr>
                                       <td>{{$loop->index + 1}}</td>
                                       <td>{{$item->tgl_bayar}}</td>
                                       <td>{{$item->nama_biaya}}</td>
                                       <td>{{$item->nama}}</td>
                                       <td>({{$item->code_kelas}}) {{$item->nama_kelas}}</td>
                                       <td>Rp.{{number_format($item->nominal_detail)}}</td>
                                       <td><span class="badge badge-primary">{{$item->nama_methode}}</span>
                                       </td>
                                     </tr>
                                 @empty
                                     <tr>
                                       <td class="text-muted text-center" colspan="100%">Tidak Ada Data</td>
                                     </tr>
                                 @endforelse
                               </tbody>
                             </table>
                           </div>
                         </div>
                      </div>
                      <div class="tab-pane text-left fade show " id="vert-tabs-3" role="tabpanel" aria-labelledby="vert-tabs-3-tab">
                        <div class="card-header">
                          Tabungan Siswa
                           <div class="card-tools">
                             <a href="#" class="btn btn-primary" name="print_tabungan_harian" id="print"><i class="fas fa-print"></i> Print</a>
                           </div>
                         </div>
                         <div class="card-body">
                           <div class="table-responsive">
                             <table class="table" id="TABLES_3">
                               <thead>
                                 <th>No</th>
                                 <th>Tanggal</th>
                                 <th>Nama</th>
                                 <th>Kelas</th>
                                 <th>Nominal</th>
                                 <th><span class="badge badge-success">IN</span> / <span class="badge badge-danger">OUT</span></th>
                               </thead>
                               <tbody>
                                 @forelse ($tabungan as $item)
                                     <tr>
                                       <td>{{$loop->index + 1}}</td>
                                       <td>{{date('Y-m-d', strtotime($item->tgl_bayar));}}</td>
                                       <td>{{$item->nama}}</td>
                                       <td>( {{$item->kode_kelas}} ) {{$item->nama_kelas}}</td>
                                       <td>Rp.{{number_format($item->nominal_detail)}}</td>
                                       <td>@if ($item->type_detail == '0')
                                        <span class="badge badge-success">IN</span>
                                      @else
                                      <span class="badge badge-danger">OUT</span>
                                      @endif</span>
                                       </td>
                                     </tr>
                                 @empty
                                     <tr>
                                       <td class="text-muted text-center" colspan="100%">Tidak Ada Data</td>
                                     </tr>
                                 @endforelse
                               </tbody>
                             </table>
                           </div>
                         </div>
                      </div>
                      <div class="tab-pane text-left fade show " id="vert-tabs-4" role="tabpanel" aria-labelledby="vert-tabs-4-tab">
                        <div class="card-header">
                          Penerimaan Lain
                           <div class="card-tools">
                             <a href="#" class="btn btn-primary" name="print_terima_lain_harian" id="print"><i class="fas fa-print"></i> Print</a>
                           </div>
                         </div>
                         <div class="card-body">
                           <div class="table-responsive">
                             <table class="table" id="TABLES_3">
                               <thead>
                                 <th>No</th>
                                 <th>Tanggal</th>
                                 <th>Dari</th>
                                 <th>Penerimaan</th>
                                 <th>Ket</th>
                                 <th>Methode</th>
                               </thead>
                               <tbody>
                                 @forelse ($penerimaan_lain as $item)
                                     <tr>
                                       <td>{{$loop->index + 1}}</td>
                                       <td>{{$item->tgl_penerimaan}}</td>
                                       <td>{{$item->penerimaan_dari}}</td>
                                       <td>Rp.{{number_format($item->detail_jumlah)}}</td>
                                       <td>{{$item->desc_penerimaan}}</span>
                                        <td><span class="badge badge-primary">{{$item->nama_methode}}</span></td>
                                       </td>
                                     </tr>
                                 @empty
                                     <tr>
                                       <td class="text-muted text-center" colspan="100%">Tidak Ada Data</td>
                                     </tr>
                                 @endforelse
                               </tbody>
                             </table>
                           </div>
                         </div>
                      </div>
                      <div class="tab-pane text-left fade show " id="vert-tabs-5" role="tabpanel" aria-labelledby="vert-tabs-5-tab">
                        <div class="card-header">
                          Pengeluaran
                           <div class="card-tools">
                             <a href="#" class="btn btn-primary" name="print_pengeluaran_harian" id="print"><i class="fas fa-print"></i> Print</a>
                           </div>
                         </div>
                         <div class="card-body">
                           <div class="table-responsive">
                             <table class="table" id="TABLES_3">
                               <thead>
                                 <th>No</th>
                                 <th>Tanggal</th>
                                 <th>Sumber</th>
                                 <th>Pembayaran</th>
                                 <th>Nominal</th>
                                 <th>Ket</th>
                               </thead>
                               <tbody>
                                 @forelse ($pengeluaran as $item)
                                     <tr>
                                       <td>{{$loop->index + 1}}</td>
                                       <td>{{$item->tgl_pengeluaran}}</td>
                                       <td>{{$item->sumber_dana}}</td>
                                       <td>{{$item->nama_pos}}</td>
                                       <td>Rp.{{number_format($item->detail_jumlah)}}</td>
                                       <td>{{$item->detail_keterangan}}
                                       </td>
                                     </tr>
                                 @empty
                                     <tr>
                                       <td class="text-muted text-center" colspan="100%">Tidak Ada Data</td>
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
          </div>
        </div>
        @endif
        
    </div>
</div>
</div>
@endsection