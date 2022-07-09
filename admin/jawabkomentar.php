<?php
$id_komentar=$_GET["id"];
//koneksi ke database
$ambil= $koneksi->query("SELECT * FROM komentar WHERE id_komentar='$id_komentar'");
$pecah=$ambil->fetch_assoc();
$id_produk=$pecah["id_produk"];
?>

<form method="post">
	<div class="form-group">
		<label>Jawab</label>
		<input  type="text" class="form-control" name="jawab">
	</div>
	<button class=" btn btn-primary" name="proses">Proses</button>
</form>
<?php  
if (isset($_POST["proses"])) 
{
	$id_pelanggan=3;
	$jawab=$_POST["jawab"];
	date_default_timezone_set("Asia/Jakarta");
	$tgl_komentar=date("Y-m-d H:i:s");
	$id_produk=$id_produk;

	$koneksi->query("INSERT INTO komentar (id_pelanggan, komentar, id_produk, tgl_komentar) 
		VALUES ('$id_pelanggan','$jawab', '$id_produk', '$tgl_komentar')");
	$koneksi->query("UPDATE komentar SET status='Sudah Dijawab'
		WHERE id_komentar='$id_komentar'");
	echo "<script>alert('Pembayaran Berhasil Diupdate')</script>";
	echo "<script>location='index.php?halaman=komentar';</script>";
}?>