<?php
include "../../config/koneksi.php";
$act=$_GET['act'];

$date = date('Y-m-d');
$jam = date('H:i:s');
$waktu = $date.' '.$jam;

if($act=='inputbuku'){
	if (empty($_POST['judul']) || empty($_POST['penerbit']) || empty($_POST['pengarang']) || empty($_POST['thn_terbit']) || empty($_POST['lokasi'])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('javascript:history.go(-1)')</script>";
		exit;
	}
	
	// Folder tujuan upload file
	$eror       = false;
	$pesan      = '';
	$folder     = '../../foto/fileupload/';
	$tanggal    = date("dmYhis");
	$file       = $_FILES['gambar']['tmp_name'];
	$file_name  = $_FILES['gambar']['name'];
	
	// Check jika gambar ada dan copy gambar ke folder tujuan
	if (!empty($file)) {
		$gambar_name = $tanggal . "_" . uniqid() . ".jpg";
		copy($file, "../../foto/data/" . $gambar_name);
	}
	
	// Type file yang bisa diupload
	$file_type  = array('doc', 'docx', 'pdf');
	// Ukuran maximum file yang dapat diupload
	$max_size   = 10000000; // 10MB
	
	if (isset($_POST['btnUpload'])) {
		// Mulai memproses data upload
		$upload_file_name  = $_FILES['data_upload']['name'];
		$upload_file_size  = $_FILES['data_upload']['size'];
		$upload_file_tmp   = $_FILES['data_upload']['tmp_name'];
	
		// Jika file upload tidak kosong, lakukan pengecekan
		if (!empty($upload_file_name)) {
			$explode    = explode('.', $upload_file_name);
			$extensi    = end($explode);
	
			// Check apakah type file sudah sesuai
			if (!in_array($extensi, $file_type)) {
				$eror   = true;
				$pesan .= "<script>window.alert('Type file yang Anda upload tidak sesuai');
				window.location=('../index.php?aksi=buku')</script>";
			}
			if ($upload_file_size > $max_size) {
				$eror   = true;
				$pesan .= "<script>window.alert('Ukuran file melebihi batas maksimum 10 MB');
				window.location=('../index.php?aksi=buku')</script>";
			}
	
			// Jika terjadi error, tampilkan pesan error
			if ($eror) {
				echo '<div id="eror">' . $pesan . '</div>';
				exit;
			}
	
			// Jika tidak ada error, buat nama file unik dan proses upload file
			$unique_upload_file_name = $tanggal . "_" . uniqid() . "." . $extensi;
			if (!move_uploaded_file($upload_file_tmp, $folder . $unique_upload_file_name)) {
				echo "<script>window.alert('Proses upload $upload_file_name gagal');
				window.location=('../index.php?aksi=buku')</script>";
				exit;
			}
		}
	
		// Catat nama file ke database
		$gambar = !empty($file) ? $gambar_name : '';
		$file_upload = !empty($upload_file_name) ? $unique_upload_file_name : '';
	
		$query = "INSERT INTO tbl_buku 
			(barkode, judul, jenis_buku, list, pengarang, penerbit, thn_terbit, isbn, jlh_hal, gambar, jumlah_buku, lokasi, tgl_input, file_upload) 
			VALUES 
			('$_POST[barkode]', '$_POST[judul]', '$_POST[jenis_buku]', '$_POST[list]', '$_POST[pengarang]', '$_POST[penerbit]', '$_POST[thn_terbit]', '$_POST[isbn]', '$_POST[jlh_hal]', '$gambar', '$_POST[jumlah_buku]', '$_POST[lokasi]', '$date', '$file_upload')";
	
		if (mysqli_query($koneksi, $query)) {
			echo "<script>window.location=('../index.php?aksi=buku')</script>";
		} else {
			echo "<script>window.alert('Proses penyimpanan data gagal');
			window.location=('../index.php?aksi=buku')</script>";
		}
	}
}
elseif($act=='editbuku'){
    if (empty($_POST['judul']) || empty($_POST['penerbit']) || empty($_POST['pengarang']) || empty($_POST['thn_terbit']) || empty($_POST['lokasi'])) {
		echo "<script>window.alert('Data yang Anda isikan belum lengkap');
		window.location=('javascript:history.go(-1)')</script>";
		exit;
	}
	
	// Folder tujuan upload file
	$eror       = false;
	$pesan      = '';
	$folder     = '../../foto/fileupload/';
	$tanggal    = date("dmYhis");
	
	// Ambil data gambar dan file upload yang ada di database
	$id_buku = $_GET['id_buku'];
	$query = "SELECT gambar, file_upload FROM tbl_buku WHERE id_buku='$id_buku'";
	$result = mysqli_query($koneksi, $query);
	$row = mysqli_fetch_assoc($result);
	
	$old_gambar = $row['gambar'];
	$old_file_upload = $row['file_upload'];
	
	// Proses upload gambar baru jika ada
	$file       = $_FILES['gambar']['tmp_name'];
	$file_name  = $_FILES['gambar']['name'];
	
	if (!empty($file)) {
		$gambar_name = $tanggal . "_" . uniqid() . ".jpg";
		if (move_uploaded_file($file, "../../foto/data/" . $gambar_name)) {
			if (!empty($old_gambar) && file_exists("../../foto/data/" . $old_gambar)) {
				unlink("../../foto/data/" . $old_gambar);
			}
		} else {
			echo "<script>window.alert('Proses upload gambar gagal');
			window.location=('../index.php?aksi=buku')</script>";
			exit;
		}
	} else {
		$gambar_name = $old_gambar;
	}
	
	// Type file yang bisa diupload
	$file_type  = array('doc', 'docx', 'pdf');
	// Ukuran maksimum file yang dapat diupload
	$max_size   = 10000000; // 10MB
	
	// Proses upload file data baru jika ada
	$upload_file_name  = $_FILES['data_upload']['name'];
	$upload_file_size  = $_FILES['data_upload']['size'];
	$upload_file_tmp   = $_FILES['data_upload']['tmp_name'];
	
	if (!empty($upload_file_name)) {
		$explode    = explode('.', $upload_file_name);
		$extensi    = end($explode);
	
		// Check apakah type file sudah sesuai
		if (!in_array($extensi, $file_type)) {
			$eror   = true;
			$pesan .= "<script>window.alert('Type file yang Anda upload tidak sesuai');
			window.location=('../index.php?aksi=buku')</script>";
		}
		if ($upload_file_size > $max_size) {
			$eror   = true;
			$pesan .= "<script>window.alert('Ukuran file melebihi batas maksimum 10 MB');
			window.location=('../index.php?aksi=buku')</script>";
		}
	
		// Jika terjadi error, tampilkan pesan error
		if ($eror) {
			echo '<div id="eror">' . $pesan . '</div>';
			exit;
		}
	
		// Jika tidak ada error, buat nama file unik dan proses upload file
		$unique_upload_file_name = $tanggal . "_" . uniqid() . "." . $extensi;
		if (move_uploaded_file($upload_file_tmp, "../../foto/fileupload/". $unique_upload_file_name)) {
			if (!empty($old_file_upload) && file_exists("../../foto/fileupload/" . $old_file_upload)) {
				unlink($folder . $old_file_upload);
			}
		} else {
			echo "<script>window.alert('Proses upload $upload_file_name gagal');
			window.location=('../index.php?aksi=buku')</script>";
			exit;
		}
	} else {
		$unique_upload_file_name = $old_file_upload;
	}
	
	// Update data di database
	$query = "UPDATE tbl_buku SET 
		judul='$_POST[judul]', 
		jenis_buku='$_POST[jenis_buku]', 
		list='$_POST[list]', 
		pengarang='$_POST[pengarang]', 
		penerbit='$_POST[penerbit]', 
		thn_terbit='$_POST[thn_terbit]', 
		isbn='$_POST[isbn]', 
		jlh_hal='$_POST[jlh_hal]', 
		gambar='$gambar_name', 
		jumlah_buku='$_POST[jumlah_buku]', 
		lokasi='$_POST[lokasi]', 
		tgl_input='$date', 
		file_upload='$unique_upload_file_name' 
		WHERE id_buku='$id_buku'";
	
	if (mysqli_query($koneksi, $query)) {
		echo "<script>window.location=('../index.php?aksi=buku')</script>";
	} else {
		echo "<script>window.alert('Proses pembaruan data gagal');
		window.location=('../index.php?aksi=buku')</script>";
	}

}

