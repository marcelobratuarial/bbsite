
<?= $this->extend('layouts/main/main') ?>

<?= $this->section('header') ?>
<?= $this->include('layouts/main/parts/header') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php //var_dump($pagina); ?>
<?= $this->include($pagina); ?>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
    <?= $this->include('layouts/main/parts/footer') ?>
<?= $this->endSection() ?>


