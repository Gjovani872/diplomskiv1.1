<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="<?= base_url('bootstrap/vendors/styles/core.css') ?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/vendors/styles/style.css') ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="container">
        <h1>Student List</h1>
        <table id="studentsTable" class="display">
            <thead>
                <tr>
                    <th>Index No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>JMBG</th>
                    <th>Enrolled At</th>
                    <th>Is Active</th>
                    <th>Has Paid Semester</th>
                    <th>Semester Year</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) : ?>
                    <tr>
                        <td><?= esc($student['index_no']) ?></td>
                        <td><?= esc($student['first_name']) ?></td>
                        <td><?= esc($student['last_name']) ?></td>
                        <td><?= esc($student['phone_number']) ?></td>
                        <td><?= esc($student['jmbg']) ?></td>
                        <td><?= esc($student['enrolledAt']) ?></td>
                        <td><?= esc($student['st_isActive']) ? 'Yes' : 'No' ?></td>
                        <td><?= esc($student['st_hasPaidSemester']) ? 'Yes' : 'No' ?></td>
                        <td><?= esc($student['st_semesterYear']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable();
        });
    </script>
</body>

</html>