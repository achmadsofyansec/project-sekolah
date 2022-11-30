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
                      <td>{{$c->tgl_input_detail}}</td>
                      <td> Rp.{{number_format($c->nominal_detail)}}.-</td>
                      <td class="text-center"> <span class="badge badge-success text-center">{{$c->nama_methode}}</span></td>
                      <td>
                        <form action="{{route('cetak_struk')}}" method="POST" target="_blank">
                          @csrf
                          <input type="hidden" name="type" id="type" value="detail">
                          <input type="hidden" name="nama_pembayaran" id="nama_pembayaran" value="nonbulanan_siswa">
                          <input type="hidden" name="tahun_ajaran" id="tahun_ajaran" value="{{$c->tahun_ajaran}}">
                          <input type="hidden" name="nisn" id="nisn" value="{{$data->nisn}}">
                          <input type="hidden" name="nama" id="nama" value="{{$data->nama}}">
                          <input type="hidden" name="kode_kelas" id="kode_kelas" value="{{$c->id_kelases}}">
                          <input type="hidden" name="id_detail" id="id_detail" value="{{$c->id_detail}}">
                          <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-print"></i> Cetak Struk</button>
                        </form>
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