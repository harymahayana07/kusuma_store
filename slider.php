<style type="text/css">
    * { margin: 0; padding: 0; }
    img { max-width: 100%; }
    .cycle-slideshow {
        width: 100%;
        max-width: 960px;
        display: block;
        position: relative;
        margin: 20px auto;
        overflow: hidden;
    }
    .cycle-prev, .cycle-next {
        font-size: 200%;
        color: #fff;
        display: block;
        position: absolute;
        top: 50%;
        z-index: 990;
        cursor: pointer;
        margin-top: -16px;
    }
    .cycle-prev { left: 42px; }
    .cycle-next { right: 62px; }
    .cycle-pager {
        position: absolute;
        width: 100%;
        height: 10px;
        bottom: 10px;
        z-index: 990;
        text-align: center;
    }
    .cycle-pager span {
        text-indent: 100%;
        top: 100px;
        width: 10px;
        height: 10px;
        display: inline-block;
        border: 1px solid blue;
        border-radius: 50%;
        margin: 0 10px;
        white-space: nowrap;
        cursor: pointer;
    }
    .cycle-pager-active { background-color: red; }
</style>
<script type="text/javascript" src="slider.js"></script>
<?php
$data=array();
$ambil= $koneksi->query("SELECT * FROM tema");
while($tiap=$ambil->fetch_assoc())
{
  $data[]=$tiap;
}
?>

<div class="cycle-slideshow">
    <span class="cycle-prev">&#9001;</span> <!-- Untuk membuat tanda panah di kiri slider -->
    <span class="cycle-next">&#9002;</span> <!-- Untuk membuat tanda panah di kanan slider -->
    <span class="cycle-pager"></span> 
    <?php foreach ($data as $key => $value): ?>
	    <img src="tema/<?php echo $value["tema"] ?>" style="height: 400px; width: 1000px;">
	    <?php endforeach ?> <!-- Untuk membuat tanda bulat atau link pada slider -->
</div>
