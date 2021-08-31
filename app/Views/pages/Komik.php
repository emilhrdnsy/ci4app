<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<h1>Daftar Komik</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Cover</th>
      <th scope="col">Judul</th>
      <th scope="col">Chapter</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($komik as $k => $comic) : ?>
      <tr>
        <th style="width: 10%;"><?= $i++; ?></th>
        <td style="width: 20%;"><img src="/image/<?= $comic['sampul'] ?>" class="sampul"></td>
        <td style="width: 20%;"><?= $comic['judul'] ?></td>
        <td style="width: 20%;"><?= $comic['jilid'] ?></td>
        <td style="width: auto;">
          <!-- <button onclick="location.href='http://www.example.com'">tap</button> -->
          <button type="button" class="modal-detail btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_detail" data-judul="<?= $comic['judul'] ?>" data-sampul="<?= $comic['sampul'] ?>" data-penulis="<?= $comic['penulis'] ?>" data-penerbit="<?= $comic['penerbit'] ?>" data-jilid="<?= $comic['jilid'] ?>">
            <!-- <i class="fas fa-info-circle"></i> -->
            Detail
          </button>
          <!-- <button type="button" class="btn btn-danger">
            <i class="fas fa-trash"></i>
            Hapus
          </button> -->
        </td>
      <?php endforeach; ?>
      </tr>
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modal_detail" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">
          <span id=judul></span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row" style="border:0px solid black;">
            <div class="col-md-6" style="border:0px solid black;">
              <img src="" id="sampul" class="sampulModal">
            </div>
            <div class="col-md-6">
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12 mt-2 mb-2">
                  <small class="text muted">
                    <b>Penulis : </b>
                    <span id="penulis"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Penerbit : </b>
                    <span id="penerbit"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Volume : </b>
                    <span id="jilid"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Created at : </b>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Updated at : </b>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <button onclick="location.href='#'" type="button" class="btn btn-warning">
                    <!-- <i class="fas fa-trash"></i> -->
                    Edit
                  </button>
                  <button onclick="location.href='#'" type="button" class="btn btn-danger">
                    <!-- <i class="fas fa-trash"></i> -->
                    Hapus
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>