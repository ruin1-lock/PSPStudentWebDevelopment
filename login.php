<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// redirect when logged in
if (isset($_SESSION['student_id'])) {
    header("Location: Controller/Controller.php?action=profile");
    exit();
}

require_once 'connection.php';
require_once 'Model/Model.php';

$model = new StudentModel($conn);
$err = "";
$nric = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nric = trim($_POST['nric'] ?? '');
    $password = $_POST['password'] ?? '';


    if (empty($nric) || empty($password)) {
        $err = "NRIC and Password are required.";
    } else {
        
        $stmt = $conn->prepare("SELECT id, password FROM students WHERE nric = ?");
        $stmt->bind_param("s", $nric);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        // verify hashed password 
        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['student_id'] = $result['id'];
            $_SESSION['student_nric'] = $nric;
            header("Location: Controller/Controller.php?action=profile");
            exit();
        } else {
            $err = "Invalid NRIC or Password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PSP Student Portal - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-dark text-white text-center">
                    <h4>PSP Student Portal</h4>
                </div>
                <div class="card-body">
                    <?php if(!empty($err)): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($err); ?></div>
                    <?php endif; ?>
                    
                    <form method="post">
                        <div class="form-group">
                            <label>NRIC / IC Number</label>
                            <input type="text" name="nric" class="form-control" required 
                                   placeholder="e.g., 000101-01-1234" 
                                   value="<?php echo htmlspecialchars($nric); ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required 
                                   placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    
                </div>
                <div class="card-footer text-center text-muted small">
                    DFP40443 Full Stack Web Development
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>