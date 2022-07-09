<?php
session_start();
include 'koneksi.php';

?>
<?php include 'menu.php'; ?><br><br><br>
<!DOCTYPE html>
<html>

<head>
	<title>Nota Pembelian</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<script src="fontawesome/js/all.min.js"></script>
</head>

<body>



	<section class="konten">
		<div class="container">

			<!--nota disini copy dari folder admin-->
			<h2>Detail Pembelian</h2>
			<?php
			$ambil = $koneksi->query("SELECT*FROM pembelian JOIN pelanggan
	ON pembelian.id_pelanggan=pelanggan.id_pelanggan
	WHERE pembelian.id_pembelian='$_GET[id]'");
			$detail = $ambil->fetch_assoc();
			?>

			<?php

			$idpelangganyangbeli = $detail["id_pelanggan"];

			$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

			if ($idpelangganyangbeli !== $idpelangganyanglogin) {
				echo "<script> alert('Goblok Ojo Ngono');</script>";
				echo "<script> location ='riwayat.php';</script>";
			}
			?>

			<div class="row">
				<div class="col-md-4">
					<h3>Pembelian</h3>
					<strong>NO. PEMBELIAN: <?php echo $detail['id_pembelian']; ?></strong><br>
					<?php if (!empty($detail['resipengiriman'])) : ?> No Resi :
						<?php echo $detail['resipengiriman']; ?>
						<br><?php endif ?>
					Tanggal : <?php echo date("d F Y", strtotime($detail['tanggal_pembelian'])) ?><br>
					Total Bayar : Rp. <?php echo number_format($detail['total_pembelian']); ?>
				</div>
				<div class="col-md-4">
					<h3>Pelanggan</h3>
					<strong> NAMA : <?php echo $detail['nama_pelanggan']; ?> </strong><br>

					Telepon : <?php echo $detail['telepon_pelanggan']; ?><br>
					Email : <?php echo $detail['email_pelanggan']; ?>

				</div>
				<div class="col-md-4">
					<h3>Pengiriman</h3>
					<strong>ALAMAT : <?php echo $detail['tipe']; ?> <?php echo $detail['distrik']; ?> <?php echo $detail['provinsi']; ?></strong><br>
					Ekspedisi : <?php echo $detail['ekspedisi']; ?> <?php echo $detail['paket']; ?> <?php echo $detail['estimasi']; ?><br>
					Ongkos Kirim : Rp. <?php echo number_format($detail['ongkir']); ?><br>
					Alamat Pengiriman: <?php echo $detail['alamatpengiriman']; ?>
				</div>
			</div>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Berat</th>
						<th>Jumlah</th>
						<th>Ongkir</th>
						<th>Total Harga</th>
						<th>Subberat</th>
					</tr>
				</thead>
				<tbody>
					<?php $nomor = 1; ?>
					<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
					<?php while ($pecah = $ambil->fetch_assoc()) { ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah['nama']; ?></td>
							<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
							<td><?php echo $pecah['berat']; ?> Gram</td>
							<td><?php echo $pecah['jumlah']; ?></td>
							<td>Rp. <?php echo number_format($detail['ongkir']); ?></td>
							<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
							<td><?php echo $pecah['subberat'] ?> Gram</td>
						</tr>
						<?php $nomor++; ?>
					<?php } ?>
				</tbody>
			</table>
			<?php if ($detail['status_pembelian'] == "belum bayar") : ?>
				<div class="row">
					<div class="col-md-7">
						<div class="alert alert-info">
							<p>
								Silahkan Melakukan Pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> Ke <br>
								<strong>BANK MANDIRI 123-86544-7655 AN. KusumaStore</strong>
							</p>
						</div>
						<a href="pembayaran.php?id=<?php echo $detail["id_pembelian"] ?>" class="btn btn-danger">Pembayaran</a><br>
					</div>
					<div class="col-md-5">
						<a href="scan_qr.php" class="btn btn-success"> SCAN QR CODE</a>
					</div>
				</div>
			<?php else : ?>
				<a href="cetak.php?id=<?php echo $detail['id_pembelian'] ?>"><button class="btn btn-success "><i class="fa fa-print"></i>Cetak</button></a>
			<?php endif ?>




		</div>

	</section>

</body>

</html>