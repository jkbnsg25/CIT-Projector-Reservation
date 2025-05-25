<?php
session_start();
include 'connection.php'; // Include your database connection script

// Check if proj_id is provided in the URL
if (isset($_GET['proj_id'])) {
    $proj_id = $_GET['proj_id'];

    // Prepare SQL statement to retrieve projector name
    $sql = "SELECT proj_name FROM projector WHERE proj_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $proj_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if projector exists
    if ($result->num_rows > 0) {
        // Fetch projector name
        $row = $result->fetch_assoc();
        $projector_name = $row['proj_name'];

        // Set $_SESSION['p_name'] to the fetched projector name
        $_SESSION['p_name'] = $projector_name;
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservation - CIT ProJector Reservation</title>
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
        /* reserve button modification*/
        .reserve-button{
            background-color: #9F63FF;
            color: #fff;
            font-size:14px;
            font-weight: 400;
            width: 200px;
            border-radius: 30px;
            margin: 10px;
            border: none;
            transition: 0.3s background-color;
        }
        .reserve-button:hover{
            background-color: #aa5bc4;
        }
        /* done button modification*/
        .done-button{
            background-color: #4CAF50;
            border-radius: 30px;
            color: #fff;
            font-size:14px;
            font-weight: 400;
            width: 200px;
            border-radius: 30px;
            margin: 10px;
            border: none;
            transition: 0.3s background-color;
        }
        .done-button:hover{
            background-color: #45a049;
        }
        body{
            display: flex;
            flex-direction: column;
            height: 160vh;
        }
        .body{
            margin-top: 20px;
            height: 130vh;
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
        .btn-yes, .btn-cancel, .btn-no, .btn-done {
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
        .btn-no:hover {
            background-color: #aa5bc4;
            color: white; 
        }
        .btn-done:hover {
            background-color: green; 
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
                            <a class="nav-link" aria-current="page" href="homepage.php">Home</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link active" href="reservepage.php">Reserve</a>
                        </li>
                        <li class="nav-item px-2">
                            <a class="nav-link" href="contactpage.php">Contact</a>
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
    <div class="pop-up" id="errorPopup">
        <p id="errorMessage" style="color: black; padding: 10px; margin-top: 5px; text-align: center;">Are you sure you want to sign out?</p>
        <button type="button" class="btn-yes" onclick="confirmSignOut()" style="margin-right: 10px; margin-left: 80px; margin-bottom: 10px;">Yes</button>
        <button type="button" class="btn-cancel" onclick="closeError()" style="margin-left: 10px;">No</button>
    </div>

    <script>
        function showPopup() {
            document.getElementById("accountPopup").style.display = "block";
        }
        function closePopup() {
            document.getElementById("accountPopup").style.display = "none";
        }
        function showSignOutPopup() {
            document.getElementById("errorPopup").style.display = "block";
        }
        function showCancelPopup() {
            document.getElementById("cancelPopup").style.display = "block";
        }
        function showDone() {
            document.getElementById("donePopup").style.display = "block";
        }
        function close() {
            document.getElementById("errorPopup").style.display = "none";
        }
        function closeC() {
            document.getElementById("cancelPopup").style.display = "none";
            document.getElementById("donePopup").style.display = "none";
        }
        function confirmSignOut() {
            window.location.href = "sign-out.php";
        }
    </script>

    <!-- error message popup -->
    <div class="popUp" id="errorPopup">
            <p id="errorMessage" style="color: color; padding: 10px; margin-top: 8px; text-align: center;" ></p>
        </div>

        <!-- success message pop-up -->
        <div class="popUp" id="successPopup">
            <p id="successMessage" style=" padding: 10px; margin-top: 8px; text-align: center;"></p>
        </div>

        <script>
        // function to show error message pop-up
        function showErrorMessage(message) {
            document.getElementById("errorMessage").innerText = message;
            document.getElementById("errorPopup").style.display = "block";
        }

        // function to show success message pop-up
        function showSuccessMessage(message) {
            document.getElementById("successMessage").innerText = message;
            document.getElementById("successPopup").style.display = "block";
        }

        // function to close error or success message pop-up
        function closeError() {
            document.getElementById("errorPopup").style.display = "none";
            document.getElementById("successPopup").style.display = "none";
        }
    </script>

    <section class="body">
        <div class="container">
            <div class="row">
                <a href="reservepage.php">
                    <i class="fa-solid fa-arrow-left" style="margin-top: 0; font-size:30px; color:#471847"></i>
                </a>
                <div class="h1-text col-lg-12 text-center">
                    <h1 style="margin-top: 2px; margin-bottom: 20px;"><span style="color: #471847; font-weight: bolder;">CIT Pro</span><span style="color: #FECC6B; font-weight: bolder; font-size: 45px;">J</span><span style="color: #471847; font-weight: bolder;">ector</span> | View Reservation</h1>
                    <h3 style="margin-top: 10px; margin-bottom: 10px;">
                        <?php 
                        if (isset($_SESSION['p_name']) && !empty($_SESSION['p_name'])) {
                            echo $_SESSION['p_name']; 
                        } else {
                            echo "Projector Name not available"; 
                        }
                        ?>
                    </h3> 
                </div>
            </div>
            <div class="container d-flex justify-content-center" style="margin-top:10px;">
                <div class="row">
                    <div class="col-12">
                        <img src="images/projector-img.svg" alt="projector image" style="border: 1px solid #471847;border-radius:5px;width:300px;">
                    </div> 
                </div>
            </div> 

            <div>
            <?php
                // check if user is logged in
                if (!isset($_SESSION['user_id'])) {
                    // redirect to login page
                    header("Location: login.php");
                    exit();
                }

                include 'connection.php';

                if (isset($_GET['proj_id'])) {
                    $proj_id = $_GET['proj_id'];
                    $user_id = $_SESSION['user_id'];

                    // sql statement to retrieve reservation details
                    $sql = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $proj_id, $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // check if reservation exists
                    if ($result->num_rows > 0) {
                        $reservation = $result->fetch_assoc();
                    
                        // reservation details
                        echo "<div style='color: black; font-size: larger; text-align: center; margin-top: 30px;'>";
                        echo "<div style='text-align: justify; display: inline-block;'>";
                        echo "Projector   : <span style='color: #471847; font-weight: bold;'>CIT Projector " . $reservation['proj_id'] . "</span><br>";
                        echo "Reserved by : <span style='color: #471847; font-weight: bold;'>" . $_SESSION['Name'] . "</span><br>";
                        echo "Room        : <span style='color: #471847; font-weight: bold;'>" . $reservation['room'] . "</span><br>";

                        // Convert date to day
                        $date = date_create($reservation['date']);
                        $day = date_format($date, 'F j, Y');

                        echo "Date        : <span style='color: #471847; font-weight: bold;'>" . $day . "</span><br>";
                        echo "Start Time  : <span style='color: #471847; font-weight: bold;'>" . $reservation['start_time'] . "</span><br>";
                        echo "End Time    : <span style='color: #471847; font-weight: bold;'>" . $reservation['end_time'] . "</span><br>";
                    } else {
                        echo "No reservation found for this projector.";
                    }
                } else {
                    echo "No Projector ID.";
                }
            ?>
            <div>

            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary button-common reserve-button" onclick="window.location.href='editreservepage.php?proj_id=<?php echo urlencode($proj_id); ?>'">Edit</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary button-common reserve-button" name="cancel" onclick="showCancelPopup()">Cancel</button>

                        <?php
                            // check if user is logged in
                            if (!isset($_SESSION['user_id'])) {
                                // Redirect to login page
                                header("Location: login.php");
                                exit();
                            }

                            include 'connection.php';

                            if (isset($_GET['proj_id'])) {
                                $proj_id = $_GET['proj_id'];
                                $user_id = $_SESSION['user_id'];

                                // sql statement to retrieve reservation details
                                $sql = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("ii", $proj_id, $user_id);
                                $stmt->execute();
                                $result = $stmt->get_result();

                                // check if reservation exists
                                if ($result->num_rows > 0) {
                                    // reservation found
                                    $reservation = $result->fetch_assoc();

                                    // retrieve the projector name from the database
                                    $sql_proj_name = "SELECT proj_name FROM projector WHERE proj_id=?";
                                    $stmt_proj_name = $conn->prepare($sql_proj_name);
                                    $stmt_proj_name->bind_param("i", $proj_id);
                                    $stmt_proj_name->execute();
                                    $result_proj_name = $stmt_proj_name->get_result();

                                    if ($result_proj_name->num_rows > 0) {
                                        $row_proj_name = $result_proj_name->fetch_assoc();
                                        $proj_name = $row_proj_name['proj_name'];
                                    }
                                }
                            }

                    // cancel reservation
                    if (isset($_POST['confirm_cancel'])) {
                        $conn->begin_transaction();

                        try {
                            // delete reservation query
                            $sql_delete_reservation = "DELETE FROM reservation WHERE proj_id = ? AND user_id = ?";
                            $stmt_reservation = $conn->prepare($sql_delete_reservation);
                            $stmt_reservation->bind_param("ii", $proj_id, $user_id);
                            $stmt_reservation->execute();

                            // check if there are other reservations for the projector
                            $sql_check_reservations = "SELECT COUNT(*) AS total_reservations FROM reservation WHERE proj_id = ?";
                            $stmt_check = $conn->prepare($sql_check_reservations);
                            $stmt_check->bind_param("i", $proj_id);
                            $stmt_check->execute();
                            $result = $stmt_check->get_result();
                            $row = $result->fetch_assoc();

                            if ($row['total_reservations'] == 0) {
                                // delete projector only if no other reservations exist
                                $sql_delete_projector = "DELETE FROM projector WHERE proj_id = ?";
                                $stmt_projector = $conn->prepare($sql_delete_projector);
                                $stmt_projector->bind_param("i", $proj_id);
                                $stmt_projector->execute();
                            }

                            $conn->commit();

                            $successMessage = "Reservation canceled successfully!";
                            echo "<script>showSuccessMessage('$successMessage'); setTimeout(function() { window.location.href='reservepage.php'; }, 2000);</script>";
                        } catch (Exception $e) {
                            $conn->rollback();
                            $errorMessage = "Failed to cancel reservation.";
                            echo "<script>showErrorMessage('$errorMessage');</script>";
                        }
                    }
                            // mark as done
                            if (isset($_POST['confirm_done'])) {
                                $conn->begin_transaction();

                                try {
                                    // delete reservation query
                                    $sql_delete_reservation = "DELETE FROM reservation WHERE proj_id = ? AND user_id = ?";
                                    $stmt_reservation = $conn->prepare($sql_delete_reservation);
                                    $stmt_reservation->bind_param("ii", $proj_id, $user_id);
                                    $stmt_reservation->execute();

                                    // check if there are other reservations for the projector
                                    $sql_check_reservations = "SELECT COUNT(*) AS total_reservations FROM reservation WHERE proj_id = ?";
                                    $stmt_check = $conn->prepare($sql_check_reservations);
                                    $stmt_check->bind_param("i", $proj_id);
                                    $stmt_check->execute();
                                    $result = $stmt_check->get_result();
                                    $row = $result->fetch_assoc();

                                    if ($row['total_reservations'] == 0) {
                                        // delete projector only if no other reservations exist
                                        $sql_delete_projector = "DELETE FROM projector WHERE proj_id = ?";
                                        $stmt_projector = $conn->prepare($sql_delete_projector);
                                        $stmt_projector->bind_param("i", $proj_id);
                                        $stmt_projector->execute();
                                    }

                                    $conn->commit();

                                    $successMessage = "Reservation completed successfully!";
                                    echo "<script>showSuccessMessage('$successMessage'); setTimeout(function() { window.location.href='reservepage.php'; }, 2000);</script>";
                                } catch (Exception $e) {
                                    $conn->rollback();
                                    $errorMessage = "Failed to complete reservation.";
                                    echo "<script>showErrorMessage('$errorMessage');</script>";
                                }
                            }
                            ?>

                            <!-- confirm cancel popup -->
                            <div class="popUp" id="cancelPopup">
                                <form method="post">
                                <p id="errorMessage" style="color: white; padding: 10px; text-align: center;">
                                    <span style="display: block;">Cancel Reservation for</span>
                                    <?php echo isset($proj_name) ? $proj_name : ''; ?>?
                                </p>
                                    <button type="submit" class="btn-yes" name="confirm_cancel" style="margin-right: 10px; margin-left: 10px; margin-bottom: 10px;">Yes</button>
                                    <button type="button" class="btn-no" onclick="closeC()" style="margin-left: 10px;">No</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="btn btn-success button-common done-button" name="done" onclick="showDone()">Mark as done</button>

                                <!-- confirm done popup -->
                                <div class="popUp" id="donePopup">
                                <form method="post">
                                    <p id="errorMessage" style="color: white; padding: 20px; padding-bottom: 10px; padding-top: 15px; text-align: center;">Reservation for <?php echo isset($proj_name) ? $proj_name : ''; ?> been completed?</p>
                                    <button type="submit" class="btn-done" name="confirm_done" style="margin-right: 10px; margin-left: 10px; margin-bottom: 10px;">Yes</button>
                                    <button type="button" class="btn-no" onclick="closeC()" style="margin-left: 10px;">No</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>

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

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
