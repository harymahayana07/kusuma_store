	<script type="text/javascript" src="admin/assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="admin/assets/js/bootstrap.min.js"></script>	
<div class="container">		
<!-- Tombol untuk menampilkan modal-->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i> Ganti Profil</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- konten modal-->
		<div class="modal-content"><br><br>
			<!-- heading modal -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title">Keranjang Belanja</h2>
			</div>
<?php
include 'koneksi.php';
if (!isset($_SESSION["pelanggan"])) 
{
	echo "<script> alert('anda belum login');</script>";
	echo "<script> location ='login.php';</script>";
}
$id_pelanggan= $_SESSION["pelanggan"]['id_pelanggan'];
$ambil= $koneksi->query("SELECT *FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah=$ambil->fetch_assoc();?>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label >Nama</label>
				<input type="text" name="nama" class="form-control"  value="<?php echo $pecah["nama_pelanggan"] ?>">
				
			</div>
			<div class="form-group">
				<label >Email</label>
				
				<input type="email" name="email" class="form-control" value="<?php echo $pecah["email_pelanggan"] ?>" >
			
			</div>
			<div class="form-group">
				<label >Password</label>
				<input type="password" name="password" class="form-control" value="<?php echo $pecah["password_pelanggan"] ?>">
				
			</div>
			<div class="form-group">
				<label >Telepon</label>
				<input type="number" name="telepon" class="form-control" value="<?php echo $pecah["telepon_pelanggan"] ?>">
				
			</div>
			<div class="form-group">
				<label >Alamat</label>
				<textarea class="form-control" name="alamat" value="<?php echo $pecah["alamat"] ?>"></textarea>
				
			</div>
			<div class="form-group">
				<label >Foto Profil</label>
				<input type="file" name="foto" class="form-control">
				<p class="text-danger">Foto, Max 1 MB</p>
			</div>
			<button class="btn btn-primary" name="ubah">Simpan</button>
		</form>
<?php  
if (isset($_POST["ubah"])) 
{
	$fototoko = $_FILES['foto']['name'];
	$lokasifoto= $_FILES['foto']['tmp_name'];
	$nama=$_POST["nama"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$telepon=$_POST["telepon"];
	$alamat=$_POST["alamat"];

	if(!empty($lokasifoto)){
	move_uploaded_file($lokasifoto, "fotoprofil/$fototoko");
	$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama', email_pelanggan='$email', password_pelanggan='$password', telepon_pelanggan='$telepon',  alamat='$alamat', fotoprofil='$fototoko' where id_pelanggan='$id_pelanggan'");

	}
	else{

	$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$nama', email_pelanggan='$email', password_pelanggan='$password', telepon_pelanggan='$telepon',  alamat='$alamat' where id_pelanggan='$id_pelanggan'");

 	}
	echo "<script>alert('Profil Berhasil Diubah')</script>";
	echo "<script>location='profil.php';</script>";
}

?>
		<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
		</div>

	</div>
</div>