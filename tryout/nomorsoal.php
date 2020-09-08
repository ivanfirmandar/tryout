<?php
include 'Class/Connection.php';
require_once 'config.php';
$databaseAktif = new Connection;
$databaseAktif->queryData("soal", "*");
$result = $databaseAktif->result;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="card w-100">
    <div class="card-header">
      Nomor Soal
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item qqnumber" style="text-align:center; ">
        <?php foreach ($result as $number) : ?>
          <button type="button" class="btn btn-secondary mb-1 nomorSoal" style="width: 50px;" onclick="klikNomor(<?php echo $number["nomor"] ?>)"><?php echo $number["nomor"] ?></button>
        <?php endforeach; ?>
      </li>
    </ul>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script>

  </script>
</body>

</html>