<h2>Ubah Kategori</h2>
<?php 
$ambil = $koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>
<form method="post">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="kategori" value=" <?php echo $pecah['nama_kategori'];?>">
	</div>
	<button class="btn btn-primary" name="ubah">Ubah Kategori</button>
</form>

<?php 
if (isset($_POST['ubah']))
{
	$koneksi->query("UPDATE kategori SET nama_kategori='$_POST[kategori]' WHERE id_kategori='$_GET[id]'");
	echo "<script>alert('kategori sudah diubah');</script>";
	echo "<script>location='index.php?halaman=kategori';</script>";


}



?>
	

