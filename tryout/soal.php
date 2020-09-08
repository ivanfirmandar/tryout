<?php
session_start();
require_once "function.php";
require_once 'Class/Connection.php';
require_once 'Class/Halaman.php';

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
$resultFull = $result;
$result = $result[$nomor - 1];
// Cek Karakteristik Halaman
$halaman = new Halaman($resultFull, $result, "nomor");
$jumlahHalaman = $halaman->jumlahHalaman;
$nomorSoal = $halaman->nomorSoal;
$akhirHalaman = $halaman->akhirHalaman($nomor);
// Ambil Pilihan dari Database

$pilihan = pemisahPilihan($result); //Memisah Pilihan(String) Menjadi Array

$arrayz;
if (isset($_GET["pilihan"])) {
    if (is_numeric($_GET["pilihan"])) {
        $key = $_SESSION["jawabanno" . $nomor] = $_GET["pilihan"];
    }
}
$sessiondeclaration = "jawabanno" . $nomor;
if (isset($_SESSION[$sessiondeclaration])) {

    $jawabanhaha = $_SESSION[$sessiondeclaration];
    $arrayJawaban = ["", "", "", "", ""];
    $arrayJawaban[$jawabanhaha - 1] = "checked";
}

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
    <div class="">
        <div class="card">
            <div class="card-header">
                <h2 id="nomora" hidden=""><?php echo $result["nomor"] ?></h2>
                <p class="mb-0 nomor-soal" id="nomor-soal"><?php echo $nomorSoal ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p><?php echo $result["soal"] ?></p>
                </li>
                <li class="list-group-item">
                    <?php if (isset($arrayJawaban)) : ?>
                        <form action="" method="post" class="ml-4">
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan1" value="option1" onclick="loadJawaban('1')" <?php echo $arrayJawaban[0];  ?>>
                            <label class="form-check-label mb-1 jawaban" for="pilihan1" id="pilihan1"><?php echo $pilihan[0] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan2" value="option1" onclick="loadJawaban('2')" <?php echo $arrayJawaban[1];  ?>>
                            <label class="form-check-label mb-1 jawaban" for="pilihan2" id="pilihan1"><?php echo $pilihan[1] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan3" value="option1" onclick="loadJawaban('3')" <?php echo $arrayJawaban[2];  ?>>
                            <label class="form-check-label mb-1 jawaban" for="pilihan3" id="pilihan1"><?php echo $pilihan[2] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan4" value="option1" onclick="loadJawaban('4')" <?php echo $arrayJawaban[3];  ?>>
                            <label class="form-check-label mb-1 jawaban" for="pilihan4" id="pilihan1"><?php echo $pilihan[3] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan5" value="option1" onclick="loadJawaban('5')" <?php echo $arrayJawaban[4];  ?>>
                            <label class="form-check-label mb-1 jawaban" for="pilihan5" id="pilihan1"><?php echo $pilihan[4] ?></label><br>
                        </form>
                    <?php else : ?>
                        <form action="" method="post" class="ml-4">
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan1" value="option1" onclick="loadJawaban('1')">
                            <label class="form-check-label mb-1 jawaban" for="pilihan1" id="pilihan1"><?php echo $pilihan[0] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan2" value="option1" onclick="loadJawaban('2')">
                            <label class="form-check-label mb-1 jawaban" for="pilihan2" id="pilihan1"><?php echo $pilihan[1] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan3" value="option1" onclick="loadJawaban('3')">
                            <label class="form-check-label mb-1 jawaban" for="pilihan3" id="pilihan1"><?php echo $pilihan[2] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan4" value="option1" onclick="loadJawaban('4')">
                            <label class="form-check-label mb-1 jawaban" for="pilihan4" id="pilihan1"><?php echo $pilihan[3] ?></label><br>
                            <input class="form-check-input mb-1 jawaban" type="radio" name="pilihan" id="pilihan5" value="option1" onclick="loadJawaban('5')">
                            <label class="form-check-label mb-1 jawaban" for="pilihan5" id="pilihan1"><?php echo $pilihan[4] ?></label><br>
                        </form>
                    <?php endif; ?>
                </li>
                <?php if ($nomor == 1 || $nomor == "1") : ?>
                    <li class="list-group-item number d-flex justify-content-end">
                        <button class="btn btn-info" onclick="loadPrevious()" type="input" hidden="">Sebelumnya</button>
                    <?php else : ?>
                    <li class="list-group-item number d-flex justify-content-between">
                        <button class="btn btn-info" onclick="loadPrevious()" type="input">Sebelumnya</button>
                    <?php endif; ?>
                    <button class="btn btn-<?php if ($akhirHalaman == 1) {
                                                echo "success";
                                            } else {
                                                echo "primary";
                                            } ?>" id="submitDok" onclick="loadNext()" type="input"><?php if ($akhirHalaman == 1) {
                                                                                                        echo "Selesai";
                                                                                                    } else {
                                                                                                        echo "Selanjutnya";
                                                                                                    } ?></button>
                    </li>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        let akhirHalaman = <?php echo $akhirHalaman ?>;
        if (akhirHalaman == 1) {
            $("#submitDok").removeClass("btn-primary");
            $("#submitDok").addClass("btn-success");
            $("#submitDok").html("Selesai");
        }
    </script>
</body>

</html>