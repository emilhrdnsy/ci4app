<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

  <link rel="stylesheet" href="/css/style.css">

  <link href="/fontawesome/css/all.css" rel="stylesheet">
  <!--load all styles -->
  <title><?= $title; ?></title>
</head>

<body>
  <?php echo $this->include('layout/navbar'); ?>
  <div class="container">

    <?php echo $this->renderSection('content'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script> -->
    <script src="/jquery/jquery.js"></script>

    <script>
      $(document).ready(function() {
        $('.modal-detail').click(function() {
          var sampul = $(this).data('sampul');
          var judul = $(this).data('judul');
          var penulis = $(this).data('penulis');
          var penerbit = $(this).data('penerbit');
          var jilid = $(this).data('jilid');
          var tanggal_dibuat = $(this).data('tanggal-dibuat');
          var tanggal_diperbarui = $(this).data('tanggal-diperbarui');

          // .val dipke jika hasil mau ditampilkan di inputan
          // dipke jika hasil mau ditampilkan di text
          $('#sampul').attr("src", "/image/" + sampul);
          $('#judul').text(judul);
          $('#penulis').text(penulis);
          $('#penerbit').text(penerbit);
          $('#jilid').text(jilid);
          $('#tanggal-dibuat').text(tanggal_dibuat);
          $('#tanggal-diperbarui').text(tanggal_diperbarui);
        });
      });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </div>
</body>

</html>