<?php echo $this->extend('layout/template'); ?>

<?php echo $this->section('content'); ?>
<h1>Kontak</h1>
<?php foreach ($alamat as $address) : ?>
  <ul>
    <li><?= $address['tipe']; ?></li>
    <li><?= $address['alamat']; ?></li>
    <li><?= $address['kota']; ?></li>
  </ul>
<?php endforeach; ?>
<?php echo $this->endSection(); ?>