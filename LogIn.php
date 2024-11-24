<?php
session_start();
include("SDB.php"); 
$error_message = "";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == 'admin@gmail.com'&& $password == 'admin') {
        header("location: admin.php");
    }
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        
        if($email==$row['email']){
            
            if($password==$row['password']){
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header("location: home.php");
            }
            else{
                $error_message="Invalid Password";
            }
        }   
    }
    else{
    $error_message= "This email doesn't exist";
    }

}
?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Log In</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body {
                    background-color: #2C2F38;
                }
                .container {
                    max-width: 400px;
                    margin-top: 100px;
                }
                .form-container {
                    background-color: #222222;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }
                .form-container h2 {
                    text-align: center;
                    margin-bottom: 30px;
                    color: #9B4DFF;
                }
                .btn-primary {
                    background-color: #9B4DFF;
                    border-color: #9B4DFF;
                }
                .btn-primary:hover {
                    background-color: #56CCF2;
                    border-color: #56CCF2;
                }
                .form-group label {
                    color: #FFFFFF;
                }
                .form-container p {
                    text-align: center;
                    color: #FFFFFF;
                }
                .form-container p a {
                    color: #56CCF2;
                    text-decoration: none;
                }
                .form-container p a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>

        <div class="container">
            <div class="form-container">
                <h2>Log In</h2>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="login-email">Email address</label>
                        <input type="email" class="form-control" id="login-email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" required>
                    </div>
                    <span style="color:red">
                    <?php  echo $error_message; ?>
                    </span>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
                    <p class="mt-3">Don't have an account? <a href="SignUp.php">Sign up</a></p>
                </form>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </body>
        </html>
