<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Access</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/vendors/styles/core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/vendors/styles/style.css') ?>">
</head>

<body>
    <div class="container">
        <h1>No Access</h1>
        <p>You do not have permission to view this page.</p>

        <?php if (session()->get('user_id')) : ?>
            <a href="<?= base_url(session()->get('role_name') . '/home') ?>" class="btn btn-primary">Go to Home</a>
        <?php else : ?>
            <?php
            // Redirect to the login page
            header('Location: ' . base_url('/'));
            exit();
            ?>
        <?php endif; ?>
    </div>
</body>

</html>