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

    <table class="table table-hover table-sm table-responsive-sm">
      <thead>
        <tr>
          <th scope="col" class="col-1">No</th>
          <th scope="col" class="col-3">Name</th>
          <th scope="col" class="col-6">Address</th>
          <th scope="col" class="col-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($orang as $orang) : ?>
          <tr>
            <th style="width: 10%;text-align:center"><?= $i++; ?></th>
            <td style="width: 20%;text-align:left"><?= $orang['name'] ?></td>
            <td style="width: 20%;text-align:left"><?= $orang['address'] ?></td>
            <td style="width: auto;text-align:center">
              <!-- <button onclick="location.href='http://www.example.com'">tap</button> -->

              <button type="button" class="btn btn-sm btn-success" onclick="location.href='/orang/<?= $orang['name']; ?>/detail'">
                Details
              </button>
              </button>
            </td>
          <?php endforeach; ?>
          </tr>
      </tbody>
    </table>

    <?= $pager->links('orang', 'front_full') ?>
  </div>
</div>
<?php echo $this->endSection(); ?>