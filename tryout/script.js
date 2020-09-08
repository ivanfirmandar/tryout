let nomor = 1;

nomorSoal();
loadDoc();
function loadDoc() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("cardSoal").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "soal.php", true);
  xhttp.send();
}
function loadJawaban(index) {

  let getJawaban = "soal.php?nomor=" + nomor + "&pilihan=" + index;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("cardSoal").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", getJawaban, true);
  xhttp.send();
}

function loadNext(){
	let jumlahHalaman = $(".nomorSoal").last().text();
	let nomorSelanjutnya = nomor + 1;
	if (nomor+1==jumlahHalaman) {
		
	}
	if (nomorSelanjutnya>jumlahHalaman) {
		window.location.href = "selesai.php";	
  }else{
    nomor = nomor+1
  let linkSelanjutnya = "soal.php?nomor=" + nomor +"&pilihan=" + pilihanSekarang;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("cardSoal").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", linkSelanjutnya, true);
  xhttp.send();
  }
	
}
let jawaban = [];
let pilihanSekarang;
function ambilJawaban(index){
        let num= $("#nomora").html();
        let arrayNum = num-1
        jawaban[arrayNum] = index;
        console.log(jawaban);
        pilihanSekarang = index;
        return pilihanSekarang;
        loadJawaban()
      }
function loadPrevious(){

	nomor = nomor-1
	if (nomor==0) {
		nomor = 1;
	}
	let key = jawaban[nomor-1];
	if (typeof key == "string") {
		console.log("Jawaban Nomor "+nomor+" = "+key);
		let abc = "pilihan"+key;
		let abcd = document.getElementById(abc).setAttribute("checked","checked");
		console.log(abc);
	}else{
		console.log("Jawaban Tidak Ada");

	}
	let linkSebelumnya = "soal.php?nomor=" + nomor;
	var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("cardSoal").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", linkSebelumnya, true);
  xhttp.send();
}

function nomorSoal() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("nomorSoal").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "nomorsoal.php", true);
  xhttp.send();
}

function klikNomor(data) {
	nomor = data;
	let linkTertentu = "soal.php?nomor=" + data;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			  if (this.readyState == 4 && this.status == 200) {
			     document.getElementById("cardSoal").innerHTML = this.responseText;
			    }
			  };
	 xhttp.open("GET", linkTertentu, true);
	 xhttp.send();
}


