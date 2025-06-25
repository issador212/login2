<?php 
	session_start();
	if (empty($_SESSION['username']) or empty($_SESSION['level']))  {
		echo "<script>alert('Maaf, Anda Belum Login!')
			document.location='index.php'</script>";
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboar Pegawai</title>
	<!-- Bootstrap core CSS -->
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<div class="container">
		<div class="jumbotron bg-info text-white">
			  <h1 class="display-4">Assalaamu'alaikum, <b><?= $_SESSION['nama_lengkap'] ?></b></h1>
			  <p class="lead">Selamat Datang..., Anda Berhasil Login Sebagai <b><?= $_SESSION['level'] ?></b></p>
			  <hr class="my-4">
			  <a class="btn btn-danger btn-lg" href="logout.php" role="button">LOG OUT</a>
		</div>

		<div class="card">
		  <div class="card-header bg-info text-white">
		    Form Ganti Password (Abaikan jika anda tidak ingin ganti Password)
		  </div>
		  <div class="card-body">
			<form method="post" action="ganti_password_pegawai.php">
				<input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
			  <div class="form-group">
			    <label>Masukkan Password Lama Anda</label>
			    <input type="password" class="form-control" name="password_lama" required>
			  </div>
			  <div class="form-group">
			    <label>Masukkan Password Baru Anda</label>
			    <input type="password" class="form-control" name="password_baru" required>
			  </div>
			  <div class="form-group">
			    <label>Konfirmasi Password Baru Anda</label>
			    <input type="password" class="form-control" name="konfirmasi_password" required>
			  </div>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <button type="reset" class="btn btn-danger">Batal</button>
			</form>
		  </div>
		</div>
	</div>
</body>
</html>