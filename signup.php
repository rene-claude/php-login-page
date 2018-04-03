<?php
    include_once 'header.php';
?>

<body>
    
<section class="main-container">
    <div class="main-wrapper">
        <h2>Sign Up Sheet</h2>
        <form class="signup-form" action="includes/signup-inc.php" method="POST">
            <input type="text" name="f-name" placeholder="First Name">
            <input type="text" name="l-name" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email Address">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pswd" placeholder="Password">
            <button type="submit" name="submit">Submit</button>
        </form>
        
</section>
        
<?php
    include_once 'footer.php';
?>
        
</body>

</html>