<!DOCTYPE html>
<html lang="en">
    <style type="text/css">

        .tabel{border-collapse: collapse;}
        .tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
        .tabel td{padding: 8px 5px;  }
    </style>
<head>
    <link rel="shortcut icon" href="{{$img}}"  type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>{{$name}}</title>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="20% rowspan="2" valign="top" align="center"><img src="{{$img}}" width="130" height="130" alt=""></td>
            <td width="80%" align="center"><h2 style="text-transform: uppercase;">{{$data->nama_sekolah}}</h2><p>{{$data->alamat_sekolah}}<br> Kec.{{$data->nama_kecamatan}}, Kel.{{$data->nama_kelurahan}}<br>Telp:{{$data->nomor_hp}}, Email : {{$data->email}}, Website : {{$data->website}}</p></td>
        </tr>
    </table>
    <hr style="border-top:3px solid #000;">
    {!!$isi!!}
    <br><br><br>
    <table width="100%">
        <tr>
          <td align="center" width="70%"></td>
          <td width="30%">
           Jakarta, 20 Oktober 2022    <br/>Kepala Tata Usaha,<br/><br/><br/><br/>
            <b><u>ABDUL MUIS</u><br/>343434343434</b>
          </td>
        </tr>
        </table>
</body>
</html>