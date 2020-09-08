<?php
session_start();

include "header.php";

if (!isset($_SESSION["user"])) {
  if (isset($_POST["submitUser"])) {
    $_SESSION["user"] = $_POST["namaUser"];
  } else {
    exit();
  }
}
?>
<div class="container-fluid mt-3 mx-auto">
  <div class="row d-flex justify-content-center" style="width: 100%">
    <div class="col-sm-3 qnumber w-100 mb-3" id="nomorSoal">
      <div class="card w-100">
        <div class="card-header">
          Nomor Soal
        </div>
        <ul class="list-group list-group-flush">

          <li class="list-group-item qqnumber" style="text-align:center; ">
          </li>
        </ul>
      </div>
    </div>
    <div class="col-sm-8 w-100 " id="cardSoal">
      <div class="card">
        <div class="card-header noSoal">
          Nomor Soal
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item number soalUjian">Soal</li>
          <li class="list-group-item number">
            <form action="post">
              <div class="form-check">
                <input class="form-check-input mb-1" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label mb-1" for="exampleRadios1" id="pilihan1">
                  Pilihan 1
                </label><br>
                <input class="form-check-input mb-1" type="radio" name="exampleRadios" id="exampleRadios2" value="option1" checked>
                <label class="form-check-label mb-1" for="exampleRadios2" id="pilihan2">
                  Pilihan 2
                </label><br>
                <input class="form-check-input mb-1" type="radio" name="exampleRadios" id="radio2" value="option1" checked>
                <label class="form-check-label mb-1" for="radio2" id="pilihan3">
                  Pilihan 3
                </label><br>
                <input class="form-check-input mb-1" type="radio" name="exampleRadios" id="radio3" value="option1" checked>
                <label class="form-check-label mb-1" for="radio3" id="pilihan4">
                  Pilihan 4
                </label><br>
                <input class="form-check-input mb-1" type="radio" name="exampleRadios" id="radio3" value="option1" checked>
                <label class="form-check-label mb-1" for="radio3" id="pilihan5">
                  Pilihan 5
                </label><br>
              </div>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script>

  </script>
  </body>

  </html>