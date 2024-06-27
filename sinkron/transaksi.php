<?php
// Koneksi ke database db_perpus
$servername_perpus = "localhost";
$username_perpus = "root";
$password_perpus = "";
$dbname_perpus = "perpus";

$conn_perpus = new mysqli($servername_perpus, $username_perpus, $password_perpus, $dbname_perpus);

// Cek koneksi db_perpus
if ($conn_perpus->connect_error) {
    die("Koneksi ke db_perpus gagal: " . $conn_perpus->connect_error);
}

// Koneksi ke database db_kampus
$servername_kampus = "localhost";
$username_kampus = "root";
$password_kampus = "";
$dbname_kampus = "stmb9234_perpus";

$conn_kampus = new mysqli($servername_kampus, $username_kampus, $password_kampus, $dbname_kampus);

// Cek koneksi db_kampus
if ($conn_kampus->connect_error) {
    die("Koneksi ke db_kampus gagal: " . $conn_kampus->connect_error);
}

// Inisialisasi variabel penghitung
$count_success = 0;

// Ambil data dari tabel buku di db_perpus
$sql_select = "
    SELECT 
        t.NPM, t.Tgl_Pinjam, t.Tgl_Kembali, t.status,
        m.nama, m.kelas, m.no_hp, m.prodi, m.jurusan, m.ket,
        b.kode, b.judul, b.pengarang, b.penerbit, b.th_terbit, b.jlh_hal, b.kode_perpus, b.no_lemari, b.stok
    FROM 
        transaksi t
    JOIN 
        mahasiswa m ON t.NPM = m.npm
    JOIN 
        buku b ON t.Kode = b.kode";
$result_select = $conn_perpus->query($sql_select);

if ($result_select->num_rows > 0) {
    // Loop melalui data yang diambil
    while ($row = $result_select->fetch_assoc()) {
        $nim = $row['NPM'];
        $Tgl_Pinjam = $row['Tgl_Pinjam'];
        $Tgl_Kembali = $row['Tgl_Kembali'];
        $judul = $row['judul'];
        $nama = $row['nama'];
        $status = $row['status'];

          // Cek apakah data sudah ada di tbl_transaksi di db_kampus
          $sql_check = "SELECT * FROM tbl_transaksi WHERE nim = ? AND tgl_pinjam = ?";
          $stmt_check = $conn_kampus->prepare($sql_check);
          $stmt_check->bind_param("ss", $nim, $tgl_pinjam);
          $stmt_check->execute();
          $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            echo "Data dengan kode buku $kode_buku sudah ada di tbl_buku. Gagal input data.<br>";
        } else {
            // Insert data ke tbl_buku di db_kampus
            $sql_insert = "INSERT INTO  tbl_transaksi (nim, judul, nama, tgl_pinjam, tgl_kembali, status ) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn_kampus->prepare($sql_insert);
            $stmt_insert->bind_param("ssssss", $nim, $judul, $nama, $Tgl_Pinjam,  $Tgl_Kembali, $status);

            if ($stmt_insert->execute()) {
                $count_success++;
                echo "Data dengan NIM $nim dan kode buku $kode_buku berhasil diinput ke tbl_transaksi.<br>";
            } else {
                echo "Gagal memasukkan data dengan NIM $nim dan kode buku $kode_buku ke tbl_transaksi.<br>";
            }
        }

        // Menutup statement check
        $stmt_check->close();
    }

    // Tampilkan jumlah data yang berhasil diinput
    echo "<br>Jumlah data yang berhasil diinput: $count_success";
} else {
    echo "Tidak ada data di tabel buku.";
}

// Menutup koneksi
$conn_perpus->close();
$conn_kampus->close();
?>
