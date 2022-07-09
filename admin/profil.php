<h2>Profil</h2>
<?php $ambil=$koneksi->query("SELECT*FROM toko");
$detpem=$ambil->fetch_assoc() ?>
<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama Toko</th>
				<th><?php  echo $detpem['namatoko'] ?></th>
			</tr>
			<tr>
				<th>Email Toko</th>
				<th><?php  echo $detpem['email'] ?></th>
			</tr>
			<tr>
				<th>Telepon Toko</th>
				<th><?php  echo $detpem['telepon'] ?></th>
			</tr>
			<tr>
				<th>Provinsi</th>
				<th><?php  echo $detpem['provinsi'] ?></th>
			</tr>
			<tr>
				<th>Distrik</th>
				<th><?php echo $detpem['tipe'] ?> <?php  echo $detpem['distrik'] ?></th>
			</tr>
			<tr>
				<th>Alamat Lengkap</th>
				<th><?php  echo $detpem['alamat'] ?></th>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<img src="../tema/<?php echo $detpem['fotoprofil'] ?>" alt="" class="img-responsive" width="150">
	</div>
</div>
<?php
$tema=array();
$ambilfoto=$koneksi->query("SELECT*FROM tema");
WHILE($tiap=$ambilfoto->fetch_assoc())
{
	$tema[]=$tiap;
}

?>
<a href="index.php?halaman=ubahprofil" class= "btn btn-info btn-lg"><i class="fa fa-pencil-square-o" arial-hidden="true"></i></a><br><hr>
<div class="container">		
<!-- Tombol untuk menampilkan modal-->
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-cogs"></i> Atur Tema</button>




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">

	<div class="modal-dialog">
		<!-- konten modal-->
		<div class="modal-content">
			<!-- heading modal -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title">Ganti Tema</h2>
			</div>
			<!-- body modal -->
			<div class="row">
				<?php foreach ($tema as $key => $value): ?>
					
				
				<div class="col-md-3">
					<img src="../tema/<?php echo $value["tema"] ?>" alt="" class="img-responsive">
					<a href="index.php?halaman=hapustema&id=<?php echo $value["id_tema"] ?>" class="btn btn-danger btn-sm">Hapus</a>
				</div>
				<?php endforeach ?>
			</div>

			<hr>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>File Foto</label>
				<input type="file" name="fotomu">
			</div>
			<button class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
		</form>
		<!-- footer modal -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>

<?php  
if (isset($_POST["simpan"])) 
{
	$lokasifoto=$_FILES["fotomu"]["tmp_name"];
	$namafoto=$_FILES["fotomu"]["name"];


	$namafoto=date("YmdHis").$namafoto;
	//upload
	move_uploaded_file($lokasifoto, "../tema/".$namafoto);
	$koneksi->query("INSERT INTO tema(id_tema, tema)VALUES('$id_tema','$namafoto')");

	echo "<script>alert('foto produk berhasil disimpan');</script>";
	echo "<script>location='index.php?halaman=profil';</script>";

}

?>
</div>
</div>
