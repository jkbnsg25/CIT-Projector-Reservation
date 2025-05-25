<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - CIT ProJector Reservation</title>
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
        /*nav bar modifications*/
        header, .navbar{
            background-color: #471847;
            height: 80px;
        }
        .profile{
            color: #d276e9;
            font-size: 30px
        }
        .profile:hover{
            transition: all 0.4s;
            color: #aa5bc4;
        }
        .user-profile {
            display: flex; 
            align-items: center;
        }
        .icon-wrapper,
        .name-wrapper {
            display: inline-block; 
        }
        .offcanvas{
            background-color: #471847;
        }
        .navbar-toggler{
            border: none;
            font-size: 1.25rem;
            color: #fff;
        }
        .navbar-toggler:focus, .btn-close:focus{
            box-shadow: none;
            outline: none;
        }
        .navbar-toggler-icon{
            background-image: url("data:image/svg+xml,<svg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'><path stroke='rgba(255,255,255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/></svg>");
        }
        .nav-link{
            color:#fff;
            font-weight: 500;
        }
        .nav-link.nav-link.active{
            color: #d276e9;
            font-weight: 500;
        }
        .nav-link.active{
            color: #d276e9;
        }
        .nav-link:hover{
            color: #d276e9;
        }
        .navbar-nav .nav-link.active {
            color: #d276e9;
            position: relative;
        }
        .navbar-nav .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -0.7px;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            height: 2px;
            background-color: #d276e9;
        }
        .nav-item {
            position: relative;
        }
        .nav-item::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: #d276e9;
            transition: width 0.3s;
        }
        .nav-item:hover::after,.nav-item.active::after {
            width: 80%;
        }
        /*dropdown modifications*/
        
        .dropdown-menu {
            border: none;
            box-shadow: none;
            left: -100%;
            background-color: #7E3E88;
            transition: all 0.4s;
        }
        .dropdown-menu a:hover{
            background-color: #9F63FF;
            color: #fff;
        }
        .dropdown-menu a{
            color: #ffffff;
            font-size: 14px;
            font-weight: 400;
            padding: 10px 20px;
            text-decoration: none;
        }
        .dropdown-toggle::after {
            content: none;
        }
        
        .dropdown:hover > .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        /* submit button modification*/
        .submit-button{
            color: #fff;
            font-weight: 500;
            width: 100%;
            height: 50px;
            background-color: #9F63FF;
            border: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .submit-button:hover{
            background-color: #aa5bc4;
        }
        /*body modifications*/
        body{
            display: flex;
            flex-direction: column;
            height: 150vh;
        }
        .body{
            height: 150vh;
        }
        .input-field{
            padding: 5px 30px;
        }
        .input-field label{
            font-size: 20px;
            color:#471847;
        }
        /*Pop up*/
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #471847;
            padding: 20px;
            z-index: 9999;
            border-radius: 4px;
            color: white;
            width: 350px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 21px;
            font-weight: bold;
        }
        .close:hover {
            color:  #d276e9;
            text-decoration: none;
            cursor: pointer;
        }

        /*footer icon modification*/
        .fa-brands{
            font-size: 25px;
            color: #fff;
            margin: 5px;
        }
        .fa-brands:hover{
            color: #d276e9;
            transition: all 0.4s;
        }
        /* Pop Up */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #471847;
            padding: 20px;
            z-index: 9999;
            border-radius: 6px;
            color: black;
            width: 400px;
            height: 420px;
        }
        .account-image {
            padding-top: 20px;
            margin-left: 100px;
            margin-bottom: 10px;
            width: 150px;
            height: auto;
        }
        .username, .name, .position {
            color:   white;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 21px;
            font-weight: bold;
        }
        .close:hover {
            color: #d276e9;
            text-decoration: none;
            cursor: pointer;
        }
        .bout {
            padding-top: 30px;
            padding-bottom: 10px;
            margin-left: 130px;
        }
        .btn-sign-out {
            background-color: #7E3E88;
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
        .btn-sign-out:hover {
            background-color:  #aa5bc4;
        }
        .btn-yes, .btn-cancel {
            background-color: #7E3E88;
            color: #ffffff;
            border: none;
            padding: 5px 20px;
            border-radius: 4px;
            margin-left: -10px;
            cursor: pointer;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
        }
        .btn-yes:hover {
            background-color: red;
        }
        .btn-cancel:hover {
            background-color: #471847;
            color: white;
        }
        .pop-up {
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
            width: 350px;
        }
        .popUp {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #471847;
            padding: 20px;
            z-index: 9999;
            border-radius: 4px;
            color: white;
            width: 350px;
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
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
            <a class="navbar-brand me-auto" href="homepage.php">
                <img src="images/brand-logo.svg" alt="brand logo" width="60px" height="60px">
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <img src="images/brand-logo.svg" alt="brand logo" width="50px" height="50px">
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item px-2">
                            <a class="nav-link" href="homepage.php">Home</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="reservepage.php">Reserve</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link active" aria-current="page" href="contactpage.php">Contact</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="aboutpage.php">About Us</a>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-regular fa-user profile" style="cursor: pointer;" onclick="showPopup()"></i>
                    </button>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <!-- Popup for account user -->
    <div class="popup" id="accountPopup">
        <span class="close" onclick="closePopup()">&times;</span>
        <img src="images/account-icon.svg" class="account-image">
        <h4 class="username" style="font-size: 15px;"><?php echo isset($_SESSION['Username']) ? htmlspecialchars($_SESSION['Username'], ENT_QUOTES, 'UTF-8') : 'Guest'; ?></h4>
        <h2 class="name"><?php echo isset($_SESSION['Name']) ? htmlspecialchars($_SESSION['Name'], ENT_QUOTES, 'UTF-8') : 'Anonymous'; ?></h2>
        <h3 class="position"><?php echo isset($_SESSION['Role']) ? htmlspecialchars($_SESSION['Role'], ENT_QUOTES, 'UTF-8') : 'Undefined Role'; ?></h3>
        <div class="bout">
            <button type="submit" class="btn-sign-out" name="sign-out" onclick="showSignOutPopup()">Sign Out</button></div>
    </div>

    <!-- confirm sign-out popup -->
        <div class="pop-up" id="confirmSignoutPopup">
            <p id="errorMessage" style="color: black; padding: 10px; margin-top: 5px; text-align: center;">Are you sure you want to sign out?</p>
            <button type="button" class="btn-yes" onclick="confirmSignOut()" style="margin-right: 10px; margin-left: 80px; margin-bottom: 10px;">Yes</button>
            <button type="button" class="btn-cancel" onclick="closeConfirmSignout()" style="margin-left: 10px;">No</button>
        </div>
    
        <!-- script for popup -->
    <script>
        function showPopup() {
            document.getElementById("accountPopup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("accountPopup").style.display = "none";
        }

        function showSignOutPopup() {
            document.getElementById("confirmSignoutPopup").style.display = "block";
        }

        function closeConfirmSignout() {
            document.getElementById("confirmSignoutPopup").style.display = "none";
        }

        function confirmSignOut() {
            window.location.href = "sign-out.php";
        }
    </script>

    <section class="body">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12" style="margin-top: 60px;">
                    <h5 style="color: #aa5bc4;">Contact Us</h5>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <div class="col-lg-12 col-md-12">
                    <h3 style="color:#471847;" style="margin-top: 20px;">Get in touch with us</h3>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 d-flex justify-content-center">
                        <i class="fa-solid fa-location-dot" style="font-size: 30px; margin:20px 0;color:#9F63FF"></i>
                        <p style="margin: 20px 0 20px 10px;">Impig Sipocot Camarines Sur</p>
                    </div>
                    <div class="col-lg-4 col-md-12 d-flex justify-content-center">
                        <i class="fa-solid fa-phone-volume" style="font-size: 30px; margin:20px 0; color:#9F63FF"></i>
                        <p style="margin: 20px 0 20px 10px;">(+63) 9215378943</p>
                    </div>
                    <div class="col-lg-4 col-md-12 d-flex justify-content-center">
                        <i class="fa-solid fa-envelope" style="font-size: 30px; margin:20px 0; color:#9F63FF"></i>
                        <p style="margin: 20px 0 20px 10px;">citprojector@support.com</p>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center" style= "margin-top: 20px;">
                <div class="row" style="width: 700px;">
                    <div class="col-lg-12" style="background-color: #C9A7FF; border-radius: 5px;>
                        <div class="input-field" style="margin-top: 20px; margin-bottom: 10px;">
                        <div class="input-field">
                        <form action="" method="post">
                            <label>Message</label><br>
                            <textarea class="form-control" placeholder="Enter your message here" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your message here'" name="Message" style="height: 200px;margin-bottom:20px;"></textarea>
                        </div>
                        <div class="input-field d-flex justify-content-center">
                            <input class="submit-button" type="submit" name="submit" value="Submit">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- success message popup -->
    <div class="popUp" id="successPopup">
        <span class="close" onclick="closeError()">&times;</span>
        <p id="successMessage" style="padding: 10px; margin-top: 8px; text-align: center;"></p>
    </div>

    <!-- error message popup -->
    <div class="popUp" id="errorPopup">
        <span class="close" onclick="closeError()">&times;</span>
        <p id="errorMessage" style="color: white; padding: 10px; margin-top: 8px; text-align: center;"></p>
    </div>
    
    <script>
        // Show error message pop-up
        function showErrorMessage(message) {
            document.getElementById("errorMessage").innerText = message;
            document.getElementById("errorPopup").style.display = "block";
        }

        // Show success message pop-up
        function showSuccessMessage(message) {
            document.getElementById("successMessage").innerText = message;
            document.getElementById("successPopup").style.display = "block";
        }

        // Function to close error or success message pop-up
        function closeError() {
            document.getElementById("errorPopup").style.display = "none";
            document.getElementById("successPopup").style.display = "none";
        }
    </script>

    </section>
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

</body>
</html>

<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = trim($_POST['Message']);

    if (empty($message)) {
        $successMessage = "Kindly input a message.";
        echo "<script>showSuccessMessage('$successMessage');</script>";
    } else {
        if (isset($_SESSION['u_id'])) {
            $user_id = $_SESSION['u_id'];

            $sql = "INSERT INTO `contact`(`user_id`, `message`) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $user_id, $message);

            if ($stmt->execute()) {
                $successMessage = "Message Sent Successfully!";
                echo "<script>showSuccessMessage('$successMessage');</script>";
            } else {
                $errorMessage = "Message Sent Unsuccessful!";
                echo "<script>showErrorMessage('$errorMessage');</script>";
            }
            $stmt->close();
            $conn->close();
        } else {
            $errorMessage = "User not logged in.";
            echo "<script>showErrorMessage('$errorMessage');</script>";
        }
    }
}
?>