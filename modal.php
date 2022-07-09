<?php 
include 'koneksi.php';
 ?>
	<script type="text/javascript" src="admin/assets/js/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="admin/assets/js/bootstrap.min.js"></script>	
<div class="container">		
<!-- Tombol untuk menampilkan modal-->
<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-shopping-bag"></i> Keranjang</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog"><br><br><br><br>
	<div class="modal-dialog">
		<!-- konten modal-->
		<div class="modal-content">
			<!-- heading modal -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title">Keranjang Belanja</h2>
			</div>
			<!-- body modal -->
			<?php 

if (empty($_SESSION['keranjang']) OR !isset($_SESSION["keranjang"]))

?>

		<table class="table table-bordered ">
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
				<?php $nomor=1;?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
				<?php
				$ambil= $koneksi->query("SELECT * FROM produk 
					WHERE id_produk='$id_produk'");
				$pecah=$ambil->fetch_assoc();
				$totalharga= $pecah["harga_produk"]*$jumlah;
				?>
				<tr>
					<td><?php echo $nomor;?></td>
					<td><?php echo $pecah['nama_produk'];?></td>
					<td>Rp <?php echo number_format($pecah['harga_produk']);?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp <?php echo number_format($totalharga);?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_produk ?>" class="btn btn-danger btn-xs">hapus</a>
					</td>
				</tr>
				<?php $nomor++;?>
				<?php endforeach ?>
			</tbody>
		</table>

		<a href="index.php" class= "btn btn-default"><i class="fa fa-cart-plus"></i> Lanjutkan Belanja</a>
		<a href="checkout.php" class= "btn btn-primary"><i class="fa fa-shopping-cart"></i>Checkout</a>

			<!-- footer modal -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
</div>