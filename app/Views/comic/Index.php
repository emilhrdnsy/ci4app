<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<h1>List of Comic</h1>
<?php if (session()->getFlashData('message')) : ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashData('message'); ?>
  </div>
<?php endif; ?>
<button class="btn btn-primary my-3 btn-add" onclick="location.href='/app/add_comic'">
  <!-- < i class="fas fa-plus"></>  -->
  Add Comic
</button>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Cover</th>
      <th scope="col">Title</th>
      <th scope="col">Chapter</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($comic as $c => $comics) : ?>
      <tr>
        <th style="width: 10%;"><?= $i++; ?></th>
        <td style="width: 20%;"><img src="/image/<?= $comics['cover'] ?>" class="cover"></td>
        <td style="width: 20%;"><?= $comics['title'] ?></td>
        <td style="width: 20%;"><?= $comics['volume'] ?></td>
        <td style="width: auto;">
          <!-- <button onclick="location.href='http://www.example.com'">tap</button> -->
          <button type="button" class="modal-detail btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_detail" data-judul="<?= $comics['title'] ?>" data-sampul="<?= $comics['cover'] ?>" data-penulis="<?= $comics['author'] ?>" data-penerbit="<?= $comics['publisher'] ?>" data-jilid="<?= $comics['volume'] ?>">
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
                    <b>Author : </b>
                    <span id="penulis"></span>
                  </small>
                </div>
              </div>
              <div class="row" style="border:0px solid black;">
                <div class="col-md-12  mt-2 mb-2">
                  <small class="text muted">
                    <b>Publisher : </b>
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
                    Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>