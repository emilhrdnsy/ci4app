<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
  <div class="col-md-8" style="margin:0px auto;">
    <form action="/comic/<?= $comic['id'] ?>/update" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <input type="hidden" class="form-control" id="slug" name="slug" value="<?= old('slug') ? old('slug') : $comic['slug'] ?>">
      <input type="hidden" class="form-control" id="oldCover" name="oldCover" value="<?= $comic['cover'] ?>">

      <div class=" row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus value="<?= old('title') ? old('title') : $comic['title'] ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('title'); ?>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="author" class="col-sm-2 col-form-label">Author</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="author" name="author" value="<?= old('author') ? old('author') : $comic['author'] ?>">
        </div>
      </div>
      <div class=" row mb-3">
        <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="publisher" name="publisher" value="<?= old('publisher') ? old('publisher') : $comic['publisher'] ?>">
        </div>
      </div>
      <div class=" row mb-3">
        <label for="volume" class="col-sm-2 col-form-label">Volume</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="volume" name="volume" value="<?= old('volume') ? old('volume') : $comic['volume'] ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label for="cover" class="col-sm-2 col-form-label">Cover</label>
        <div class="col-sm-2">
          <img src="/image/<?= $comic['cover']; ?>" class="img-thumbnail img-preview">
        </div>
        <div class="col-sm-6">
          <div class="custom-file">
            <input type="file" class="custom-file-input <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?>" id="cover" name="cover" onchange="previewImg()">
            <div class="invalid-feedback">
              <?= $validation->getError('cover'); ?>
            </div>
            <label class="custom-file-label" for="cover"><?= $comic['cover']; ?></label>
          </div>
        </div>
        <label for="cover" class="col-sm-2 col-form-label text-danger"><small>*max size: 1MB</small> </label>
      </div>
      <button type=" submit" class="btn btn-primary btn-add">Edit Comic</button>
    </form>
  </div>
</div>
<?php echo $this->endSection(); ?>