<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title><?= isset($pageTitle) ? $pageTitle : 'Some text' ?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('bootstrap/vendors/images/apple-touch-icon.png') ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('bootstrap/vendors/images/favicon-32x32.png ') ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('bootstrap/vendors/images/favicon-16x16.png ') ?>" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/vendors/styles/core.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/vendors/styles/icon-font.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/vendors/styles/style.css') ?>" />


    <?= $this->renderSection('stylesheets') ?>
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="<?= base_url('bootstrap/vendors/images/deskapp-logo.svg') ?>" alt="" />
                </a>
            </div>
            <div class="login-menu">

            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="<?= base_url('bootstrap/vendors/images/login-page-img.png') ?>" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome modal start -->


    <!-- welcome modal end -->
    <!-- js -->
    <script src="<?= base_url('bootstrap/vendors/scripts/core.js') ?>"></script>
    <script src="<?= base_url('bootstrap/vendors/scripts/script.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/vendors/scripts/process.js') ?>"></script>
    <script src="<?= base_url('bootstrap/vendors/scripts/layout-settings.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>

</body>

</html>