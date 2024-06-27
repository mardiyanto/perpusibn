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
$sql_select = "SELECT npm, nama, kelas, no_hp, prodi, jurusan, ket FROM mahasiswa";
$result_select = $conn_perpus->query($sql_select);

if ($result_select->num_rows > 0) {
    // Loop melalui data yang diambil
    while ($row = $result_select->fetch_assoc()) {
        $nim = $row['npm'];
        $nama = $row['nama'];
        $kelas = $row['kelas'];
        $no_hp = $row['no_hp'];
        $prodi = $row['prodi'];
        $jurusan = $row['jurusan'];
        $ket = $row['ket'];

        // Cek apakah data sudah ada di tbl_anggota di db_kampus
        $sql_check = "SELECT * FROM tbl_anggota WHERE nim = ?";
        $stmt_check = $conn_kampus->prepare($sql_check);
        $stmt_check->bind_param("s", $nim);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            echo "Data dengan NIM $nim sudah ada di tbl_anggota. Gagal input data.<br>";
        } else {
            // Insert data ke tbl_anggota di db_kampus
            $sql_insert = "INSERT INTO tbl_anggota (nim, nama, kelas, no_hp, prodi, jurusan) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn_kampus->prepare($sql_insert);
            $stmt_insert->bind_param("ssssss", $nim, $nama, $kelas, $no_hp, $prodi, $jurusan);

            if ($stmt_insert->execute()) {
                $count_success++;
                echo "Data dengan NIM $nim berhasil diinput ke tbl_anggota.<br>";
            } else {
                echo "Gagal memasukkan data dengan NIM $nim ke tbl_anggota.<br>";
            }
        }

        // Menutup statement check
        $stmt_check->close();
    }

    // Tampilkan jumlah data yang berhasil diinput
    echo "<br>Jumlah data yang berhasil diinput: $count_success";
} else {
    echo "Tidak ada data di tabel mahasiswa.";
}

// Menutup koneksi
$conn_perpus->close();
$conn_kampus->close();
?>
