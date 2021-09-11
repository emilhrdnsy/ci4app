<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<div class="row">
  <div class="col-md-8" style="margin:0px auto;">
    <form action="/comic/<?= $comic['id'] ?>/update" method="post">
      <?= csrf_field(); ?>
      <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus value="<?= old('title') ? old('title') : $comic['title'] ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('title'); ?>
          </div>
        </div>
      </div>
      <input type="hidden" class="form-control" id="slug" name="slug" value="<?= old('slug') ? old('slug') : $comic['slug'] ?>">
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
      <div class=" row mb-3">
        <label for="cover" class="col-sm-2 col-form-label">Cover</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="cover" name="cover" value="<?= old('cover') ? old('cover') : $comic['cover'] ?>">
        </div>
      </div>
      <button type=" submit" class="btn btn-primary btn-add">Edit Comic</button>
    </form>
  </div>
</div>
<?php echo $this->endSection(); ?>