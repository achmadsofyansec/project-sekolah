@extends('layouts.app')
@section('page', 'Dashboard')
@section('content-app')

<h2>Data Buku Per Tanggal </h2>
<table id="datatb" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Lokasi Penyimpanan</th>
            <th>Jumlah</th>
            <th>Stok</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($buku->result_array() as $data) { 
            $stok = $this->db->query("SELECT COALESCE(SUM(jumlah),0) as hitung FROM peminjaman_buku_dt WHERE id_buku = '$data[id_buku]' AND status_pinjam_dt = '0'")->row();
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['kode_buku']; ?></td>
                <td><?php echo $data['judul_buku']; ?></td>
                <td><?php echo $data['pengarang']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['lokasi']; ?></td>
                <td><?php echo $data['jumlah_buku']; ?></td>
                <td><?php echo $data['jumlah_buku'] - $stok->hitung; ?></td>

            </tr>
        <?php $no++;
        } ?>
    </tbody>
</table>
@endsection 