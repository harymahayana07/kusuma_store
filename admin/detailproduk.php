<?php  
$id_produk=$_GET["id"];

$ambil=$koneksi->query("SELECT*FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE id_produk='$id_produk'");
$detailproduk=$ambil->fetch_assoc();

$fotoproduk=array();
$ambilfoto=$koneksi->query("SELECT*FROM produk_foto WHERE id_produk='$id_produk'");
WHILE($tiap=$ambilfoto->fetch_assoc())
{
	$fotoproduk[]=$tiap;
}

?>

<table class="table table bordered">
	<tr>
		<th>Kategori</th>
		<th>: <?php echo $detailproduk["nama_kategori"] ?></th>
	</tr>
	<tr>
		<th>Produk</th>
		<th>: <?php echo $detailproduk["nama_produk"] ?></th>
	</tr>
	<tr>
		<th>Harga</th>
		<th>: Rp. <?php echo number_format($detailproduk["harga_produk"] );?></th>
	</tr>
	<tr>
		<th>Berat</th>
		<th>: <?php echo number_format($detailproduk["berat_produk"]); ?> Gram</th>
	</tr>
	<tr>
		<th>Deskripsi</th>
		<th>: <?php echo $detailproduk["deskripsi_produk"] ?></th>
	</tr>
	<tr>
		<th>Stok</th>
		<th>: <?php echo $detailproduk["stok_produk"] ?></th>
	</tr>
</table>

<div class="row">
	<?php foreach ($fotoproduk as $key => $value): ?>
		
	
	<div class="col-md-3">
		<img src="../foto_produk/<?php echo $value["nama_produk_foto"] ?>" alt="" class="img-responsive">
		<a href="index.php?halaman=hapusfotoproduk&idfoto=<?php echo $value["id_produk_foto"] ?>&idproduk=<?php echo $id_produk ?>" class="btn btn-danger btn-sm">Hapus</a>
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

<?php  
if (isset($_POST["simpan"])) 
{
	$lokasifoto=$_FILES["fotomu"]["tmp_name"];
	$namafoto=$_FILES["fotomu"]["name"];


	$namafoto=date("YmdHis").$namafoto;
	//upload
	move_uploaded_file($lokasifoto, "../foto_produk/".$namafoto);
	$koneksi->query("INSERT INTO produk_foto(id_produk, nama_produk_foto)VALUES('$id_produk','$namafoto')");

	echo "<script>alert('foto produk berhasil disimpan');</script>";
	echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>";

}

?>