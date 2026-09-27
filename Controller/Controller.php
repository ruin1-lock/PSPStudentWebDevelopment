<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Student Profile</h5>
                </div>
                <div class="card-body text-center">
                    
                    <!-- Display Current Profile Picture -->
                    <?php if (!empty($student['profile_pic']) && file_exists('../upload/' . $student['profile_pic'])): ?>
                        <img src="../upload/<?php echo htmlspecialchars($student['profile_pic']); ?>" 
                             class="img-thumbnail mb-3" style="max-width: 150px;">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/150" class="img-thumbnail mb-3">
                    <?php endif; ?>

                    <h4><?php echo htmlspecialchars($student['name']); ?></h4>
                    <p><strong>NRIC:</strong> <?php echo htmlspecialchars($student['nric']); ?></p>
                    <p><strong>Program:</strong> <?php echo htmlspecialchars($student['program']); ?></p>
                    <p><strong>Marks:</strong> <?php echo $student['marks']; ?></p>

                    <!-- Messages -->
                    <?php if(isset($msg)): ?>
                        <div class="alert alert-success"><?php echo $msg; ?></div>
                    <?php endif; ?>
                    <?php if(isset($err)): ?>
                        <div class="alert alert-danger"><?php echo $err; ?></div>
                    <?php endif; ?>

                    <!-- Upload Form -->
                    <hr>
                    <form action="Controller.php?action=upload_profile" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Upload Profile Picture:</label>
                            <input type="file" name="profile_pic" class="form-control" accept=".jpg,.jpeg,.png" required>
                            <small class="text-muted">Max 2MB. Formats: JPG, PNG.</small>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block">Upload Image</button>
                    </form>

                    <a href="Controller.php?action=change_password" class="btn btn-secondary btn-block mt-3">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>