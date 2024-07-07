@extends('pointakses.admin.index')

@section('title', 'Report')

@section('content')
<div class="head-title">
	<div class="left">
		<h1>Report</h1>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/report/style.css') }}">
		<ul class="breadcrumb">
			<li>
				<a class="active" href="{{ route('dashboard') }}">Dashboard</a>
			</li>
			<li><i class='bx bx-chevron-right'></i></li>
			<li>
				<a href="#">Report</a>
			</li>
		</ul>
	</div>
</div>

<body>
    <div class="report-container">
        <h1>Laporan Data Pasien</h1>
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
                    <th>Jumlah Pasien</th>
                    <th>Normal</th>
                    <th>Depresi Ringan</th>
                    <th>Depresi Sedang</th>
                    <th>Depresi Berat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="patient-data">
                <tr data-month="06" data-year="2024">
                    <td>Juni</td>
                    <td>2024</td>
                    <td>25</td>
                    <td>10</td>
                    <td>8</td>
                    <td>3</td>
                    <td>4</td>
                    <td><button id="view-btn">Print</button></td>
                </tr>
                    <tr data-month="05" data-year="2024">
                    <td>mei</td>
                    <td>2024</td>
                    <td>40</td>
                    <td>10</td>
                    <td>20</td>
                    <td>5</td>
                    <td>5</td>
                    <td><button id="view-btn">Print</button></td>
                </tr>
                    <tr data-month="04" data-year="2024">
                    <td>April</td>
                    <td>2024</td>
                    <td>17</td>
                    <td>5</td>
                    <td>7</td>
                    <td>3</td>
                    <td>2</td>
                    <td><button id="view-btn">Print</button></td>
                </tr>
                    <tr data-month="05" data-year="2023">
                    <td>Mei</td>
                    <td>2023</td>
                    <td>30</td>
                    <td>10</td>
                    <td>5</td>
                    <td>5</td>
                    <td>10</td>
                    <td><button id="view-btn">Print</button></td>
                </tr>
                    <tr data-month="06" data-year="2023">
                    <td>Juni</td>
                    <td>2023</td>
                    <td>55</td>
                    <td>23</td>
                    <td>15</td>
                    <td>10</td>
                    <td>7</td>
                    <td><button id="view-btn">Print</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</html>
<script src={{ asset("assets/admin/report/script.js") }}></script>
</body>
@endsection
