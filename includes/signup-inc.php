<?php
/*
$first = $_POST['f-name'];
$last = $_POST['l-name'];
$email = $_POST['email'];
$uid = $_POST['uid'];
$pswd = $_POST['pswd'];
*/
/*
echo $first;
echo $last;
echo $email;
echo $uid;
echo $pswd;
*/

if (isset($_POST['submit'])) {
    
    include_once 'dbh-inc.php'; //Allows me to use variables from that document
    
    /* I could just say $first= $_post['f_name'] but that would exclude error validation wich is important if anyone where to try and hack the system via code enjection.
    
    //$first = $_POST['f-name'];
    //$last = $_POST['l-name'];
    
    //$first = mysql_real_escape_string($conn, $_POST['f-name']);
    //$last = mysql_real_escape_string($conn, $_POST['l-name']);
    //$email = mysql_real_escape_string($conn, $_POST['email']);
    //$uid = mysql_real_escape_string($conn, $_POST['uid']);
    //$pswd = mysql_real_escape_string($conn, $_POST['pswd']);
    
    if (isset($_POST['f-name'])){
        $first = $_POST['f-name'];
    }else {
        header("Location: ../signup.php?first-name-issue");
        exit();
    }
    if (isset($_POST['l-name'])){
        $last = $_POST['l-name'];
    }else {
        header("Location: ../signup.php?last-name-issue");
        exit();
    }
    if (isset($_POST['email'])){
        $email = $_POST['email'];
    }else {
        header("Location: ../signup.php?email-name-issue");
        exit();
    }
    if (isset($_POST['uid'])){
        $uid = $_POST['uid'];
    }else {
        header("Location: ../signup.php?email-name-issue");
        exit();
    }
    if (isset($_POST['pswd'])){
        $pswd = $_POST['pswd'];
    }else {
        header("Location: ../signup.php?email-name-issue");
        exit();
    }
    */
    
    $first = $_POST['f-name'];
    $last = $_POST['l-name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pswd = $_POST['pswd'];
    

    
    //ERROR HANDLER
    //Check for ANY empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pswd)){
        header("Location: ../signup.php?signup=empty-fields");
        exit();
    } else{
        //check if input characters were included that we DO NOT ALLOW
        //preg_math is a PHP function that tells us if we have certain characters we want inside of a string 

        if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
            header("Location: ../signup.php?signup=invalid-name");
            
        }
        else{
            //check if the email is valud
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=email");
                exit();
            } else{
                
                $sql = "SELECT * FROM users WHERE user_uid='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0){
                    header("Location: ../signup.php?signup=user-already-taken");
                    exit();
                } else {
                    //Hashing the password
                    $hashedPwd = password_hash($pswd,PASSWORD_DEFAULT);
                    //Places the entire command in plain text to be sent off later as a command
                    
                    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
                    //Sends the qurey to mysql database to run the statement contained in the '$sql' variable     
                    mysqli_query($conn, $sql);
                    header("Location: ../signup.php?signup=successful-login");
                    exit();
                    
                }
            }
            
        }
    }
    
    
    
    
} else {
    header("Location: ../signup.php?Please-fill-out-the-form");
    exit();
}


































