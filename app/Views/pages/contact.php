<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>

            <?php foreach ($address as $a) : ?>

                <ul>
                    <li><?= $a['type']; ?></li>
                    <li><?= $a['address']; ?></li>
                    <li><?= $a['city']; ?></li>
                </ul>

            <?php endforeach; ?>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>