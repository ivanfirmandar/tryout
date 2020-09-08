<?php
include "header.php";
?>

<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      Login
    </div>

    <div class="card-body">
      <form action="test.php" method="post">
        <div class="form-group">
          <label for="inputAddress2">Nama</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Masukkan Nama Kalian" required="required" name="namaUser">
        </div>
        <button class="btn btn-primary" name="submitUser" type="input">Mulai</button>
      </form>

    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- <script src="script.js"></script> -->
</body>

</html>