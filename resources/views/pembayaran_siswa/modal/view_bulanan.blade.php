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
                                  <a href="#" class="btn-sm btn-primary"><i class="fas fa-print"></i> Cetak Struk</a>
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