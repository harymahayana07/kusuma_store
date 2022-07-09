<?php
session_start();
include 'koneksi.php';
if (empty($_SESSION['keranjang']) or !isset($_SESSION["keranjang"])) {
	echo "<script> location ='index.php';</script>";
}
if (!isset($_SESSION["pelanggan"])) {
	echo "<script> alert('anda belum login');</script>";
	echo "<script> location ='login.php';</script>";
}
?>
<?php include 'menu.php'; ?><br><br><br>
<!DOCTYPE html>
<html>

<head>
	<title>Checkout</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<script src="admin/assets/js/jquery.min.js"></script>
</head>

<body>

	<main>
		<div style="margin-top: 50px;">
			<section class="konten">
				<div class="container">
					<div class="thumbnail" style="background-color: #E8D5A0;">
						<div class="col-md-5" style="margin-bottom: 30px;">
							<h3 class="bg-dark"><strong>CHECKOUT BELANJA</strong></h3>
						</div>

						<table class="table table-striped ">
							<thead>
								<tr>
									<th>No</th>
									<th>Produk</th>
									<th>Harga</th>
									<th>Jumlah Beli</th>
									<th>SubHarga</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor = 1; ?>
								<?php $totalberat = 0; ?>
								<?php $totalbelanja = 0; ?>
								<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
									<?php
									$ambil = $koneksi->query("SELECT * FROM produk 
					WHERE id_produk='$id_produk'");
									$pecah = $ambil->fetch_assoc();
									$totalharga = $pecah["harga_produk"] * $jumlah;
									$subberat = $pecah["berat_produk"] * $jumlah;
									$totalberat += $subberat;

									?>
									<tr>
										<td><?php echo $nomor; ?></td>
										<td><?php echo $pecah['nama_produk']; ?></td>
										<td>Rp <?php echo number_format($pecah['harga_produk']); ?></td>
										<td><?php echo $jumlah; ?></td>
										<td>Rp <?php echo number_format($totalharga); ?></td>
									</tr>
									<?php $nomor++; ?>
									<?php $totalbelanja += $totalharga; ?>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr>
									<th colspan="4">Total Belanja</th>
									<th>Rp. <?php echo number_format($totalbelanja) ?></th>
								</tr>
							</tfoot>
						</table>
						<form method="post">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
									</div>
								</div>

							</div>
							<div class="form-group">
								<label>Alamat Lengkap Pengiriman</label>
								<textarea class="form-control" name="alamatpengiriman" placeholder="Masukkan Alamat"></textarea>
							</div>

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Provinsi</label>
										<select class="form-control" name="nama_provinsi">

										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Kota/Kabupaten</label>
										<select class="form-control" name="nama_distrik">
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Ekspedisi</label>
										<select class="form-control" name="ekspedisi">

										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Paket</label>
										<select class="form-control" name="nama_paket">

										</select>
									</div>
								</div>
							</div>
							<input type="text" name="total_berat" value="<?php echo $totalberat; ?>">
							<input type="text" name="provinsi">
							<input type="text" name="distrik">
							<input type="text" name="tipe">
							<input type="text" name="kodepos">
							<input type="text" name="namaekspedisi">
							<input type="text" name="paket">
							<input type="text" name="ongkir">
							<input type="text" name="estimasi">
							<button class="btn btn-primary" name="checkout">Checkout</button>
						</form>
						<?php
						if (isset($_POST["checkout"])) {
							$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
							$tanggal_pembelian = date("Y-m-d");
							$alamatpengiriman = $_POST["alamatpengiriman"];
							$totalberat = $_POST["total_berat"];
							$provinsi = $_POST["provinsi"];
							$distrik = $_POST["distrik"];
							$tipe = $_POST["tipe"];
							$kodepos = $_POST["kodepos"];
							$paket = $_POST["paket"];
							$ongkir = $_POST["ongkir"];
							$estimasi = $_POST["estimasi"];
							$total_pembelian = $totalbelanja + $ongkir;

							//penyimpan data pembelian
							$koneksi->query(
								"INSERT INTO pembelian(
				id_pelanggan, tanggal_pembelian, total_pembelian, alamatpengiriman, totalberat, provinsi, distrik, tipe, kodepos, paket, ongkir, estimasi)
				VALUES('$id_pelanggan', '$tanggal_pembelian', '$total_pembelian', '$alamatpengiriman', '$totalberat', '$provinsi', '$distrik', '$tipe', '$kodepos', '$paket', '$ongkir', '$estimasi')"
							);
							$id_pembelian_barusan = $koneksi->insert_id;
							foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
								//mendapatkan data produk
								$ambil = $koneksi->query("SELECT*FROM produk WHERE id_produk='$id_produk'");
								$perproduk = $ambil->fetch_assoc();
								$nama = $perproduk['nama_produk'];
								$harga = $perproduk['harga_produk'];
								$berat = $perproduk['berat_produk'];

								$subberat = $perproduk['berat_produk'] * $jumlah;
								$subharga = $perproduk['harga_produk'] * $jumlah;
								$koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah)
					VALUES ('$id_pembelian_barusan','$id_produk', '$nama','$harga','$berat', '$subberat', '$subharga','$jumlah')");

								$koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
					WHERE id_produk='$id_produk'");
							}
							//mengkosongkan keranjang

							unset($_SESSION["keranjang"]);

							//tampilan diahlikan ke nota
							echo "<script> alert('Pembelian Sukses');</script>";
							echo "<script> location ='nota.php?id=$id_pembelian_barusan';</script>";
						}
						?>
					</div>
				</div>
			</section>
		</div>
	</main>


