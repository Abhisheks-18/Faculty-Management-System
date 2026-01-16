<?php
include '../includes/db.php';

/* Fetch faculty count (updated by trigger) */
$countResult = $db->query("SELECT total FROM faculty_count");
$countRow = $countResult->fetchArray();
$totalFaculty = $countRow['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Faculty Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
        }
        .app-card {
            border-radius: 15px;
        }
        .app-title {
            font-weight: 700;
        }
        table th, table td {
            vertical-align: middle;
        }
        .count-badge {
            font-size: 16px;
            padding: 8px 15px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card app-card shadow-lg w-100" style="max-width: 1000px;">
        <div class="card-body p-4">

            <!-- Title -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="app-title">Faculty Management System</h2>

                <!-- Trigger-based Count -->
                <span class="badge bg-dark count-badge">
                    Total Faculty: <?php echo $totalFaculty; ?>
                </span>
            </div>

            <!-- Add Button -->
            <div class="d-flex justify-content-end mb-3">
                <a href="add.php" class="btn btn-success">
                    ➕ Add Faculty
                </a>
            </div>

            <!-- Faculty Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $result = $db->query("SELECT * FROM faculty");
                    $hasRows = false;

                    while ($row = $result->fetchArray()) {
                        $hasRows = true;
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['department']}</td>
                                <td>{$row['email']}</td>
                                <td>
                                    <a href='delete.php?id={$row['id']}'
                                       class='btn btn-danger btn-sm'
                                       onclick=\"return confirm('Delete this faculty?')\">
                                       🗑 Delete
                                    </a>
                                </td>
                              </tr>";
                    }

                    if (!$hasRows) {
                        echo "<tr><td colspan='4'>No faculty records found</td></tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>
