<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
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
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Password Exchange Module</h5>
                </div>
                <div class="card-body">
                    <?php if(isset($msg)): ?>
                        <div class="alert alert-success"><?php echo $msg; ?></div>
                    <?php endif; ?>
                    
                    <?php if(isset($err)): ?>
                        <div class="alert alert-danger"><?php echo $err; ?></div>
                    <?php endif; ?>

                    <!-- PART 1.2: Password update form -->
                    <form method="post" action="Controller.php?action=change_password">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="old_pass" class="form-control" required placeholder="Enter current password">
                        </div>
                        
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="new_pass" class="form-control" required minlength="6" placeholder="Min 6 characters">
                        </div>
                        
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="confirm_pass" class="form-control" required minlength="6" placeholder="Re-enter new password">
                        </div>

                        <button type="submit" class="btn btn-warning btn-block">Update Password</button>
                        <a href="Controller.php?action=profile" class="btn btn-secondary btn-block mt-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>