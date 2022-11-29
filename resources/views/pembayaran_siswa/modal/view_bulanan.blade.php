<div class="modal fade" id="modal-view-bulanan<?= $item->id_bulanan ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Biaya Bulanan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                        @if ($c->kode_biaya_siswa == $item->kode_biaya_siswa)
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
                                <span class="badge badge-danger"> {{'Tagihan Belum Lunas'}}</span>
                                  @else
                                  <form action="{{route('cetak_struk')}}" method="POST" target="_blank">
                                    @csrf
                                    <input type="hidden" name="type" id="type" value="pembayaran">
                                    <input type="hidden" name="nama_pembayaran" id="nama_pembayaran" value="bulanan_siswa">
                                    <input type="hidden" name="tahun_ajaran" id="tahun_ajaran" value="{{$c->tahun_ajaran}}">
                                    <input type="hidden" name="bulan_pembayaran" id="bulan_pembayaran" value="{{$c->bulan_pembayaran}}">
                                    <input type="hidden" name="nisn" id="nisn" value="{{$data->nisn}}">
                                    <input type="hidden" name="nama" id="nama" value="{{$data->nama}}">
                                    <input type="hidden" name="id_bulanan" id="id_bulanan" value="{{$c->id_bulanan}}">
                                    <input type="hidden" name="kode_kelas" id="kode_kelas" value="{{$c->kode_kelas}}">
                                    <input type="hidden" name="tgl_bayar" id="tgl_bayar" value="{{$c->tgl_bayar}}">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-print"></i> Cetak Struk</button>
                                  </form>
                              @endif
                                
                              </td>
                            </tr>
                        @endif
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>         
        <div class="modal-footer">
            <input type="button" value="Close" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>