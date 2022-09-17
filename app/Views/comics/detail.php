<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Comic Details</h2>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/img/<?= $comic['image']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $comic['title']; ?></h5>
        <p class="card-text"><b>Author: </b><?= $comic['author']; ?></p>
        <p class="card-text"><small class="text-muted"><b>Publisher: </b><?= $comic['publisher']; ?></small></p>

        <a href="" class="btn btn-warning">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
        <br><br>
        <a href="/comics/index">Return to comic register</a>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>