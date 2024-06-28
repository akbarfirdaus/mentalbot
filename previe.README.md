buat form table profil dan riwayat gejala pasien:
{   
    <!-- tgl 5/6/2024 DONE -->
    tabel profil
    - id 
    - nama
    - alamat
    - email
    - usia
    - jk

    riwayat gejala
    - no
    - tanggal
    - diagnosa
    - kode penyakit
    - ket
}

buat halaman client
{
    <!-- tgl 6/6/2024 Done -->
    halaman dashboard:
    - profil pasien(
    id, nama, email, alamat, usia, jk
    )
    - logchatnya(
    daftar gejalanya
    )

    halaman konsultasi:
    - form konsultasi
    
    halaman report:
    - riwayat diagnosa
}

- isi page data gejala dengan gejala" depresi yang didapat dirumah sakit
- membuat halaman report untuk admin
{
    <!-- tgl 7/6/2024 Done -->
    DATA GEJALA
    - Gejala utama
    - gejala lainnya

    HALAMAN REPORT
    filter sesuai bulan, tahun, tingkat depresi
    datanya: 
    (
        - no pasien
        - Nama Pasien
        - usia
        - jenis kelamin
        - tanggal konsultasi
        - tingkat depresi
        - keterangan
        - aksi
    )
}

mengisi daftar pertanyaan untuk chatbotnya
{
    <!-- tgl 8/6/2024 -->
    pertanyaan berupa berdasarkan gejala yang bisa untuk mendiagnosa tingkat depresi pasien.
}

membuat halaman log konsultasi pasien 
{
    <!-- tgl 11/6/2024 -->
    tabel profil
    - id 
    - nama
    - alamat
    - email
    - usia
    - jk

    table gejala hasil konsultasi
    - kode Gejala
    - Gejala
}



