<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="Controller.php?action=profile">PSP Portal</a>
        <a class="nav-link text-white" href="Controller.php?action=manage">Grades</a>
        <a class="nav-link text-white" href="../logout.php">Logout</a>
    </div>
</nav>

<div class="container">
    <!-- create and update formw -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5><?php echo $editStudent ? 'Update Student' : 'Add New Student'; ?></h5>
        </div>
        <div class="card-body">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $editStudent['id'] ?? ''; ?>">
                <div class="form-row">
                    <div class="form-group col-md-3"><label>Name</label><input type="text" name="name" class="form-control" required value="<?php echo $editStudent['name'] ?? ''; ?>"></div>
                    <div class="form-group col-md-3"><label>IC/NRIC</label><input type="text" name="ic" class="form-control" required value="<?php echo $editStudent['nric'] ?? ''; ?>"></div>
                    <div class="form-group col-md-3"><label>Program</label><input type="text" name="program" class="form-control" required value="<?php echo $editStudent['program'] ?? ''; ?>"></div>
                    <div class="form-group col-md-2"><label>Marks</label><input type="number" step="0.01" name="marks" class="form-control" required value="<?php echo $editStudent['marks'] ?? ''; ?>"></div>
                    <div class="form-group col-md-1 d-flex align-items-end"><button type="submit" name="save" class="btn btn-success btn-block">Save</button></div>
                </div>
            </form>
        </div>
    </div>

    <!-- table -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark"><tr><th>ID</th><th>Name</th><th>NRIC</th><th>Program</th><th>Marks</th><th>Actions</th></tr></thead>
        <tbody>
            <?php foreach ($students as $s): ?>
            <tr>
                <td><?php echo $s['id']; ?></td>
                <td><?php echo htmlspecialchars($s['name']); ?></td>
                <td><?php echo htmlspecialchars($s['nric']); ?></td>
                <td><?php echo htmlspecialchars($s['program']); ?></td>
                <td><?php echo $s['marks']; ?></td>
                <td>
                    <a href="Controller.php?action=manage&edit=<?php echo $s['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form method="post" style="display:inline;" onsubmit="return confirm('Delete this record permanently?');">
                        <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                        <button type="submit" name="delete" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>