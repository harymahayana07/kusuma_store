<h2>Tambah Kategori</h2>

<form method="post">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="kategori">
	</div>
	<button class="btn btn-primary" name="tambah">Tambah Kategori</button>
</form>
<?php 
if (isset($_POST['tambah']))
{
	$kategori =$_POST["kategori"];
	
	$koneksi->query("INSERT INTO kategori(nama_kategori)
		VALUES ('$kategori')");
	echo "<script> alert('Kategori Sudah Bertambah');</script>";
	

}


?>
	