<?= $this->extend('backend/layout/pages-layout') ?>
<?= $this->section('content') ?>

<h1>Welcome to your home page</h1>
<p>Role: <?= ucfirst($role) ?></p>
<!-- Announcements and news posts here -->

<?= $this->endSection() ?>