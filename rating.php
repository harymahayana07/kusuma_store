<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<body>
<div class="container">
    <div class="row">
 
<form action="add_rate.php" method="post">
 
    <div>
        <h3>Student Rating System</h3>
    </div>
 
    <div>
         <label>Nama</label>
        <input type="text" name="name"><?php echo $pe['nama_pelanggan']?></input>
    </div>
 
         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>
 
    <span class='result'>0</span>
    <input type="hidden" name="rating">
 
    </div>
 
    <div><input type="submit" name="add">Kirim</div>
 
</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

<?php  
if (isset($_POST["add"])) 
{
    $name = $_POST["name"];
    $rating = $_POST["rating"];

    $ambil=$koneksi->query("UPDATE rating SET nama ='$name', rating='$rating' WHERE id_produk ='$id_produk'");
 
    echo "<script>alert('data pembelian Terupdate')</script>";
    echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>
 
</script>
</body>
 
</html>