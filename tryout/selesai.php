<?php
require_once "Class/Connection.php";
require_once "Class/Halaman.php";
require_once "config.php";
include "header.php";
session_start();

//Cek Apakah User Sudah Login
if (!isset($_SESSION["user"])) {
	exit();
}
$userName = $_SESSION["user"];
//Aktifkan Database
$databaseAktif = new Connection();
//Hitung Jumlah Halaman
$databaseAktif->queryData("soal", "*");
$hasilQuery = $databaseAktif->result;
$jumlahHalaman = count($hasilQuery);
//Ambil Jawaban User
for ($i = 1; $i <= $jumlahHalaman; $i++) {
	$jawabanUser = "jawabanno" . $i;
	if (isset($_SESSION[$jawabanUser])) {
		$userJwb[$i - 1] = ($_SESSION[$jawabanUser]);
	} else {
		$userJwb[$i - 1] = "0";
	}
}
//Koreksi Hasil jawaban User
$kunJwb = [];
$koreksi = [];
$nilaiAkhir = 0;
$poin = 100 / $jumlahHalaman;
for ($i = 0; $i < $jumlahHalaman; $i++) {
	$kunJwb[$i] = $hasilQuery[$i]["jawaban"];
}
for ($i = 0; $i < $jumlahHalaman; $i++) {

	if ($kunJwb[$i] == $userJwb[$i]) {
		$nilaiAkhir += $poin;
		$koreksi[$i] = "success";
	} else {
		$koreksi[$i] = "danger";
	}
}
//Input Nilai User
$dataInput = ["id" => "", "nama" => $userName, "nilai" => $nilaiAkhir];
$databaseAktif->insertData("nilai", $dataInput);

?>

<?php if (isset($_SESSION["saranmasuk"])) {
	echo "<div class='alert alert-success' role='alert'>
	 	 Saran Telah Masuk, Terima Kasih atas Sarannya</div>";
	sleep(1);
}
?>
<!-- <div class="container-sm"> -->
<div class="container-fluid mt-3 ">
	<div class="row mx-auto d-flex justify-content-center">
		<div class="col-sm-8 mb-3">
			<div class="card">
				<div class="card-header">Nilai <b><?php echo $userName; ?> </b></div>
				<div class="card-body">
					<h2 class="card-title "><?php echo $nilaiAkhir ?></h2>
					<p class="card-text">Terima kasih telah mencoba, jangan lupa masukan dan sarannya ya, <?php echo $userName ?></p>
					<a href="test.php" class="btn btn-primary">Coba Lagi</a>
					<a href="logout.php" class="btn btn-danger">Keluar</a>
				</div>
			</div>
		</div>
		<!-- </div> -->
		<div class="col-sm-3 ">
			<div class="card ">
				<div class="card-header">Hasil</div>
				<div class="card-body">
					<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
						<button type="button" class="btn btn-<?php echo $koreksi[$i - 1] ?> mb-1" data-toggle="modal" data-target="#exampleModal" style="width: 45px;" data-nomor=$1 onclick="jawabanvkunci(<?php echo $i - 1 ?>,<?php echo $userJwb[$i - 1] ?>)">
							<?php
							echo $i;
							?>
						</button>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content" id="popup-jawaban">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nomor</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row d-flex justify-content-center" style="padding: 0px 15px;">
		<div class="col-sm-7">
			<div class="form-group">
				<form action="saran.php" method="post">
					<label for="exampleFormControlTextarea1">Masukan dan Saran</label>
					<textarea class="form-control" id="saran" name="saran" rows="3"></textarea>
					<button type="input" class="btn btn-warning mt-3" name="inputsaran">Kirim Masukan dan Saran</button>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script>
	function jawabanvkunci(data, data2) {
		let getKunci = "koreksi.php?nomor=" + data + "&jawaban=" + data2;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("popup-jawaban").innerHTML = this.responseText;
			}
		};
		xhttp.open("GET", getKunci, true);
		xhttp.send();
	}
</script>
</body>

</html>