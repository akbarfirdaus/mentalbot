@extends('pointakses.client.index')

@section('title', 'Report')

@section('content')
<div class="head-title">
	<div class="left">
		<h1>Report</h1>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/report/style.css') }}">
		<ul class="breadcrumb">
			<li>
				<a class="active" href="{{ route('dashboard.client') }}">Dashboard</a>
			</li>
			<li><i class='bx bx-chevron-right'></i></li>
			<li>
				<a href="#">Report</a>
			</li>
		</ul>
	</div>
    <link rel="stylesheet" href="assets/report/style.css">
</div>
<body>
    <div class="report-container">
        <h1>Laporan Konsultasi Anda</h1>
        <div class="d-flex align-items-center">
            <div class="col-auto">
            <label for="filter-month">Filter Bulan:</label>
            <select id="filter-month">
                <option value="all">Semua</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            </div>
            <div class="col-auto">
            <label for="filter-year">Filter Tahun:</label>
                <select name="tahun" id="filter-year">
                    <option value="all">Semua</option>
                        <?php $tahun = date('Y');
                        for ($i = 2023; $i < $tahun + 2; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                </select>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="patient-data">
                <tr data-month="06" data-year="2024">
                    <td>Juni</td>
                    <td>2024</td>
                    <td>
                    <a href="{{ route('report.riwayat') }}">
                        <button id="view-btn">Riwayat</button>
                    </a>
                    </td>
                </tr>
                    <tr data-month="05" data-year="2024">
                    <td>mei</td>
                    <td>2024</td>
                    <td><button id="view-btn">Riwayat</button></td>
                </tr>
                    <tr data-month="04" data-year="2024">
                    <td>April</td>
                    <td>2024</td>
                    <td><button id="view-btn">Riwayat</button></td>
                </tr>
                    <tr data-month="05" data-year="2023">
                    <td>Mei</td>
                    <td>2023</td>
                    <td><button id="view-btn">Riwayat</button></td>
                </tr>
                    <tr data-month="06" data-year="2023">
                    <td>Juni</td>
                    <td>2023</td>
                    <td><button id="view-btn">Riwayat</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</html>
</body>
<script src={{ asset("assets/client/report/script.js") }}></script>
@endsection
