<?php 

	// panggil koneksi database
	include "koneksi.php";

	//enkripsi inputan password lama
	$password_lama = md5($_POST['password_lama']);

	// panggil username
	$username = $_POST['username'];

	// uji jika password lama sesuai
	$tampil = mysqli_query($koneksi, "SELECT * from tbl_user WHERE
					username = '$username' and password = '$password_lama' ");
	$data = mysqli_fetch_array($tampil);
	// jika data ditemukan, maka password sesuai
	if ($data){
		
		// uji jika password baru dan konfirmasi password baru, sama
		$password_baru = $_POST['password_baru'];
		$konfirmasi_password = $_POST['konfirmasi_password'];

		if ($password_baru == $konfirmasi_password) {
			// proses ganti password
			// enkripsi password dengan MD5
			$password_ok = md5($konfirmasi_password);
			$ubah = mysqli_query($koneksi, "UPDATE tbl_user set password = '$password_ok' 
				WHERE id = '$data[id]' ");

				if($ubah){
					echo "<script>alert('Password Anda Berhasil diubah, Silahkan Logout untuk mencoba Password Baru Anda')
						document.location='home_pegawai.php'</script>";
				}
		}else{
			echo "<script>alert('Maaf, Password Baru dan Konfirmasi Password yang Anda inputkan tidak sama / Salah!')
			document.location='home_pegawai.php'</script>";
		}
	}else{
		echo "<script>alert('Maaf, Password Lama Anda tidak terdaftar / Salah!')
			document.location='home_pegawai.php'</script>";
	}
 ?>