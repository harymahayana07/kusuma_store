<form method="post">
	<textarea class="form-control" name="isikomentar" placeholder="Isi Komentar"></textarea> <br> 
	<button class=" btn btn-primary" name="kirim"><i class="fa fa-paper-plane"></i> Kirim</button>
</form>
<?php if (isset($_POST["kirim"])) 
{
	
	if (!isset($_SESSION["pelanggan"])) 
	{
		echo "<script> alert('anda belum login');</script>";
		echo "<script> location ='login.php';</script>";
	}
	$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
	$isikomentar=$_POST["isikomentar"];
	date_default_timezone_set("Asia/Jakarta");
	$tgl_komentar=date("Y-m-d H:i:s");

	$koneksi->query("INSERT INTO komentar(id_pelanggan, id_produk, tgl_komentar, komentar)
	VALUES( '$id_pelanggan' , '$id_produk', '$tgl_komentar', '$isikomentar')");						
}
?>
