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
$sql_select = "SELECT kode, judul, pengarang, penerbit, th_terbit, jlh_hal, kode_perpus, no_lemari, stok FROM buku";
$result_select = $conn_perpus->query($sql_select);

if ($result_select->num_rows > 0) {
    // Loop melalui data yang diambil
    while ($row = $result_select->fetch_assoc()) {
        $kode_buku = $row['kode'];
        $judul = $row['judul'];
        $pengarang = $row['pengarang'];
        $penerbit = $row['penerbit'];
        $th_terbit = $row['th_terbit'];
        $jlh_hal = $row['jlh_hal'];
        $kode_perpus = $row['kode_perpus'];
        $no_lemari = $row['no_lemari'];
        $stok = $row['stok'];

        // Cek apakah data sudah ada di tbl_buku di db_kampus
        $sql_check = "SELECT * FROM tbl_buku WHERE barkode = ?";
        $stmt_check = $conn_kampus->prepare($sql_check);
        $stmt_check->bind_param("s", $kode_buku);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            echo "Data dengan kode buku $kode_buku sudah ada di tbl_buku. Gagal input data.<br>";
        } else {
            // Insert data ke tbl_buku di db_kampus
            $sql_insert = "INSERT INTO tbl_buku (barkode, judul, pengarang, penerbit, thn_terbit, isbn, jlh_hal, jumlah_buku, lokasi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn_kampus->prepare($sql_insert);
            $stmt_insert->bind_param("sssssssss", $kode_buku, $judul, $pengarang, $penerbit, $th_terbit, $kode_perpus, $jlh_hal, $stok, $no_lemari);

            if ($stmt_insert->execute()) {
                $count_success++;
                echo "Data dengan kode buku $kode_buku berhasil diinput ke tbl_buku.<br>";
            } else {
                echo "Gagal memasukkan data dengan kode buku $kode_buku ke tbl_buku.<br>";
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
