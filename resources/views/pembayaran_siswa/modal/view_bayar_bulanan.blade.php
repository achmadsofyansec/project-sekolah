<div class="modal fade" id="modal-detail-bulanan-<?= $item->id_bulanan?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Pembayaran Bulanan</h4>
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
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @forelse ($data_detail_bulanan as $items)
                    @if ($items->kode_bulanan == $item->id_bulanan)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$items->tgl_input_detail}}</td>
                      <td> Rp.{{number_format($items->nominal_detail)}}.-</td>
                      <td class="text-center"> <span class="badge badge-success text-center">{{$items->nama_methode}}</span></td>
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