<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
  <div class="col-md-10" style="margin:0px auto;">

    <?php if (session()->getFlashData('message')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashData('message'); ?>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashData('warning')) : ?>
      <div class="alert alert-warning" role="alert">
        <?= session()->getFlashData('warning'); ?>
      </div>
    <?php endif; ?>
    <button class="btn btn-primary btn-add mb-3" onclick="location.href='/comic/add'">
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
        <?php foreach ($comic as $comics) : ?>
          <tr>
            <th style="width: 10%;"><?= $i++; ?></th>
            <td style="width: 20%;"><img src="/image/<?= $comics['cover'] ?>" class="cover"></td>
            <td style="width: 20%;"><?= $comics['title'] ?></td>
            <td style="width: 20%;"><?= $comics['volume'] ?></td>
            <td style="width: auto;">
              <!-- <button onclick="location.href='http://www.example.com'">tap</button> -->

              <!-- <button type="button" class="modal-detail btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_detail" data-judul="<?= $comics['title'] ?>" data-sampul="<?= $comics['cover'] ?>" data-penulis="<?= $comics['author'] ?>" data-penerbit="<?= $comics['publisher'] ?>" data-jilid="<?= $comics['volume'] ?>" data-tanggal-dibuat="<?= $comics['created_at']; ?>" data-tanggal-diperbarui="<?= $comics['updated_at']; ?>">
                Details
              </button> -->
              <button type="button" class="btn btn-success" onclick="location.href='/comic/<?= $comics['slug']; ?>/detail'">
                Details
              </button>
              </button>
            </td>
          <?php endforeach; ?>
          </tr>
      </tbody>
    </table>
  </div>
</div>
<?php echo $this->endSection(); ?>