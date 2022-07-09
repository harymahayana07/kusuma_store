<?php 
$semuadata=array();
$tglm = "_";
$tgls ="_";
if (isset($_POST["kirim"]))
{
	$tglm = $_POST["tglm"];
	$tgls =$_POST['tgls'];
	$ambil=$koneksi->query("SELECT*FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan WHERE tanggal_pembelian BETWEEN '$tglm' AND '$tgls' ");
	WHILE ($pecah =$ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}
?>
	
<h2>Laporan Pembelian dari <?php echo $tglm ?> Hingga <?php echo $tgls ?></h2>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" name="tglm" class="form-control">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" name="tgls" class="form-control">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label></label><br>
				<button class="btn btn-primary" name="kirim">Lihat</button>
			</div>
		</div>
	</div>
</form>

<table class="table table-bordered" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php $nomor=1;?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_pembelian'] ?>
			
		
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $value["nama_pelanggan"] ?></td>
			<td><?php echo $value["tanggal_pembelian"] ?></td>
			<td><?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php $nomor++;?>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th><?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>