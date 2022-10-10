<div class="modal fade" id="modal-view-nonbulanan<?= $item->id_nonbulanan ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Biaya Non Bulanan</h4>
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
                    <th>Aksi</th>
                </thead>
                <tbody>
                  @forelse ($detail_non_bulanan as $c)
                    @if ($c->kode_non_bulanan == $item->id_nonbulanan)
                    <tr>
                      <td>{{$loop->index + 1}}</td>
                      <td>{{$c->created_at}}</td>
                      <td> Rp.{{number_format($c->nominal_detail)}}.-</td>
                      <td class="text-center"> <span class="badge badge-success text-center">{{$c->nama_methode}}</span></td>
                      <td>
                        <a href="#" class="btn-sm btn-primary"><i class="fas fa-print"></i> Cetak Struk</a>
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