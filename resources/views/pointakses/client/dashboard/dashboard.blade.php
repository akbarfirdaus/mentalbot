@extends('pointakses.client.index')

@section('title', 'Dashboard')

@section('content')
<div class="head-title">
	<div class="left">
		<h1>Dashboard</h1>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/halaman_dashboard/style.css') }}">
		<ul class="breadcrumb">
			<li>
				<a class="active" href="#">Client</a>
			</li>
			<li><i class='bx bx-chevron-right'></i></li>
			<li>
				<a href="#">Dashboard</a>
			</li>
		</ul>
	</div>
</div>

<body>
    <table style="width: auto">
        <tr>
            <td width="20%">Id</td>
            <td width="2%">:</td>
            <td>1</td>
        </tr>
        <tr>
            <td width="20%">Nama Pasien :</td>
            <td width="2%">:</td>
            <td>Muhammad Akbar Firdaus</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>Lhokseumawe, Jl.panglima Kaom</td>
        </tr>
        <tr>
            <td>email </td>
            <td>:</td>
            <td>afir832@gmail.com</td>
        </tr>
        <tr>
            <td>usia:</td>
            <td>:</td>
            <td>20</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>Laki - Laki</td>
        </tr>
</table>

<div class="table-container">
  <table>
    <thead>
      <tr>
        <th>Kode Gejala</th>
        <th>Gejala</th>
     </tr>
    </thead>
    <tbody>
        <tr>
            <td>G01</td>
            <td>Merasa Sedih berlebih</td>
        </tr>
        <tr>
            <td>G02</td>
            <td>pesimis akan masa depan</td>
        </tr>
        <tr>
            <td>G03</td>
            <td>Konsentrasi dan perhatian berkurang</td>
        </tr>
    </tbody>
  </table>
</div>
</body>
<script src={{ asset("assets/admin/data_gejala/script.js") }}></script>
@endsection
