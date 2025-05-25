<?php
session_start();
include 'connection.php'; 

// reservation status based on date and time
function getReservationStatus($reservation_date, $start_time, $end_time) {
    $current_datetime = new DateTime(); 
    $reservation_datetime = new DateTime($reservation_date . ' ' . $start_time);
    $end_datetime = new DateTime($reservation_date . ' ' . $end_time);

    if ($current_datetime < $reservation_datetime) {
        return 'Waiting'; 
    } elseif ($current_datetime >= $reservation_datetime && $current_datetime <= $end_datetime) {
        return 'In Progress'; 
    } else {
        return 'Completed';
    }
}
// delete reservation and projector
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete-reservation'])) {
    if (!isset($_POST['reserve_id']) || !isset($_POST['proj_id'])) {
        echo "<script>alert('Reservation or Projector ID missing!');</script>";
        exit();
    }

    $reservation_id = $_POST['reserve_id'];
    $proj_id = $_POST['proj_id'];

    // projector associated with the specific reservation
    $sql_check_association = "SELECT * FROM reservation WHERE reserve_id = ? AND proj_id = ?";
    $stmt_check = $conn->prepare($sql_check_association);
    if ($stmt_check === false) {
        die("Error in query preparation for association check: " . $conn->error);
    }
    $stmt_check->bind_param("ii", $reservation_id, $proj_id);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        // delete the reservation
        $delete_sql = "DELETE FROM reservation WHERE reserve_id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        if ($delete_stmt === false) {
            die("Error in query preparation for reservation deletion: " . $conn->error);
        }
        $delete_stmt->bind_param("i", $reservation_id);

        if ($delete_stmt->execute()) {
            // projector is still used in any other reservation
            $sql_check_projector_usage = "SELECT * FROM reservation WHERE proj_id = ?";
            $stmt_usage_check = $conn->prepare($sql_check_projector_usage);
            if ($stmt_usage_check === false) {
                die("Error in query preparation for projector usage check: " . $conn->error);
            }
            $stmt_usage_check->bind_param("i", $proj_id);
            $stmt_usage_check->execute();
            $usage_result = $stmt_usage_check->get_result();

            // no other reservation is using this projector, delete
            if ($usage_result->num_rows == 0) {
                // delete the projector
                $sql_delete_projector = "DELETE FROM projector WHERE proj_id = ?";
                $stmt_projector = $conn->prepare($sql_delete_projector);
                if ($stmt_projector === false) {
                    die("Error in query preparation for projector removal: " . $conn->error);
                }
                $stmt_projector->bind_param("i", $proj_id);

                if ($stmt_projector->execute()) {
                    echo "<script>alert('Reservation removed successfully!');</script>";
                } else {
                    echo "<script>alert('Failed to remove projector!');</script>";
                }
                $stmt_projector->close();
            } else {
                echo "<script>alert('Reservation removed successfully! Projector is still in use by other reservations.');</script>";
            }

            $stmt_usage_check->close();
        } else {
            echo "<script>alert('Failed to remove reservation!');</script>";
        }

        $delete_stmt->close();
    } else {
        echo "<script>alert('The specified reservation does not match the projector!');</script>";
    }
    $stmt_check->close();
}            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - CIT ProJector Reservation</title>

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
        .user-name {
            font-size: 17px;
            color: white;
            margin-left: 7px; 
            margin-bottom: 0px; 
        }
        .user-name:hover {
            color: #d276e9;
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
            padding: 12px 20px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s background-color;
        }
        .reserve-button:hover{
            background-color: #aa5bc4;
        }
        .body{
            margin-top: -50px;
        }
        /*text configuration*/
        .text-container{
            display: 100vh;
            margin-top: 100px;
        }
        .text-container h1{
            font-size: clamp(30px, 7vw + 1.25rem, 70px);
            font-weight: 900;
            color: #471847;
        }
        .text-container p{
            font-size: clamp(10px, 20px, 35px);
        }
        .text-container .j{
            font-size: clamp(30px, 7vw + 1.25rem , 90px);
            font-weight: bold;
            color: #FECC6B;
            animation: animate 1.5s ease infinite alternate;
        }
        /*text animation*/
        @keyframes animate{
            from{
                text-shadow: 0 0 20px #471847;
            }
            to{
                text-shadow: 0 0 20px #FECC6B;
            
            }
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

        th, td {
            padding: 8px;
        text-align: center;
        }
        /*Pop up*/
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
        .table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 10px 0 20px 0;
            border: 3px solid #471847;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            margin-bottom: 150px;
        }
        /* Header row styling */
        .table th {
            background-color: #471847;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 16px;
            border-bottom: 2px solid #fff;
        }
        /* Data cell styling */
        .table td {
            font-size: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            border: 1px solid #ddd; 
        }

        /* Alternating row colors */
        .table tr:nth-child(odd) {
            background-color: #f3f3f3;
        }

        .table tr:nth-child(even) {
            background-color: white;
        }
        /* hover for rows */
        .table tr:hover {
            background-color: #e7e7e7;
        }
        /* general button styling */
        .btn {
            padding: 8px 8px; 
            font-size: 13px; 
            border-radius: 3px;
            cursor: pointer;
        }
        /* remove button styling */
        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333; 
        }
        .btn-sm {
            padding: 4px 8px; 
            font-size: 11px; 
        }
        .dashboard .card {
            background-color: #471847;
            color: white;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            transition: transform 0.3s ease;
        }
        .dashboard .card:hover {
            transform: translateY(-5px);
        }
        .dashboard .card h3 {
            color: #FECC6B;
            font-size: 20px;
        }
        .dashboard .card p {
            margin: 5px 0;
        }

    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
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
                    <h1 class="mb-0" style="flex-grow: 1; text-align: center; font-size: 30px; padding-bottom: 10px;"><span style="color: white; font-weight: bolder;">CIT PRO</span><span style="color: #FECC6B; font-weight: bolder; font-size: 50px;">J</span><span style="color: white; font-weight: bolder;">ECTOR RESERVATION - ADMIN</span> </h1>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-regular fa-user profile" style="cursor: pointer;" onclick="showPopup()"></i>
                    </button>
                        <!-- Popup for account user -->
                        <div class="popup" id="accountPopup">
                            <span class="close" onclick="closePopup()">&times;</span>
                            <img src="images/account-icon.svg" class="account-image">
                            <h4 class="username" style="font-size: 15px;"><?php echo isset($_SESSION['Username']) ? htmlspecialchars($_SESSION['Username'], ENT_QUOTES, 'UTF-8') : 'Guest'; ?></h4>
                            <h2 class="name"><?php echo isset($_SESSION['Name']) ? htmlspecialchars($_SESSION['Name'], ENT_QUOTES, 'UTF-8') : 'Anonymous'; ?></h2>
                            <h3 class="position"><?php echo isset($_SESSION['Role']) ? htmlspecialchars($_SESSION['Role'], ENT_QUOTES, 'UTF-8') : 'Undefined Role'; ?></h3>
                            <div class="bout">
                                <button type="submit" class="btn-sign-out" name="sign-out" onclick="showSignOutPopup()">Sign Out</button>
                            </div>
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

                    function closeError() {
                        document.getElementById("errorPopup").style.display = "none";
                    }

                    function confirmSignOut() {
                        window.location.href = "sign-out.php";
                    }
                </script>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <!-- Pop-up for Account User -->
    <div class="popup" id="accountPopup">
        <span class="close" onclick="closePopup()">&times;</span>
            <img src="images/account-icon.svg" class="account-image">
            <h4 class="username" style="font-size: 15px;"><?php echo $_SESSION['Username']; ?></h4>
            <h2 class="name"><?php echo $_SESSION['Name']; ?></h2>
            <h3 class="position"><?php echo $_SESSION['Role']; ?></h3>
            <div class="bout"><button type="submit" class="btn-sign-out" name="sign-out" onclick="showSignOutPopup()">Sign Out</button></div>
    </div>

    <!-- Confirm sign-out pop-up -->
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

        function closeError() {
            document.getElementById("errorPopup").style.display = "none";
        }

        function confirmSignOut() {
            // Redirect to sign-out.php
            window.location.href = "sign-out.php";
        }
    </script>

    <div class="main">
        <section class="body">
            <div class="container">
                <div class="row">
                    <div class="h1-text col-lg-12 text-center">
                        <h1 style="margin-top: 80px; margin-bottom: 30px; font-size: 40px;"><span style="color: #FECC6B; font-weight: bolder;">DASH</span><span style="color: #471847; font-weight: bolder;">BOARD</span></h1>
                    </div>
                </div>

                <?php
                // initialize totals of:
                $total_projectors = 0;
                $total_reservations = 0;
                $total_users = 0;
                $total_messages = 0;

                // total projectors
                $sql_projectors = "SELECT COUNT(proj_id) AS total_projectors FROM projector";
                $result_projectors = $conn->query($sql_projectors);
                if ($result_projectors->num_rows > 0) {
                    $row = $result_projectors->fetch_assoc();
                    $total_projectors = $row['total_projectors'];
                }

                // total reservations
                $sql_reservations = "SELECT COUNT(reserve_id) AS total_reservations FROM reservation";
                $result_reservations = $conn->query($sql_reservations);
                if ($result_reservations->num_rows > 0) {
                    $row = $result_reservations->fetch_assoc();
                    $total_reservations = $row['total_reservations'];
                }

                // total users
                $sql_users = "SELECT COUNT(*) AS total_users FROM user WHERE role != 'CIT-Admin'";
                $result_users = $conn->query($sql_users);
                if ($result_users->num_rows > 0) {
                    $row = $result_users->fetch_assoc();
                    $total_users = $row['total_users'];
                }

                // total messages
                $sql_messages = "SELECT COUNT(contact_id) AS total_messages FROM contact";
                $result_messages = $conn->query($sql_messages);
                if ($result_messages->num_rows > 0) {
                    $row = $result_messages->fetch_assoc();
                    $total_messages = $row['total_messages'];
                }

                // calculate percentages
                $total = $total_projectors + $total_reservations + $total_users + $total_messages;
                $projector_percentage = $total > 0 ? round(($total_projectors / $total) * 100, 2) : 0;
                $reservation_percentage = $total > 0 ? round(($total_reservations / $total) * 100, 2) : 0;
                $user_percentage = $total > 0 ? round(($total_users / $total) * 100, 2) : 0;
                $message_percentage = $total > 0 ? round(($total_messages / $total) * 100, 2) : 0;
                ?>

                <!-- dashboard tables -->
                <div class="dashboard mb-4">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <a href="projectors.php" class="text-decoration-none">
                                <div class="card shadow p-3">
                                    <img src="images/projector.svg" alt="Projector Image" class="card-img-top" style="padding-bottom: 15px; padding-top: 10px; height: 150px; object-fit: contain; color: #FECC6B;">
                                    <h3 style= "padding-top: 5px;">Projector Engagement</h3>
                                    <p class="display-5"><?php echo $total_projectors; ?></p>
                                    <p><?php echo $projector_percentage; ?>%</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="reservations.php" class="text-decoration-none">
                                <div class="card shadow p-3">
                                <img src="images/calendar.svg" alt="Reservation Image" class="card-img-top" style="padding-bottom: 15px; padding-top: 10px; height: 150px; object-fit: contain; color: #FECC6B;">
                                    <h3 style= "padding-top: 5px;">Total Reservations</h3>
                                    <p class="display-5"><?php echo $total_reservations; ?></p>
                                    <p><?php echo $reservation_percentage; ?>%</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="users.php" class="text-decoration-none">
                                <div class="card shadow p-3">
                                <img src="images/users.svg" alt="User Image" class="card-img-top" style="padding-bottom: 15px; padding-top: 10px; height: 150px; object-fit: contain; color: #FECC6B;">
                                    <h3 style= "padding-top: 5px;">Total Users</h3>
                                    <p class="display-5"><?php echo $total_users; ?></p>
                                    <p><?php echo $user_percentage; ?>%</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="messages.php" class="text-decoration-none">
                                <div class="card shadow p-3">
                                <img src="images/concern.svg" alt="Concern Image" class="card-img-top" style="padding-bottom: 15px; padding-top: 10px; height: 150px; object-fit: contain; color: #FECC6B;">
                                    <h3 style= "padding-top: 5px;">Customer Concerns</h3>
                                    <p class="display-5"><?php echo $total_messages; ?></p>
                                    <p><?php echo $message_percentage; ?>%</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Projector</th>
                                <th>Name</th>
                                <th>Institutional Email</th>
                                <th>Role</th>
                                <th>Room</th>
                                <th>Date</th>
                                <th>Starting Time</th>
                                <th>Ending Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>

                                <?php
                                    include 'connection.php';
                                    $sql = "SELECT r.reserve_id, r.proj_id, r.room, r.date, r.start_time, r.end_time, 
                                            u.name, u.username, u.role, p.proj_name 
                                            FROM reservation r 
                                            JOIN USER u ON r.user_id = u.user_id 
                                            JOIN projector p ON r.proj_id = p.proj_id";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0):
                                        while ($row = $result->fetch_assoc()):
                                ?>
                                <tr>
                                <td><?php echo $row['proj_name']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td><?php echo $row['room']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td>
                                    <?php 
                                        // convert start_time to 12-hour format
                                        echo date("h:i A", strtotime($row['start_time'])); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        // convert end_time to 12-hour format
                                        echo date("h:i A", strtotime($row['end_time'])); 
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        // calculate the reservation status
                                        $status = getReservationStatus($row['date'], $row['start_time'], $row['end_time']);
                                        echo $status;
                                    ?>
                                </td>
                                <td>
                                    <form method="post" class="d-inline">
                                        <input type="hidden" name="reserve_id" value="<?php echo $row['reserve_id']; ?>">
                                        <input type="hidden" name="proj_id" value="<?php echo $row['proj_id']; ?>"> 
                                        <button type="button" 
                                            id="remove-btn-<?php echo $row['reserve_id']; ?>-<?php echo $row['proj_id']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete(<?php echo $row['reserve_id']; ?>, <?php echo $row['proj_id']; ?>)">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                                </tr>
                                <?php
                                        endwhile;
                                    else:
                                ?>
                                <tr>
                                    <td colspan="10" class="text-center">No reservations found.</td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script>
        // getElementById 
    function confirmDelete(reserveId, projId) {
        var buttonId = 'remove-btn-' + reserveId + '-' + projId;
        var button = document.getElementById(buttonId);

        if (button && confirm('Are you sure you want to remove this reservation?')) {
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = ''; 

            // inputs for reserve_id and proj_id
            var reserveInput = document.createElement('input');
            reserveInput.type = 'hidden';
            reserveInput.name = 'reserve_id';
            reserveInput.value = reserveId;

            var projInput = document.createElement('input');
            projInput.type = 'hidden';
            projInput.name = 'proj_id';
            projInput.value = projId;

            // append inputs to the form
            form.appendChild(reserveInput);
            form.appendChild(projInput);

            // delete-reservation button and append to the form
            var deleteButton = document.createElement('input');
            deleteButton.type = 'hidden';
            deleteButton.name = 'delete-reservation';
            form.appendChild(deleteButton);

            // append the form to the body and submit it
            document.body.appendChild(form);
            form.submit();
        }
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