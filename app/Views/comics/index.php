<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
          <h1 class="mt-2">Register Comic</h1>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Picture</th>
      <th scope="col">Title</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $i = 1; 
    
    ?>
    <?php 
    
    foreach ($comic as $c) :
    
    ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><img src="/img/<?= $c['image']; ?>" alt="" class="picture"></td>
      <td><?= $c['title']; ?></td>
      <td>
        <a href="/comics/<?= $c['slug']; ?>" class="btn btn-success">Details</a>
      </td>
    </tr>
    <?php 
    
    endforeach;
    
    ?>
  </tbody>
</table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>