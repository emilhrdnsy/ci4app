<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
  <div class="col-md-8" style="margin:0px auto;">
    <form action="/comic/save_comic" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>
      <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= old('title'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('title'); ?>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <label for="author" class="col-sm-2 col-form-label">Author</label>
        <div class="col-sm-10">
          <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" id=" author" name="author" value="<?= old('author'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('author'); ?>
          </div>
        </div>
      </div>
      <div class=" row mb-3">
        <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="publisher" name="publisher" value="<?= old('publisher'); ?>">
        </div>
      </div>
      <div class=" row mb-3">
        <label for="volume" class="col-sm-2 col-form-label">Volume</label>
        <div class="col-sm-10">
          <input type="text" class="form-control <?= ($validation->hasError('volume')) ? 'is-invalid' : ''; ?>" id=" volume" name="volume" value="<?= old('volume'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('volume'); ?>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="cover" class="col-sm-2 col-form-label">Cover</label>
        <div class="col-sm-2">
          <img src="/image/default.png" class="img-thumbnail img-preview">
        </div>
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="cover" name="cover" onchange="previewImg()">
            <div class="invalid-feedback">
              <?= $validation->getError('cover'); ?>
            </div>
            <label class="custom-file-label" for="cover">Choose file</label>
          </div>
        </div>
        <label for="cover" class="col-sm-2 col-form-label text-muted small"><small>*max size: 1MB</small> </label>
      </div>
      <button type=" submit" class="btn btn-primary btn-add">Add Comic</button>
    </form>
  </div>
</div>
<?php echo $this->endSection(); ?>