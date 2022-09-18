<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Data Add Comic Form</h2>
            <form action="/comics/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="title" class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" autofocus value="<?= old('title'); ?>">
      <div id="validationServerUsernameFeedback" class="invalid-feedback">
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
  <div class="row mb-3">
    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="publisher" name="publisher" value="<?= old('publisher'); ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="image" class="col-sm-2 col-form-label">Image</label>
    <div class="col-sm-2">
      <img src="/img/default.png" class="img-thumbnail img-preview">
    </div>
    <div class="col-sm-8">
    <div class="custom-file">
      <input class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" type="file" id="image" name="image">
      <div class="invalid-feedback">
        <?= $validation->getError('image'); ?>
      </div>
      <label for="image" class="custom-file-label">Choose image..</label>
</div>
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Add Data</button>
</form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>