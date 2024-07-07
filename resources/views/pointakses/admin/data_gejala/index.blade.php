@extends('pointakses.admin.index')

@section('title', 'Data Gejala')

@section('content')
    <div class="head-title">
	<div class="left">
		<h1>Data Gejala</h1>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/data_gejala/style.css') }}">
		<ul class="breadcrumb">
			<li>
				<a class="active" href="{{ route('dashboard') }}">Dashboard</a>
			</li>
			<li><i class='bx bx-chevron-right'></i></li>
			<li>
				<a href="#">Data Gejala</a>
			</li>
		</ul>
	</div>
</div>
<body>

     <!-- Display Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

</div>
    <div class="container mt-5">
        <h2>Data Gejala Utama</h2>
        <button data-toggle="modal" data-target="#tambahGejalaModal">Tambah Gejala</button>
        <table id="gejalaTable">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($gejala as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_gejala }}</td>
                    <td>{{ $item->nama_gejala}}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <button class="edit-btn" data-id="{{ $item->_id }}" data-type="utama">Edit</button>
                        <button class="delete-btn" data-id="{{ $item->_id }}" data-toggle="modal" data-target="#deleteGejalaUtamaModal">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

<!-- Modal Tambah Data Utama -->
<div class="modal fade" id="tambahGejalaModal" tabindex="-1" aria-labelledby="tambahGejalaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahGejalaModalLabel">Tambah Data Gejala Utama</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="{{ route('data_gejala.store') }}">
        @csrf
        <div class="form-group">
            <label for="kodeGejala">Kode Gejala</label>
            <input type="text" class="form-control" id="kodeGejala" name="kode_gejala" placeholder="Masukkan Kode Gejala" required>
        </div>
        <div class="form-group">
            <label for="namaGejala">Nama Gejala</label>
            <input type="text" class="form-control" id="namaGejala" name="nama_gejala" placeholder="Masukkan nama gejala" required>
        </div>
        <div class="form-group">
            <label for="keteranganGejala">Keterangan</label>
            <textarea class="form-control" id="keteranganGejala" rows="3" name="keterangan" placeholder="Masukkan Keterangan Gejala" required></textarea>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Edit Modal Gejala Utama -->
<div class="modal fade" id="editGejalaUtamaModal" tabindex="-1" aria-labelledby="editGejalaUtamaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGejalaUtamaModalLabel">Edit Data Gejala Utama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editGejalaUtamaForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editKodeGejalaUtama">Kode Gejala</label>
                        <input type="text" class="form-control" id="editKodeGejalaUtama" name="kode_gejala" required>
                    </div>
                    <div class="form-group">
                        <label for="editNamaGejalaUtama">Nama Gejala</label>
                        <input type="text" class="form-control" id="editNamaGejalaUtama" name="nama_gejala" required>
                    </div>
                    <div class="form-group">
                        <label for="editKeteranganGejalaUtama">Keterangan</label>
                        <textarea class="form-control" id="editKeteranganGejalaUtama" rows="3" name="keterangan" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Delete Gejala Utama -->
<div class="modal fade" id="deleteGejalaUtamaModal" tabindex="-1" aria-labelledby="deleteGejalaUtamaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGejalaUtamaModalLabel">Konfirmasi Hapus Gejala Utama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus gejala ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="{{ route('data_gejala.delete', $item['_id']) }}" id="deleteGejalaUtamaForm" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="container mt-5">
        <h2>Data Gejala Lainya</h2>
        <button data-toggle="modal" data-target="#tambahGejalaLainnyaModal">Tambah Gejala</button>
        <table id="gejalalainnyaTable" class="">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Gejala</th>
                    <th>Nama Gejala</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gejalaLainnya as $item )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_gejala }}</td>
                    <td>{{ $item->nama_gejala}}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                    <button class="edit-btn" data-id="{{ $item->_id }}" data-type="lainnya">Edit</button>
                    <button class="delete-btn" data-id="{{ $item->_id }}" data-toggle="modal" data-target="#deleteGejalaLainnyaModal">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<!-- Modal Tambah Data Lainnya -->
<div class="modal fade" id="tambahGejalaLainnyaModal" tabindex="-1" aria-labelledby="tambahGejalaLainnyaModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahGejalaLainnyaModal">Tambah Data Gejala Lainnya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form method="POST" action="{{ route('gejala_lainnya.Store') }}">
        @csrf
        <div class="form-group">
            <label for="kodeGejala">Kode Gejala</label>
            <input type="text" class="form-control" id="kodeGejala" name="kode_gejala" placeholder="Masukkan Kode Gejala" required>
        </div>
        <div class="form-group">
            <label for="namaGejala">Nama Gejala</label>
            <input type="text" class="form-control" id="namaGejala" name="nama_gejala" placeholder="Masukkan nama gejala" required>
        </div>
        <div class="form-group">
            <label for="keteranganGejala">Keterangan</label>
            <textarea class="form-control" id="keteranganGejala" rows="3" name="keterangan" placeholder="Masukkan Keterangan Gejala" required></textarea>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Edit Modal Gejala Lainnya -->
<div class="modal fade" id="editGejalaLainnyaModal" tabindex="-1" aria-labelledby="editGejalaLainnyaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGejalaLainnyaModalLabel">Edit Data Gejala Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editGejalaLainnyaForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="editKodeGejalaLainnya">Kode Gejala</label>
                        <input type="text" class="form-control" id="editKodeGejalaLainnya" name="kode_gejala" required>
                    </div>
                    <div class="form-group">
                        <label for="editNamaGejalaLainnya">Nama Gejala</label>
                        <input type="text" class="form-control" id="editNamaGejalaLainnya" name="nama_gejala" required>
                    </div>
                    <div class="form-group">
                        <label for="editKeteranganGejalaLainnya">Keterangan</label>
                        <textarea class="form-control" id="editKeteranganGejalaLainnya" rows="3" name="keterangan" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Delete Gejala Lainnya -->
<div class="modal fade" id="deleteGejalaLainnyaModal" tabindex="-1" aria-labelledby="deleteGejalaLainnyaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteGejalaLainnyaModalLabel">Konfirmasi Hapus Gejala Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus gejala ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="{{ route('data_gejala.lainnya.delete', $item['_id']) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src={{ asset("assets/admin/data_gejala/script.js") }}></script>
@endsection

