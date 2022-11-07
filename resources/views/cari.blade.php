<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>List Category</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h3>Daftar Category</h3>
	<form action="{{ url('cari') }}" method="GET">
		{{ @csrf_field() }}
		<input type="text" name="name" placeholder="Ingin mencari apa ?" class="form-control"><br>
		<input type="submit" class="btn btn-md btn-outline-primary" >
	</form>
	<hr>
	<table  class="table table-bordered">
		<tr>
			<th>No.</th>
			<th>Slug</th>
		</tr>
		@php
			$no = 1;	
		@endphp
		@foreach($categories as $category)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $category->kode_ujian }}</td>
		</tr>
		@endforeach
	</table>
	{{ $categories->links() }}
</div>
</body>
</html>