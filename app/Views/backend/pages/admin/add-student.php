<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/vendors/styles/core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/vendors/styles/style.css') ?>">
</head>

<body>
    <div class="container">
        <h1>Add Student</h1>

        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/add-student') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="jmbg">JMBG</label>
                <input type="text" class="form-control" id="jmbg" name="jmbg" value="<?= old('jmbg') ?>" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= old('first_name') ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= old('last_name') ?>" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= old('phone_number') ?>" required>
            </div>
            <div class="form-group">
                <label for="enrolledAt">Enrolled At</label>
                <input type="date" class="form-control" id="enrolledAt" name="enrolledAt" value="<?= old('enrolledAt') ?>" required>
            </div>
            <div class="form-group">
                <label for="index_no">Index Number</label>
                <input type="text" class="form-control" id="index_no" name="index_no" value="<?= old('index_no') ?>" required>
            </div>
            <div class="form-group">
                <label for="st_isActive">Is Active</label>
                <select class="form-control" id="st_isActive" name="st_isActive" required>
                    <option value="1" <?= old('st_isActive') == '1' ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= old('st_isActive') == '0' ? 'selected' : '' ?>>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="st_hasPaidSemester">Has Paid Semester</label>
                <select class="form-control" id="st_hasPaidSemester" name="st_hasPaidSemester" required>
                    <option value="1" <?= old('st_hasPaidSemester') == '1' ? 'selected' : '' ?>>Yes</option>
                    <option value="0" <?= old('st_hasPaidSemester') == '0' ? 'selected' : '' ?>>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="st_semesterYear">Semester Year</label>
                <input type="number" class="form-control" id="st_semesterYear" name="st_semesterYear" value="<?= old('st_semesterYear') ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Student</button>
        </form>
    </div>
</body>

</html>