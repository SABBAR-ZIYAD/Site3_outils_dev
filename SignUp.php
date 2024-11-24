<?php
include("SDB.php");
session_start();
$error_message = ""; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $paswd = $_POST['password'];
    $cnfpswd = $_POST['confpassword'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pswd'] = $_POST['password'];
    $_SESSION['cnfpswd'] = $_POST['confpassword'];
    if (empty($paswd) || empty($cnfpswd)) {
        $error_message = "<p style='color: red;'>Please fill in both password fields.</p>";
    } elseif ($paswd !== $cnfpswd) {
        $error_message = "<p style='color: red;'>Passwords don't match</p>";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $paswd)) {
        $error_message = "<p style='color: red;'>Password must contain at least one lowercase letter, one uppercase letter, and one number.</p>";
    } else {
       $hash = password_hash($paswd, PASSWORD_DEFAULT);
       $sql = $connection->prepare("INSERT INTO users ( name, email, password) VALUES (?,?,?)");
        $sql->bind_param("sss",$username,$email,$paswd);
        $sql->execute();
        $sql->close();


        header('Location: home.php');
        exit();
    }
    
}
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #2C2F38; }
        .container { max-width: 400px; margin-top: 100px; }
        .form-container {
            background-color: #222222; padding: 30px; border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 { text-align: center; margin-bottom: 30px; color: #9B4DFF; }
        .btn-success { background-color: #9B4DFF; border-color: #9B4DFF; }
        .btn-success:hover { background-color: #56CCF2; border-color: #56CCF2; }
        .form-group label { color: #FFFFFF; }
        .form-container p { text-align: center; color: #FFFFFF; }
        .form-container p a { color: #56CCF2; text-decoration: none; }
        .form-container p a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="signup-name">Full Name</label>
                <input type="text" class="form-control" id="signup-name" name="name" required>
            </div>
            <div class="form-group">
                <label for="signup-email">Email address</label>
                <input type="email" class="form-control" id="signup-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="signup-password">Password</label>
                <input type="password" class="form-control" id="signup-password" name="password" required>
            </div>
            <div class="form-group">
                <label for="signup-password">Confirm Password</label>
                <input type="password" class="form-control" id="signup-password" name="confpassword" required>
            </div>
            <?php if ($error_message != "") echo $error_message; ?>
            <br>
            <button type="submit" class="btn btn-success btn-block" name="submit">Sign Up</button>
            <p class="mt-3">Already have an account? <a href="LogIn.php">Login</a></p>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
