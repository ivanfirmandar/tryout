<?php
require_once 'Class/Connection.php';
require_once "function.php";

$nomor;
if (isset($_GET["nomor"])) {
    $nomor = $_GET["nomor"];
} else {
    $nomor = 1;
}
// get Result
$databaseAktif = new Connection;
$databaseAktif->queryData("soal", "*");
$result = $databaseAktif->result;
$jumlahHalaman = count($result);
$result = $result[$nomor];
$userJwb = $_GET["jawaban"];
$pilihan = pemisahPilihan($result);
$pilihanSoal = [
    "0" => "Tidak Menjawab",
    "1" => "A",
    "2" => "B",
    "3" => "C",
    "4" => "D",
    "5" => "E"
];
$userJwb = $pilihanSoal[$userJwb];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Uji Coba Aplikasi Test Online</title>
</head>

<body>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Soal <?php echo $nomor + 1; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $result["soal"]; ?></li>
                <li class="list-group-item">
                    <ol type="A">
                        <?php foreach ($pilihan as $kunci) : ?>
                            <li>
                                <?php echo $kunci ?>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                </li>
                <li class="list-group-item">Jawaban : <b><?php echo $pilihanSoal[$result["jawaban"]] ?></b>
                </li>
                <li class="list-group-item">Jawaban Anda : <b><?php echo $userJwb ?></b></li>
            </ul>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</body>