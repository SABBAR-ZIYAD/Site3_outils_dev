<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabbar.ma</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: #222222;
        }
        .navbar-brand {
            color: #9B4DFF; 
            font-weight: bold;
            font-size: 30px;
        }
        .nav-link {
            color: #FFFFFF; 
            margin: 0 15px; 
        }
        .nav-link:hover {
            color: #9B4DFF; 
        }
        .btn-get-started {
            background-color: #9B4DFF; 
            border-color: #9B4DFF;
            margin-left: 15px;
        }
        .btn-get-started:hover {
            background-color: #56CCF2; 
            border-color: #56CCF2;
        }
        .cart-icon {
            color: #FFFFFF;
            display: flex;
            align-items: center;
            padding: 5px 10px;
            border: 2px solid #FFFFFF;
            border-radius: 5px;
            margin-left: 15px;
        }
        .cart-cost {
            color: #9B4DFF; 
            margin-left: 5px; 
        }
        footer {
            background-color: #222222; 
            color: #FFFFFF; 
            padding: 20px 0;
            position: fixed; 
            left: 0;
            bottom: 0; 
            width: 100%; 
            z-index: 100; 
        }
        footer h5 {
            color: #9B4DFF; 
            margin-bottom: 20px;
        }
        footer .nav-link {
            color: #FFFFFF; 
            padding: 5px 0;
        }
        footer .nav-link:hover {
            color: #9B4DFF; 
        }
        .footer-section {
            margin-bottom: 20px;
        }

        .content {
            padding-bottom: 120px; 
        }
        body, html {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="navbar-brand">Sabbar</div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>

        <div class="d-flex align-items-center" id="l">
        <?php
        if (isset($_SESSION['name'])) {
            echo "<span class='navbar-text' style='color: #AAAAAA;'>Hello, " . $_SESSION['name'] . "</span>";
            echo "<a class='btn btn-get-started ml-2' href='LogIn.php'>Log out</a>"; 
        } else {
            echo "<a class='btn btn-get-started' href='SignUp.php'>Get Started</a>";
        }
        ?>

            <a class="nav-link cart-icon" href="#">
                <span>&#128722;</span> 
                <span class="cart-cost">$0.00</span> 
            </a>
        </div>
    </div>
</nav>



<div class="content">
    <h1>Welcome to the website</h1>
    <p>Content goes here...</p>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-section">
                <h5>A propos</h5>
                <ul class="list-unstyled">
                    <li><a class="nav-link" href="#">A propos</a></li>
                    <li><a class="nav-link" href="#">Paiement à la Livraison</a></li>
                    <li><a class="nav-link" href="#">Délais de livraison</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-section">
                <h5>Contacts</h5>
                <ul class="list-unstyled">
                    <li><a class="nav-link" href="#">Contacter-Nous</a></li>
                    <li><a class="nav-link" href="#">Conditions et Retours</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-section">
                <h5>Notre conditions</h5>
                <ul class="list-unstyled">
                    <li><a class="nav-link" href="#">Notre conditions</a></li>
                    <li><a class="nav-link" href="#">Retours</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-section">
                <h5>Confidentialité</h5>
                <ul class="list-unstyled">
                    <li><a class="nav-link" href="#">Confidentialité</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


