<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="aplikasi sederhana untuk menampilkan pengumuman hasil ujian nasional secara online">
    <meta name="author" content="slamet.bsan@gmail.com">
    <title>Pengumuman Kelulusan</title>
    <link href="{{ asset('public/plugins/theme-kelulusan/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/plugins/theme-kelulusan/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/plugins/theme-kelulusan/css/kelulusan.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="">INFO KELULUSAN </a>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <h2>Pengumuman Kelulusan 2022</h2>
    <!-- countdown -->
    
    <div id="clock" class="lead" style="font-weight:bold;color:red;"></div>
    
    <div id="xpengumuman">
      <table class="table table-bordered">
        <tr><td>Nomor Ujian</td><td>{{ $kelulusan->nama }}</td></tr>
        <tr><td>Nama Siswa</td><td>{{ $kelulusan->nama }}</td></tr>
        <tr><td>Status</td><td>lulus</td></tr>
      </table>
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Bahasa Indonesia</th>
          <th>Bahasa Inggris</th>
          <th>Matematika</th>
          <th>Kejuruan</th>
        </tr>
        </thead>
        <tbody>
          <td>90</td>
          <td>90</td>
          <td>90</td>
          <td>90</td>
        </tbody>
      </table>
      
        <p>Masukkan nomor ujianmu pada form yang disediakan.</p>
        
        <form action="kelulusan/cari" method="GET">
            <div class="input-group">
                <input type="text" name="nomor" class="form-control" placeholder="Nomor Ujian" value="{{ old('cari') }}" required>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" name="submit" value="cari">Periksa!</button>
                </span>
            </div>
        </form>

        <!-- <table border="1">
          <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Umur</th>
            <th>Alamat</th>
          </tr>
          @foreach($kelulusan as $p)
          <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->nik }}</td>
            <td>umur</td>
            <td>alamat</td>
          </tr>
          @endforeach -->
      </table>
    </div>
    </div><!-- /.container -->
  
  <footer class="footer">
    <div class="container">
      <p class="text-muted">&copy;</p>
    </div>
  </footer>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('public/plugins/theme-kelulusan/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/plugins/theme-kelulusan/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/plugins/theme-kelulusan/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/plugins/theme-kelulusan/js/jasny-bootstrap.min.js') }}"></script>
</body>
</html>