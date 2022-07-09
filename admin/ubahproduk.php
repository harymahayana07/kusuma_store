<h2>Ubah Produk</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$am = $koneksi->query("SELECT * FROM produk_foto WHERE id_produk='$_GET[id]'");
$pe = $am->fetch_assoc();
// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>
<?php
$datakategori=array();
$ambil= $koneksi->query("SELECT * FROM kategori");
while($tiap=$ambil->fetch_assoc())
{
	$datakategori[]=$tiap;
}
?>

 <form method="post" enctype="multipart/form-data">
 	
 	<div class="form-group">
 		<label>Nama Produk</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'];?>">
 	</div>

 	<div class="form-group">
 		<label>Nama Kategori</label>
 		<select class="form-control" name="id_kategori">
 			<option value="">Pilih Kategori</option>
 			<?php foreach ($datakategori as $key => $value): ?>

 			<option value="<?php echo $value["id_kategori"] ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]) {echo "selected";}?>><?php echo $value["nama_kategori"] ?></option>
 				
 			<?php endforeach ?>
 		</select>
 	</div>

 	<div class="form-group">
 		<label>Harga Rp</label>
 		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>" >
 	</div>
 	<div class="form-group">
 		<label>Berat gr</label>
 		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>" >
 	</div>

 	<div class="form-group">

 		<img src="../foto produk/<?php echo $pecah['foto_produk']; ?>" width="200">

 	</div>

 	<div class="form-group">
		<label> Ganti Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
 	
 	<div class="form-group">
 		<label>Deskripsi</label>
 		<textarea name="deskripsi" class="form-control" id="deskripsi" rows="10">
 			<?php  echo $pecah ['deskripsi_produk']; ?>
 		</textarea>
 	</div>
 	<div class="form-group">
 		<label>Stok Produk</label>
 		<input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok_produk']; ?>" >
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 	<script>
                CKEDITOR.replace( 'deskripsi' );
        </script>
 </form>

 <?php  
 if (isset($_POST['ubah'])){

 	$namafoto=$_FILES['foto']['name'];
 	$lokasifoto=$_FILES['foto']['tmp_name'];
 	// $lokasifoto = $foto['tmp_name'];

 	if(!empty($lokasifoto)){
		move_uploaded_file($lokasifoto,"../foto_produk/$namafoto");

 		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',id_kategori='$_POST[id_kategori]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]',foto_produk='$namafoto', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");
 		
 	}
 	else{
 			$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', id_kategori='$_POST[id_kategori]',harga_produk='$_POST[harga]',berat_produk='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'");

 	}
	echo "<script>alert('data produk telah diubah');</script>";
	echo "<script>location='index.php?halaman=produk';</script>";
 }
 	?>