elseif($act=='hapus'){
   // Periksa apakah parameter 'id_buku' ada
if (!isset($_GET['id_buku'])) {
    echo "<script>window.alert('ID buku tidak ditemukan');
    window.location=('../index.php?aksi=buku')</script>";
    exit;
}

// Dapatkan ID buku dari parameter
$id_buku = $_GET['id_buku'];

// Ambil data gambar dan file upload yang ada di database
$query = "SELECT gambar, file_upload FROM tbl_buku WHERE id_buku='$id_buku'";
$result = mysqli_query($koneksi, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $gambar = $row['gambar'];
    $file_upload = $row['file_upload'];

    // Hapus file gambar jika ada
    if (!empty($gambar) && file_exists("../../foto/data/" . $gambar)) {
        unlink("../../foto/data/" . $gambar);
    }

    // Hapus file upload jika ada
    if (!empty($file_upload) && file_exists("../../foto/fileupload/" . $file_upload)) {
        unlink("../../foto/fileupload/" . $file_upload);
    }

    // Hapus data buku dari database
    $query = "DELETE FROM tbl_buku WHERE id_buku='$id_buku'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>window.location=('../index.php?aksi=buku')</script>";
    } else {
        echo "<script>window.alert('Proses penghapusan data gagal');
        window.location=('../index.php?aksi=buku')</script>";
    }
} else {
    echo "<script>window.alert('Data buku tidak ditemukan');
    window.location=('../index.php?aksi=buku')</script>";
}
}
?>
