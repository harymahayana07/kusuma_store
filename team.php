<!DOCTYPE html>
<html>

<head>
    <title>TEAM</title>
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
    <script type="text/javascript" src="slider.js"></script>

</head>
<style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }

    img {
        max-width: 100%;
    }

    .cycle-slideshow {
        width: 100%;
        max-width: 960px;
        display: block;
        position: relative;
        margin: 20px auto;
        overflow: hidden;
    }

    .cycle-prev,
    .cycle-next {
        font-size: 200%;
        color: #fff;
        display: block;
        position: absolute;
        top: 50%;
        z-index: 990;
        cursor: pointer;
        margin-top: -16px;
    }

    .cycle-prev {
        left: 42px;
    }

    .cycle-next {
        right: 62px;
    }

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

    .cycle-pager-active {
        background-color: red;
    }
</style>

<body>
    <?php session_start(); ?>
    <?php include 'koneksi.php'; ?>
    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row" style="margin-top: 110px;">
            <h3 class="text-center"><strong>MAHASISWA PELAKSANA : </strong></h3>
            <h5 class="text-center">======================================</h5>
            <br>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">I MADE HARY MAHAYANA</h3>
                    </div>
                    <div class="panel-body text-center">
                        <img src="tema/hary_man.jpg" alt="" style="height: 210px; width: 230px;">
                    </div>
                    <div class="panel-footer">
                        <h3 class="panel-title text-center">Nim : 1901010046</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">GEOFANNO MAYCELLINO</h3>
                    </div>
                    <div class="panel-body text-center">
                        <img src="tema/geo_man.jpg" alt="" style="height: 210px; width: 190px;">
                    </div>
                    <div class="panel-footer">
                        <h3 class="panel-title text-center">Nim : 1901010001</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title ">CHRISTUAJI SATRIO EDI M.</h3>
                    </div>
                    <div class="panel-body text-center">
                        <img src="tema/rio_man.jpg" alt="" style="height: 210px; width: 160px;">
                    </div>
                    <div class="panel-footer">
                        <h3 class="panel-title text-center">Nim : 1901010042</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">PUTU ANANDA PRADNYA W.</h3>
                    </div>
                    <div class="panel-body text-center">
                        <img src="tema/putu_man.jpg" alt="" style="height: 210px; width: 200px;">
                    </div>
                    <div class="panel-footer">
                        <h3 class="panel-title text-center">Nim : 1901010011</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel-body text-center">
                <img src=" tema/kelompok_kusuma_store.jpg" style="height: 260px; width: 400px; border-radius: 20px;">
            </div>
        </div>

    </div>
</body>

</html>
<!--  -->