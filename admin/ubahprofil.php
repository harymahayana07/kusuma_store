<h2>Ubah Profil</h2>
<script src="assets/js/jquery.min.js"></script>
<?php $ambil=$koneksi->query("SELECT*FROM toko");
$detpem=$ambil->fetch_assoc() ?>
<form method="post" enctype="multipart/form-data">
	<div class="row">
		
		<div class="form-group">
			<label >Nama Toko</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $detpem['namatoko'] ?>">
		</div>
		<div class="form-group">
			<label >Email</label>
			<input type="email" name="email" class="form-control" value="<?php echo $detpem['email'] ?>">
		</div>
		<div class="form-group">
			<label >Telepon</label>
			<input type="number" name="telepon" class="form-control" required="">
		</div>

	
		<div class="form-group">
			<label>Provinsi</label>
			<select class="form-control" name="provinsi" required="" >	
			</select>
		</div>
	
	
		<div class="form-group">
			<label>Kota/Kabupaten</label>
			<select class="form-control" name="distrik" required="">
			</select>
		</div>
	

		<div class="form-group">
			<label>Alamat Lengkap</label>
			<textarea class="form-control" name="alamat" placeholder="Masukkan Alamat" required="" ></textarea>
		</div>
		
	</div>
	<div class="form-group">

 		<img src="../fotoprofil/<?php echo $detpem['fotoprofil']; ?>" width="200">

 	</div>

 	<div class="form-group">
		<label> Ganti Foto</label>
		<input type="file" class="form-control" name="foto">
		<p class="text-danger">Foto Max 1 MB</p>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah</button><br><br>
	<input type="text" name="provinsi">
			<input type="text" name="distrik_id">
			<input type="text" name="distrik">
			<input type="text" name="tipe">
</form>
			

<?php  
if (isset($_POST["ubah"])) 
{
	$fototoko = $_FILES['foto']['name'];
	$lokasifoto= $_FILES['foto']['tmp_name'];
	$id_distrik=$_POST["distrik_id"];
	$distrik=$_POST["distrik"];
	$nama=$_POST["nama"];
	$email=$_POST["email"];
	$telepon=$_POST["telepon"];
	$tipe=$_POST["tipe"];
	$alamat=$_POST["alamat"];

	if(!empty($lokasifoto)){
	move_uploaded_file($lokasifoto, "../fotoprofil/$fototoko");
	$koneksi->query("UPDATE toko SET namatoko='$nama', email='$email', telepon='$telepon', provinsi='$_POST[provinsi]', tipe='$tipe', distrik_id='$id_distrik', distrik='$distrik', alamat='$alamat', fotoprofil='$fototoko'");

	}
 	else{

 	$koneksi->query("UPDATE toko SET namatoko='$nama', email='$email', telepon='$telepon', provinsi='$_POST[provinsi]', tipe='$tipe', distrik_id='$id_distrik', distrik='$distrik', alamat='$alamat'");
 	}
	echo "<script>alert('Profil Berhasil Diubah')</script>";
	echo "<script>location='index.php?halaman=profil';</script>";
}?>

<script >
		$(document).ready(function(){
			$.ajax({
				type:'post',
				url:'dataprovinsi.php',
				success:function(hasil_provinsi)
				{
					$("select[name=provinsi]").html(hasil_provinsi);
				}
			});
			$("select[name=provinsi").on("change",function(){
				var	id_provinsi_terpilih=$("option:selected",this).attr("id_provinsi");
				$.ajax({
					type:'post',
					url:'datadistrict.php',
					data: 'id_provinsi='+id_provinsi_terpilih,
					success:function(hasil_distrik)
					{
						$("select[name=distrik]").html(hasil_distrik);
					}
				})
			});
			$("select[name=distrik]").on("change", function(){
				var prov=$("option:selected",this).attr("provinsi");
				var iddist=$("option:selected", this).attr("distrik_id");
				var dist=$("option:selected", this).attr("distrik");
				var tipe=$("option:selected", this).attr("tipe");
				// alert(prov);
				$("input[name=provinsi]").val(prov);
				$("input[name=distrik_id]").val(iddist);
				$("input[name=distrik]").val(dist);
				$("input[name=tipe]").val(tipe);


			});
		});
</script>