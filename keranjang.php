<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['keranjang']) or !isset($_SESSION["keranjang"])) {
	echo "<script> alert('Keranjang Kosong');</script>";
	echo "<script> location ='index.php';</script>";
}
?>
<?php include 'menu.php'; ?><br><br><br>
<!DOCTYPE html>
<html>

<head>
	<title>Keranjang Belanja</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>

<body>


	<main>
		<div style="margin-top: 50px;">
			<section class="konten">
				<div class="container">
					<div class="thumbnail" style="background-color: #E8D5A0;">
						<div class="col-md-5" style="margin-bottom: 30px;">
							<h3 class="bg-dark"><strong>KERANJANG BELANJA</strong></h3>
						</div>
						<table class="table table-striped" style="margin-bottom: 50px;">
							<thead>
								<tr>
									<th>No</th>
									<th>Produk</th>
									<th>Harga</th>
									<th>Jumlah Beli</th>
									<th>Total Harga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
									<?php
									$ambil = $koneksi->query("SELECT * FROM produk 
					WHERE id_produk='$id_produk'");
									$pecah = $ambil->fetch_assoc();
									$totalharga = $pecah["harga_produk"] * $jumlah;
									?>
									<tr>
										<td><?php echo $nomor; ?></td>
										<td><?php echo $pecah['nama_produk']; ?></td>
										<td>Rp <?php echo number_format($pecah['harga_produk']); ?></td>
										<td><?php echo $jumlah; ?></td>
										<td>Rp <?php echo number_format($totalharga); ?></td>
										<td>
											<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a>
										</td>
									</tr>
									<?php $nomor++; ?>
								<?php endforeach ?>
							</tbody>
						</table>
&emsp;
						<a href="index.php" class="btn btn-default"><i class="fa fa-cart-plus"></i>Lanjutkan Belanja</a>
						<a href="checkout.php" class="btn btn-primary">Checkout</a>
						<br><br>
					</div>

				</div>
			</section>
		</div>
	</main>
</body>

</html>