</body>

</html>
<script>
	$(document).ready(function() {
		$.ajax({
			type: 'post',
			url: 'dataprovinsi.php',
			success: function(hasil_provinsi) {
				$("select[name=nama_provinsi]").html(hasil_provinsi);
			}
		});
		$("select[name=nama_provinsi").on("change", function() {
			var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
			$.ajax({
				type: 'post',
				url: 'datadistrict.php',
				data: 'id_provinsi=' + id_provinsi_terpilih,
				success: function(hasil_distrik) {
					$("select[name=nama_distrik]").html(hasil_distrik);
				}
			});
		});
		$.ajax({
			type: 'post',
			url: 'dataekspedisi.php',
			success: function(hasil_ekspedisi) {
				$("select[name=ekspedisi]").html(hasil_ekspedisi);
			}
		});
		$("select[name=ekspedisi]").on("change", function() {
			var ekspedisi_terpilih = $("select[name=ekspedisi]").val();
			// alert(ekspedisi_terpilih);

			var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
			// alert(distrik_terpilih)

			var total_berat = $("input[name=total_berat]").val();
			$.ajax({
				type: 'post',
				url: 'datapaket.php',
				data: 'ekspedisi=' + ekspedisi_terpilih + '&distrik=' + distrik_terpilih + '&berat=' + total_berat,
				success: function(hasil_paket) {
					// console.log(hasil_paket);
					$("select[name=nama_paket]").html(hasil_paket);

					$("input[name=namaekspedisi]").val(ekspedisi_terpilih);
				}
			})
		});
		$("select[name=nama_distrik]").on("change", function() {
			var prov = $("option:selected", this).attr("nama_provinsi");
			var dist = $("option:selected", this).attr("nama_distrik");
			var tipe = $("option:selected", this).attr("tipe_distrik");
			var kodepos = $("option:selected", this).attr("kodepos");
			// alert(prov);
			$("input[name=provinsi]").val(prov);
			$("input[name=distrik]").val(dist);
			$("input[name=tipe]").val(tipe);
			$("input[name=kodepos]").val(kodepos);


		});
		$("select[name=nama_paket]").on("change", function() {
			var paket = $("option:selected", this).attr("paket");
			var ongkir = $("option:selected", this).attr("ongkir");
			var etd = $("option:selected", this).attr("etd");
			$("input[name=paket]").val(paket);
			$("input[name=ongkir").val(ongkir);
			$("input[name=estimasi").val(etd);
		})


	});
</script>