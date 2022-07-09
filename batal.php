<?php 
session_start();
include 'koneksi.php';
$id_pembelian=$_GET["id"];
$ambil= $koneksi->query("SELECT*FROM pembelian_produk WHERE id_pembelian='$id_pembelian'");
				while($perproduk=$ambil->fetch_assoc())
				$id_produk=$perproduk['id_produk'];
				$jumlah=$perproduk['jumlah'];

$koneksi->query("UPDATE produk SET stok_produk='stok_produk -$jumlah'
WHERE id_produk='$id_produk'");		
echo "<script>alert('batal');</script>";
echo "<script>location='riwayat.php';</script>";

?>

