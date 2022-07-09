<?php include 'koneksi.php'; ?>
<?php include 'menu.php'; ?><br><br><br>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-3">Nama</label>
							<div class="col-md-7">
								<input type="text" name="nama" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-7">
								<input type="email" name="email" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-7">
								<input type="text" name="password" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Alamat</label>
							<div class="col-md-7">
								<textarea class="form-control " name="alamat" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Telepon</label>
							<div class="col-md-7">
								<input type="text" name="telepon" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button class="btn btn-primary" name="daftar">Daftar</button>
							</div>
						</div>
						
					</form>
					<?php  
					if (isset($_POST["daftar"])) 
					{
						$nama = $_POST['nama'];
						$email = $_POST['email'];
						$password = $_POST['password'];
						$alamat = $_POST['alamat'];
						$telepon = $_POST['telepon'];

						//cek apakah email sudah ada
						$ambil=$koneksi->query("SELECT*FROM pelanggan 
							WHERE email_pelanggan='$email'");
						$yangcocok=$ambil->num_rows;
						if ($yangcocok==1) 
						{
							echo "<script>alert('pendaftaran gagal, email sudah ada')</script>";
							echo "<script>location='daftar.php';</script>";
						}
						else
						{
							$koneksi->query("INSERT INTO pelanggan
								(nama_pelanggan, email_pelanggan,  password_pelanggan, alamat, telepon_pelanggan)
								VALUES('$nama','$email','$password','$alamat','$telepon')");

							echo "<script>alert('pendaftaran berhasil')</script>";
							echo "<script>location='login.php';</script>";
						}
					}
					?>
				</div>
			</div>
			
		</div>
		
	</div>
	
</div>
<?php include 'footer.php'; ?>
</body>
</html>