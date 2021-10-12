<?php
    include 'PHP/function.inc.php';
    // $_SESSION['csrf_token_time'] = $_KAB['generate']['CSRF']['time'];
    // $_SESSION['csrf_token'] = $_KAB['generate']['CSRF']['token'];
    // $_XYZ['csrf_token'] = $_SESSION['csrf_token'];
    $_SESSION['alert'] = '';
    if(isset($_POST['submit'])){
        unset($_POST['submit']);  //1
        $username = mysqli_real_escape_string($conn, $_POST['username']); 
        $email = mysqli_real_escape_string($conn, $_POST['email']); 
        $password = mysqli_real_escape_string($conn, $_POST['password']); 
        $cpassword = mysqli_real_escape_string($conn, $_POST['confirm-password']); 
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $privacy_agreement = mysqli_real_escape_string($conn, $_POST['agree']); 
        $token = $_KAB['generate']['token']['auto'];
        $sql = "SELECT * FROM customer WHERE email = '$email'";
        $query = mysqli_query($conn, $sql);
        $email_count =  mysqli_num_rows($query);
        $ipaddress = $_SERVER['REMOTE_ADDR'];

        if ($email_count == 1) {
            $_SESSION['message'] = 'Email already Exists';
        } else {
            $insertquery = "INSERT INTO customer (username, email, password, cpassword, dob, login_attempt, phone, privacy_terms, ipaddress, token, status) VALUES ('$username', '$email', '$password', '$cpassword', '$dob', 0 , '0','$privacy_agreement', '$ipaddress', '$token', 'inactive')";
            $iquery = mysqli_query($conn, $insertquery);
            if ($iquery) {
                $_SESSION['message'] = 'Signup Successful';
                header('location: login.php');
            } else {
                $_SESSION['message'] = mysqli_error($conn);
            }
        }
        //2
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>K.A.B Store - Signup</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css?">
        <script src="assets/js/main.js"></script>
        <script src="assets/js/agent.js"></script>
    </head>
   <!-- <?=$_SESSION['message'];?> -->
   <body class="bg">
       <div class="container">
           <!--Data or Content-->
           <div class="box-1">
               <div class="content-holder">
                   <h2>Hello!</h2>
                   <p>K.A.B Store</p>
                       <button class="button-2" onclick="login()">Signup</button>
                    </div>
                </div>
                <!--Forms-->
                <div class="box-2">
                    <div class="alert <?=$_SESSION['alert'];?>">
                        <?=$_SESSION['message'];?>
                        <span class='closebtn'>&times;</span>
                    </div>
            <div class="login-form-container signup">
               <form action="<?=htmlentities($_SERVER['PHP_SELF'])?>" method="post" name="login_form" enctype="multipart/form">
                <h1>Signup</h1>
                <input type="text" name="username" placeholder="Full name" class="input-field" id="username" >
                <br>
                <input type="email" name="email" placeholder="Email" class="input-field" id="email" >
                <br>
                <input type="email" name="confirm-email" placeholder="Confirm Email" class="input-field" id="c_email" >
                <br>
                <input type="password" name="password" placeholder="Password" class="input-field" id="password" >
                <br>
                <input type="password" name="confirm-password" placeholder="Confirm Password" class="input-field" id="c_password" >
                <br>
                <input type="text" name="dob" id="dob" class="input-field" placeholder="Date of Birth" onfocus="this.type='date'; this.value='<?=$_SESSION['date']?>'" onblur="(this.type='text')"  >
                <!-- <a href="" style="float:right;">Forgotten Password?</a> -->
                <input type="hidden" name="ip_address" value="<?=$_SERVER["REMOTE_ADDR"]?>">
                <!-- <input type="hidden" name="CSRF" value="<?=$_SESSION['csrf_token']?>"> -->

                <br>
                <span class="privacy-stat"><input type="checkbox" name="agree" id="privacy" value="accepted" required>
                I have accept the <a href="">Terms of Use </a>& <a href="">privacy policy</a>.</span>
                <br>
                <button class="signup-button" name="submit" type="submit">Next</button>
               </form>
               <span class="have-ac"><a class="no-underline" href="login.php">Login</a></span>
            </div>
      </div>
      <script src="assets/js/script.js"></script>
      <script>
          validation_form("<?=$_SESSION['message']?>");
      </script>
   </body>
</html> 