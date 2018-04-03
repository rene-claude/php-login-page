<?php

session_start();
?>

<!DOCTYPE MTL>
<head>
<title> Offifcial Login Page </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="main-wrapper">
            <ul>
                <li> <a href="index.php">Home</a></li>
            </ul>
                <div class="nav-login">
                    <form action="includes/login-inc.php" method="POST">
                        <input type="text" name="username" placeholder="USERNAME">
                        <input type="password" name="pswd" placeholder="PASSWORD">
                        <button type="submit" name="submit">Sign In</button>
                    </form>
                    <a href="signup.php">Sign Up</a>
                </div>
            </div>
        </nav>
    </header>