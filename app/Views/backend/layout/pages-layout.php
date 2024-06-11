<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title><?= isset($pageTitle) ? $pageTitle : 'New Page Title' ?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('bootstrap/vendors/images/apple-touch-icon.png') ?>" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('bootstrap/vendors/images/favicon-32x32.png') ?>" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('bootstrap/vendors/images/favicon-16x16.png') ?>" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/vendors/styles/core.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/vendors/styles/icon-font.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/vendors/styles/style.css') ?>" />
    <?= $this->renderSection('stylesheets') ?>

</head>

<body>


    <?php include('inc/header.php') ?>

    <?php include('inc/right-sidebar.php') ?>

    <?= view_cell('\App\Cells\Sidebar::render') ?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">

                <div>
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
            <?php include('inc/footer.php') ?>

            </a>
        </div>
        <script async defer="defer" src="https://buttons.github.io/buttons.js"></script>
    </div>

    </div>
    <button class="welcome-modal-btn">
        <i class="fa fa-download"></i> Download
    </button>

    <script src="<?= base_url('bootstrap/vendors/scripts/core.js') ?>"></script>
    <script src="<?= base_url('bootstrap/vendors/scripts/script.min.js') ?>"></script>
    <script src="<?= base_url('bootstrap/vendors/scripts/process.js') ?>"></script>
    <script src="<?= base_url('bootstrap/vendors/scripts/layout-settings.js') ?>"></script>

</body>

</html>