  <?php session_start(); ?>
  <?php include 'koneksi.php'; ?>
  <?php include 'menu.php'; ?><br><br><br>
  <!DOCTYPE html>
  <html>

  <head>
      <title>SCAN QR</title>
      <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
  </head>

  <body>

      <div class="container">
          <div class="row">
              <div class="col-md-7 col-md-offset-3">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">Scan QR CODE</h3>
                      </div>
                      <div class="panel-body">
                          <img src="tema/gambar_qr.jpeg" alt="">
                      </div>
                  </div>

              </div>

          </div>

      </div>
      <?php include 'footer.php'; ?>
  </body>

  </html>