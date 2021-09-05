<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>

<div class="card mb-3" style="max-width: 540px; margin: 0px auto;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/image/<?= $comic['cover']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title mb-4"><?= $comic['title']; ?></h5>

        <p class="card-text"><small class="text-muted">Author : <?= $comic['author']; ?></small></p>
        <p class="card-text"><small class="text-muted">Publisher : <?= $comic['publisher']; ?></small></p>
        <p class="card-text"><small class="text-muted">Volume : <?= $comic['volume']; ?></small></p>
        <p class="card-text"><small class="text-muted">Created_at : <?= $comic['created_at']; ?></small></p>
        <p class="card-text"><small class="text-muted">Updated_at : <?= $comic['updated_at']; ?></small></p>

        <div class="mb-3">
          <button onclick="location.href='#'" type="button" class="btn btn-warning">
            Edit
          </button>

          <form action="/comic/delete_comic/<?= $comic['id']; ?>" method="post" class="d-inline">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE"> <!-- http method spoofing -->
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
              Delete
            </button>
          </form>
        </div>
        <div>
          <a href="/comic">
            <small class="">
              Back to comic list
            </small>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>