<?php

session_start();
require_once "Class/Connection.php";
include "function.php";
$userName = $_SESSION["user"];
$databaseAktif = new Connection;
if (isset($_POST["inputsaran"])) {
	$saranUser = $_POST["saran"];
	$dataSaran = [
		"id" => "",
		"nama" => $userName,
		"masukan" => $saranUser
	];
	$databaseAktif->insertData("saran", $dataSaran);
	$_SESSION["saranmasuk"] = true;
}
header("location: selesai.php");
