<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<h1>Add Comic</h1>
<div class="row">
  <div class="col-md-8" style="margin:0px auto;">
    <form action="/app/save_comic" method="post">
      <?= csrf_field(); ?>
      <div class="row mb-3">
        <label for="title" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus value="<?= old('title'); ?>">
          <div class="invalid-feedback">
            <?= $validation->getError('title'); ?>
          </div>
        </div>
      </div>

      <div class="row mb-3">
        <label for="author" class="col-sm-2 col-form-label">Author</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="author" name="author" value="<?= old('author'); ?>">
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
          <input type="text" class="form-control" id="volume" name="volume" value="<?= old('volume'); ?>">
        </div>
      </div>
      <div class=" row mb-3">
        <label for="cover" class="col-sm-2 col-form-label">Cover</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="cover" name="cover" value="<?= old('cover'); ?>">
        </div>
      </div>
      <button type=" submit" class="btn btn-primary btn-add">Add Comic</button>
    </form>
  </div>
</div>
<?php echo $this->endSection(); ?>