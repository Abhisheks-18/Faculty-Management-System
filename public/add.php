<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare(
        "INSERT INTO faculty (name, department, email) VALUES (?, ?, ?)"
    );
    $stmt->bindValue(1, $_POST['name']);
    $stmt->bindValue(2, $_POST['department']);
    $stmt->bindValue(3, $_POST['email']);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Faculty</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            min-height: 100vh;
        }
        .form-card {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card form-card shadow-lg w-100" style="max-width: 500px;">
        <div class="card-body p-4">

            <h3 class="text-center mb-4">Add Faculty</h3>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <input type="text" name="department" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button class="btn btn-success">Add Faculty</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="index.php">← Back to Dashboard</a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
