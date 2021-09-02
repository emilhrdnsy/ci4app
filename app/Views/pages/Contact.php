<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<h1>Contact</h1>
<?php foreach ($address as $addresses) : ?>
  <ul>
    <li><?= $addresses['tipe']; ?></li>
    <li><?= $addresses['alamat']; ?></li>
    <li><?= $addresses['kota']; ?></li>
  </ul>
<?php endforeach; ?>
<?php echo $this->endSection(); ?>