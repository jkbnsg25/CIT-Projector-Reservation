<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CIT ProJector Reservation</title>
    <link rel="icon" href= "images/brand-logo.svg">  


    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,600;1,700&display=swap" rel="stylesheet">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- css style -->
    <style>
        *{
            font-family: poppins;
        }
        /*form group modifications*/
        .form-group{
            width: 70%;
            margin-top: 15px;
        }
        .form{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /*submit btn modifications*/
        .submit-btn{
            margin-top: 20px;
            background-color: #9F63FF;
            color: #fff;
            font-size: 14px;
            font-weight: 400;
            border: none;
            border-radius: 5px;
            width: 100%;
            height: 40px;
        }
        .submit-btn:hover {
            background-color: #471847;
        }
        /*login text modifications*/
        .login-text a{
            color: #9F63FF;
            text-decoration: none;
        }
        .login-text a:hover{
            font-weight: 600;
        }
        .forgot-pass{
            color: #9F63FF;
            font-size: 13px;
            margin-top: 10px;
            cursor: pointer;
        }
        .forgot-pass:hover{
            font-weight: 600;
        }
        /*Pop up*/
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #F5F5F5; 
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 9999;
            border-radius: 4px;
            color: black;
            width: 350px;
        }
        .forgot-pass-image {
            padding-top: 20px;
            margin-left: 115px;
            margin-bottom: 13px;
            width: 100px;
            height: auto;
        }
        .forgot-pass {
            text-decoration: none;
        }
        .reset-pass {
            color:  #471847;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 21px;
            font-weight: bold;
        }
        .close:hover {
            color: #471847;
            text-decoration: none;
            cursor: pointer;
        }
        .bsave {
            padding-top: 30px;
            padding-bottom: 15px;
            margin-left: 20px;
        }
        .btn-save {
            background-color: #9F63FF;
            color: #ffffff;
            border: none;
            padding: 5px 30px;
            border-radius: 4px;
            margin-left: -10px;
            cursor: pointer;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
        }
        .btn-save:hover {
            background-color: #7E3E88;
        }
        .form-control-p {
            color: black;
            background-color: #F5F5F5;
            border: 1px solid black;
            padding: 5px;
            width: 271px;
            border-radius: 6px;
            margin-left: 18px;
        }
        /*footer icon modification*/
        .fa-brands{
            font-size: 25px;
            color: #ffffff;
            margin: 5px;
        }
        .fa-brands:hover{
            color: #d276e9;
            transition: all 0.4s;
        }

        /*footer modification*/
        footer{
            background-color: #7E3E88;
            color: #fff;
            text-align: center;
            padding-top: 20px;
        }
        .footer-nav a{
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer-nav a:hover{
            color: #9F63FF;
            transition: all 0.4s;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="logo-text text-center" style="margin-top:80px">
                    <img src="images/brand-logo.svg" alt="brand logo" width="50px">
                    <h4 style="color: #471847;">Log in</h4>
                </div>
                <form action="" method="post">
                    <div class="form" style="margin-top:80px;">
                        <div class="form-group">
                            <label for="username">Institutional Email</label>
                            <input type="email" class="form-control" id="email" onfocus="this.placeholder=''" onblur="this.placeholder='Enter email'" name="Username" title="Enter a valid IE @cbsua.edu.ph" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" onfocus="this.placeholder=''" onblur="this.placeholder='Enter password'"  name="Password" required>
                            <label class="forgot-pass" onclick="showPopup()">Forgot Password?</label>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Log in" class="submit-btn" name="submit">
                        </div>
                        <p style="margin-top:20px">Didn't have an account?<span class="login-text"><a href="signuppage.php"> Sign up</a></span></p>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12" style="background-color: #471847;display:flex;justify-content:center">
                <img src="images/login-img.svg" alt="" width="300px" height="700px" >
            </div>
        </div>
    </div>


    <!-- popup for resetting password -->
    <div class="popup" id="resetPasswordPopup">
        <span class="close" onclick="closePopup()">&times;</span>
        <img src="images/forgot-pass.svg" class="forgot-pass-image" alt="Image above sign">
        <h2 class="reset-pass">Reset Password</h2>
        <form action="" method="post">
            <input type="hidden" name="Action" value="ResetPass">
            <div class="form-group">
                <label for="resetEmail" class="resetEmail" style="margin-left: 18px;">Institutional Email</label><br>
                <input type="email" class="form-control-p" id="email" name="Username" onfocus="this.placeholder=''" onblur="this.placeholder='Enter email'"  title="Enter a valid IE @cbsua.edu.ph" required>
            </div>
            <div class="form-group">
                <label for="newPassword" class="newPassword" style="margin-left: 18px;">New Password</label><br>
                <input type="password" class="form-control-p" id="newPassword" name="newPassword" onfocus="this.placeholder=''" onblur="this.placeholder='Enter new password'" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword" class="confirmPassword" style="margin-left: 18px;">Confirm New Password</label><br>
                <input type="password" class="form-control-p" id="confirmPassword" name="confirmPassword" onfocus="this.placeholder=''" onblur="this.placeholder='Re-enter new password'" required>
            </div>
                <div class="bsave" style="margin-left: 120px;"><button type="submit" class="btn-save" name="reset">Save</button></div>
        </form>
    </div>

    <script>
        function showPopup() {
        document.getElementById("resetPasswordPopup").style.display = "block";
        }
        function closePopup() {
        document.getElementById("resetPasswordPopup").style.display = "none";
        }
    </script>
    <!-- error message popup -->
    <div class="popup" id="errorPopup">
        <span class="close" onclick="closeError()">&times;</span>
        <p id="errorMessage" style="color: red; padding: 10px; margin-top: 8px; text-align: center;" ></p>
    </div>

    <!-- success message popup -->
    <div class="popup" id="successPopup">
        <span class="close" onclick="closeError()">&times;</span>
        <p id="successMessage" style="color: #9400D3; padding: 10px; margin-top: 5px; text-align: center;"></p>
    </div>

    <script>
        // function to show error message popup
        function showErrorMessage(message) {
            document.getElementById("errorMessage").innerText = message;
            document.getElementById("errorPopup").style.display = "block";
        }
        // function to show success message popup
        function showSuccessMessage(message) {
            document.getElementById("successMessage").innerText = message;
            document.getElementById("successPopup").style.display = "block";
        }
        // function to close error or success message popup
        function closeError() {
            document.getElementById("errorPopup").style.display = "none";
            document.getElementById("successPopup").style.display = "none";
        }
    </script>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 me-auto">
                    <a href="https://www.facebook.com/profile.php?id=61559738703654"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com/citprojectorreservation?igsh=MXU3ZXUzdTZocHVhbA%3D%3D"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://x.com/CitProjector"><i class="fa-brands fa-twitter"></i></a>
                    <a href="mailto::citprojectorreservation@gmail.com"><i class="fa-brands fa-google"></i></a>
                </div>
            <div class="row" style="margin-top: 20px; font-size: clamp(5px, 7vw + 1rem, 15px)">
                    <p>&copy; 2024 CIT ProJector. All Rights Reserved.</p>
            </div>
            </div>   
        </div>
    </footer>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $username = $conn->real_escape_string($_POST['Username']);
    $password = $conn->real_escape_string($_POST['Password']);

    $sql = "SELECT * FROM `user` WHERE `Username` = '$username' AND `Password` = '$password' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $_SESSION['Username'] = $row['username'];
            $_SESSION['Name'] = $row['name'];
            $_SESSION['Role'] = $row['role'];
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['p_id'] = $row['proj_id'];
            $_SESSION['p_name'] = $row['proj_name'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['Proj_ID'] = $row['proj_id'];
            ?>
            <script>
                // redirect based on user role
                if ("<?php echo $_SESSION['Role']; ?>" === "CIT-Admin") {
                    window.location = "admin.php";
                } else {
                    window.location = "homepage.php";
                }
            </script>
            <?php
            exit();
        }
    } else {
        // no matching user found
        $errorMessage = "Sign In Failed! Incorrect Email or Password.";
        echo "<script>showErrorMessage('$errorMessage');</script>";
    }
    $conn->close();
}

if (isset($_POST['reset'])) {
    $email = $conn->real_escape_string($_POST['Username']);
    $newPassword = $conn->real_escape_string($_POST['newPassword']);
    $confirmPassword = $conn->real_escape_string($_POST['confirmPassword']);

    // check if new password matches the confirmed password
    if ($newPassword !== $confirmPassword) {
        $errorMessage = "Passwords do not match!";
        echo "<script>showErrorMessage('$errorMessage');</script>";
        exit(); 
    }

    // check if the provided email exists in the database
    $checkEmailQuery = "SELECT * FROM `user` WHERE `Username`='$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result->num_rows === 0) {
        $errorMessage = "Institutional Email is not registered!";
        echo "<script>showErrorMessage('$errorMessage');</script>";
        exit(); 
    }

    // query to reset password
    $sql = "UPDATE `user` SET `Password`='$newPassword' WHERE `Username`='$email'";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Password Reset Successfully!";
        echo "<script>showSuccessMessage('$successMessage');</script>";
    } else {
        $errorMessage = "Error Updating Password: " . $conn->error;
        echo "<script>showErrorMessage('$errorMessage');</script>";
    }
    $conn->close();
}
?>