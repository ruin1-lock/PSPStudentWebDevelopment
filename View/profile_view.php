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
                    <h4 class="mb-0">Student Profile</h4>
                </div>
                <div class="card-body">
                    <!-- PART 1.1: display session data securely -->
                    <div class="form-group">
                        <label><strong>Name:</strong></label>
                        <p class="form-control-static"><?php echo htmlspecialchars($student['name']); ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label><strong>NRIC:</strong></label>
                        <p class="form-control-static"><?php echo htmlspecialchars($student['nric']); ?></p>
                    </div>
                    
                    <div class="form-group">
                        <label><strong>Program:</strong></label>
                        <p class="form-control-static"><?php echo htmlspecialchars($student['program']); ?></p>
                    </div>

                    <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Upload the picture</button>
                    </div>

                    
                    
                    <hr>
                    <!-- link to part 1.2 password module -->
                    <a href="Controller.php?action=change_password" class="btn btn-warning btn-block">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>