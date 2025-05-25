<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - CIT ProJector Reservation</title>
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
        /*login text modifications*/
        .login-text a{
            color: #9F63FF;
            text-decoration: none;
        }
        .login-text a:hover{
            font-weight: 600;
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
        .login-text:hover {
            color: #7E3E88;
        }

        .forgot-pass {
            text-decoration: underline;
            padding-right: 340px;
            padding-top: 5px;
            color: #9F63FF;
            cursor: pointer;
        }
        .forgot-pass:hover {
            color: #7E3E88;
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
        /*footer modification*/
        footer{
            background-color: #7E3E88;
            color: #fff;
            text-align: center;
            padding-top: 20px;
            bottom: 0;
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
            <div class="col-lg-6 col-md-12" style="background-color: #471847;display:flex;justify-content:center;align-items:center;height:700px;">
                <div class="text-container">
                    <img src="images/signup-img.svg" alt="" width="300px" style="width:300px; margin-left: 80px; margin-bottom: 10px;">
                    <p style="color: #fff; font-size:19px; text-align: center;">Hello <i style="color: #9F63FF; font-size: 23px;">CITizens,</i></p>
                    <p style="color:#fff; margin-top:-13px;font-size:18px; margin-top: -20px;"><span style="color: #9F63FF; font-weight: bold; font-size: 22px;">Sign up </span> now, reserve projectors with ease.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12" style="height: 700px;">
                <div class="logo-text text-center" style="margin-top:40px">
                    <img src="images/brand-logo.svg" alt="brand logo" width="50px">
                    <h4 style="color: #471847;">Sign Up</h4>
                </div>
                <form action=""  method="post">
                    <div class="form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" onfocus="this.placeholder=''" onblur="this.placeholder='Enter name'" name="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-select" aria-label="Default select example" name="Role" required>
                                <option disabled selected>Select</option>
                                <option value="CIT-Faculty">CIT-Faculty</option>
                                <option value="CIT-Student">CIT-Student</option>
                                <option value="CIT-Admin">CIT-Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Institutional Email</label>
                            <input type="text" class="form-control" id="email" onfocus="this.placeholder=''" onblur="this.placeholder='Enter email'" name="Username" pattern="[a-zA-Z0-9._%+-]+@cbsua\.edu\.ph$" title="Enter a valid IE @cbsua.edu.ph" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Create Password</label>
                            <input type="password" class="form-control" id="password" onfocus="this.placeholder=''" onblur="this.placeholder='Enter password'" name="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="submit-btn"> 
                        </div>
                        <p style="margin-top:20px;">Already have an account?<span class="login-text"><a href="loginpage.php"> Log in</a> </span></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Error message pop-up -->
<div class="popup" id="errorPopup">
        <span class="close" onclick="closeError()">&times;</span>
        <p id="errorMessage" style="color: red; padding: 10px; margin-top: 5px; text-align: center;" ></p>
    </div>

    <!-- Success message pop-up -->
    <div class="popup" id="successPopup">
        <span class="close" onclick="closeError()">&times;</span>
        <p id="successMessage" style="color: #9400D3; padding: 10px; margin-top: 5px; text-align: center;"></p>
    </div>

<script>
    // JavaScript function to show error message pop-up
    function showErrorMessage(message) {
        document.getElementById("errorMessage").innerText = message;
        document.getElementById("errorPopup").style.display = "block";
    }

    // JavaScript function to show success message pop-up
    function showSuccessMessage(message) {
        document.getElementById("successMessage").innerText = message;
        document.getElementById("successPopup").style.display = "block";
    }

    // JavaScript function to close error or success message pop-up
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

         <!-- JS REG EX-->
<script>
    // form validation function
    function validateForm(event) {
        const nameField = document.getElementById("name");
        const roleField = document.querySelector("[name='Role']");
        const emailField = document.getElementById("email");
        const passwordField = document.getElementById("password");

        // name validation 
        const nameRegex = /^[a-zA-Z\s]{2,}$/;
        if (!nameRegex.test(nameField.value)) {
            showErrorMessage("Name must be letters.");
            event.preventDefault(); 
            return false;
        }

        // role validation (must select a value)
        if (!roleField.value || roleField.value === "Select") {
            showErrorMessage("Please select your role in the college.");
            event.preventDefault();
            return false;
        }

        // institutional Email validation (matches CBSUA domain)
        const emailRegex = /^[a-zA-Z0-9._%+-]+@cbsua\.edu\.ph$/;
        if (!emailRegex.test(emailField.value)) {
            showErrorMessage("Enter a valid Institutional Email (@cbsua.edu.ph).");
            event.preventDefault();
            return false;
        }

        // password validation
        const passwordRegex = /^(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
        if (!passwordRegex.test(passwordField.value)) {
            showErrorMessage("Password must be at least 6 characters long, including number/s and special character/s.");
            event.preventDefault();
            return false;
        }

        // if all validations pass
        return true;
    }

    // EVENTLISTENER - validateForm function to the form's submit event
    document.querySelector("form").addEventListener("submit", validateForm);
</script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $role = $_POST['Role'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // validation for institutional email
    if (!endsWith($username, '@cbsua.edu.ph')) {
        $errorMessage = "Email must be an Institutional Email!";
        echo "<script>showErrorMessage('$errorMessage');</script>";
        exit;
    }

    // check if the email already exists
    $checkEmailSql = "SELECT * FROM `user` WHERE `username` = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errorMessage = "Institutional Email already exists!";
        echo "<script>showErrorMessage('$errorMessage');</script>";
        $stmt->close();
        $conn->close();
        exit;
    }

    // insert the new user record
    $sql = "INSERT INTO `user`(`name`, `role`, `username`, `password`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $role, $username, $password);
    
    if ($stmt->execute()) {
        $successMessage = "Signed Up Successfully!";
        echo "<script>showSuccessMessage('$successMessage');</script>";
        echo '<script>setTimeout(function(){ window.location.href = "loginpage.php"; }, 3000);</script>';
        exit;
    } else {
        $errorMessage = "Sign Up Unsuccessful!";
        echo "<script>showErrorMessage('$errorMessage');</script>";
    }
    
    $stmt->close();
    $conn->close();  
}

function endsWith($string, $suffix) {
    return substr($string, -strlen($suffix)) === $suffix;
}
?>