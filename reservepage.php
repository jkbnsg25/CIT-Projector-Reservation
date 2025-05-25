<?php
session_start();
include 'connection.php'; 

if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} 

if (isset($_POST['proj_id'])) {
    $_SESSION['Proj_ID'] = $_POST['proj_id'];
}

    if(isset($_POST['reserve_1'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_1'];
        $_SESSION['p_name'] = $_POST['Proj_Name_1'];
    } elseif(isset($_POST['reserve_2'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_2'];
        $_SESSION['p_name'] = $_POST['Proj_Name_2'];
    } elseif(isset($_POST['reserve_3'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_3'];
        $_SESSION['p_name'] = $_POST['Proj_Name_3'];
    } elseif(isset($_POST['reserve_4'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_4'];
        $_SESSION['p_name'] = $_POST['Proj_Name_4'];
    } elseif(isset($_POST['reserve_5'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_5'];
        $_SESSION['p_name'] = $_POST['Proj_Name_5'];
    } elseif(isset($_POST['reserve_6'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_6'];
        $_SESSION['p_name'] = $_POST['Proj_Name_6'];
    } elseif(isset($_POST['reserve_7'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_7'];
        $_SESSION['p_name'] = $_POST['Proj_Name_7'];
    } elseif(isset($_POST['reserve_8'])) {
        $_SESSION['p_id'] = $_POST['Proj_ID_8'];
        $_SESSION['p_name'] = $_POST['Proj_Name_8'];
    }

    if(isset($_POST['reserve_1'])) {
        $proj_id = $_POST['Proj_ID_1'];
        $proj_name = $_POST['Proj_Name_1'];
        
        // handle reservation for Projector 1
        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);

        $stmt->execute();

        $stmt->close();
        header("Location: reserve.php");
        exit(); 

    } elseif(isset($_POST['reserve_2'])) {
        $proj_id = $_POST['Proj_ID_2'];
        $proj_name = $_POST['Proj_Name_2'];
        
        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);
        $stmt->execute();
        $stmt->close();
        header("Location: reserve.php");
        exit();
    } elseif(isset($_POST['reserve_3'])) {
        $proj_id = $_POST['Proj_ID_3'];
        $proj_name = $_POST['Proj_Name_3'];

        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);    
        $stmt->execute();    
        $stmt->close();
        header("Location: reserve.php");
        exit(); 
        
    } elseif(isset($_POST['reserve_4'])) {
        $proj_id = $_POST['Proj_ID_4'];
        $proj_name = $_POST['Proj_Name_4'];
        
        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);
        $stmt->execute();
        $stmt->close();
        header("Location: reserve.php");
        exit(); 
    } elseif(isset($_POST['reserve_5'])) {
        $proj_id = $_POST['Proj_ID_5'];
        $proj_name = $_POST['Proj_Name_5'];
        
        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);
        $stmt->execute();
        $stmt->close();
        header("Location: reserve.php");
        exit(); 
    } elseif(isset($_POST['reserve_6'])) {
        $proj_id = $_POST['Proj_ID_6'];
        $proj_name = $_POST['Proj_Name_6'];
        
        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);
        $stmt->execute();
        $stmt->close();
        header("Location: reserve.php");
        exit(); 
    } elseif(isset($_POST['reserve_7'])) {
        $proj_id = $_POST['Proj_ID_7'];
        $proj_name = $_POST['Proj_Name_7'];      
        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);
        $stmt->execute();
        $stmt->close();
        header("Location: reserve.php");
        exit(); 
    } elseif(isset($_POST['reserve_8'])) {
        // handle reservation for Projector 8
        $proj_id = $_POST['Proj_ID_8'];
        $proj_name = $_POST['Proj_Name_8'];
        $sql = "INSERT IGNORE INTO `projector`(`proj_id`, `proj_name`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $proj_id, $proj_name);
        // execute the statement
        $stmt->execute();
        // close statement
        $stmt->close();
        header("Location: reserve.php");
        exit(); // stop execution
    }

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation - CIT ProJector Reservation</title>
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
        body{
            display: flex;
            flex-direction: column;
            height: 160vh;
        }
        /*dropdown modifications*/
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
        /*table*/
        th, td {
        padding: 8px;
        text-align: center;
        }
        .table {
            margin-left: 50px;
            margin-right: 50px;
            width:1200px;
            
        }
        /* reserve button modification*/
        .reserve-btn{
            background-color: #9F63FF;
            color: #fff;
            font-size:14px;
            font-weight: 400;
            padding: 9px 20px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s background-color;
        }
        .reserve-btn:hover{
            background-color: #aa5bc4;
        }    
        .main{
            overflow: overlay;
        }
        .main::-webkit-scrollbar {
            width: 0;
            display: none;
        }
        /*card modification*/
        .card-img-top {
            width: 100%; 
            height: auto; 
        }
        .card-row {
            margin-left: -10px;
            margin-right: -10px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: 0.4s;
        }
        .card:hover {
            box-shadow: 0 0 20px #9F63FF;
        }
        /* filter icon modification */
        .drop{
            background-color: #471847;
        }
        .filter-container{
            display: flex;
            justify-content: flex-end;
        }
        .filter-button .btn-secondary {
            background-color: #471847;
            border-color: #471847;
            color: white;
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
        h5{
            font-size: 17px;
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
    <div class="main">
        <section class="body">
            <div class="container">
                <div class="row">
                    <div class="h1-text col-lg-12 text-center">
                    <h1 style="margin-top: 30px; margin-bottom: 20px; font-size: 40px;"><span style="color: #471847; font-weight: bolder;">CIT PRO</span><span style="color: #FECC6B; font-weight: bolder; font-size: 50px;">J</span><span style="color: #471847; font-weight: bolder;">ECTOR RESERVATION</span> </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="table-responsive">
                        <table class="table" style="border:#471847 3px solid; margin-top: 10px; margin-bottom: 20px;">
                        <tr>
                        <th scope="col" style="background-color: #471847; color:#fff">Projector</th>
                        <th scope="col" style="background-color: #471847; color:#fff">Name</th>
                        <th scope="col" style="background-color: #471847; color:#fff">Room</th>
                        <th scope="col" style="background-color: #471847; color:#fff">Date</th>
                        <th scope="col" style="background-color: #471847; color:#fff">Starting Time</th>
                        <th scope="col" style="background-color: #471847; color:#fff">Ending Time</th>
                        </tr>

<?php
    include 'connection.php';
    // displaying reservations in the table
    $sql = "SELECT reservation.user_id, user.name, projector.proj_name, reservation.room, reservation.date, reservation.start_time, reservation.end_time
            FROM reservation
            INNER JOIN user ON reservation.user_id = user.user_id
            INNER JOIN projector ON reservation.proj_id = projector.proj_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // get row data
        while($row = $result->fetch_assoc()) {
            $proj_name = $row['proj_name'];
            $name = $row['name'];
            $room = $row['room'];
            $date = $row['date'];
            // convert start_time and end_time to 12-hour format
            $start_time = date("g:i A", strtotime($row['start_time']));
            $end_time = date("g:i A", strtotime($row['end_time']));
            ?>
        
            <tr>
            <td><?php echo $proj_name; ?></td>
            <td><?php echo $name; ?></td> 
            <td><?php echo $room; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $start_time; ?></td>
            <td><?php echo $end_time; ?></td>
            </tr>
        
        <?php
        }
    } else {
        echo "0 results";
    }
?>

    </table>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                <div class="row d-flex justify-content-center" style="padding-bottom: 50px;">
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem;margin:20px;">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_1" value="1">   
                        <h5 class="card-title text-center">CIT Projector 1</h5>
                                <?php
                                    $proj_id = 1; 
                                        
                                    // check if user is logged in and get user_id from session
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // user is the one who made the reservation
                                                ?>
                                                <form action="viewreservepage.php" method="post">
                                                <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // user did not make the reservation
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        }
                                    }     
                                ?>
                        </div>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem; margin:20px;">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_2" value="2">                        
                                <h5 class="card-title text-center">CIT Projector 2</h5>
                                <?php
                                    $proj_id = 2;                                       
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // usser is the one who made the reservation
                                                ?>
                                                <form action="viewreservepage.php" method="post">
                                                    <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // user did not make the reservation
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        } 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem;margin:20px;">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_3" value="3">
                                <h5 class="card-title text-center" name="Projector 3">CIT Projector 3</h5>
                                <?php
                                    $proj_id = 3; // proj_id no.                                      
                                    // check if user is logged in and get user_id from session
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // Show view reservation button
                                                ?>
                                                <form action="view_reservation.php" method="post">
                                                    <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // Show reserve now button
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        } 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem;margin:20px;">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_4" value="4">
                                <h5 class="card-title text-center" name="Projector 4">CIT Projector 4</h5>
                                <?php
                                    $proj_id = 4; // proj_id no.
                                    // check if user is logged in and get user_id from session
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // Show view reservation button
                                                ?>
                                                <form action="view_reservation.php" method="post">
                                                    <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // Show reserve now button
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        } 
                                    }
                                    ?>
                        </div>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem;margin:20px">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_5" value="5">
                            <h5 class="card-title text-center" name="Projector 5">CIT Projector 5</h5>
                            <?php
                                    $proj_id = 5; // proj_id no.
                                    // check if user is logged in and get user_id from session
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // Show  view reservation button
                                                ?>
                                                <form action="view_reservation.php" method="post">
                                                    <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // Show reserve now button
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        } 
                                    }
                                ?>
                        </div>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem;margin:20px;">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_6" value="6">
                                <h5 class="card-title text-center" name="Projector 6">CIT Projector 6</h5>
                                <?php
                                    $proj_id = 6; // proj_id no.
                                        
                                    // check if user is logged in and get user_id from session
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // Show view reservation button
                                                ?>
                                                <form action="view_reservation.php" method="post">
                                                    <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // Show reserve now button
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        } 
                                    }
                                    ?>
                        </div>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem;margin:20px;">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_7" value="7">
                                <h5 class="card-title text-center" name="Projector 7">CIT Projector 7</h5>
                                <?php
                                    $proj_id = 7; // proj_id no.
                                        
                                    // check if user is logged in and get user_id from session
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // Show view reservation button
                                                ?>
                                                <form action="view_reservation.php" method="post">
                                                    <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // Show reserve now button
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        } 
                                    }
                                    ?>
                        </div>
                    </div>
                    <div class="card col-lg-4 col-md-6 col-sm-6" style="width: 15rem;margin:20px;">
                        <img class="card-img-top" src="images/projector-img.svg" alt="Card image cap">
                        <div class="card-body text-center">
                        <input type="hidden" name="Proj_ID_8" value="8">
                                <h5 class="card-title text-center" name="Projector 8">CIT Projector 8</h5>
                                <?php
                                    $proj_id = 8; // proj_id no.
                                        
                                    // check if user is logged in and get user_id from session
                                    if(isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];
                                        
                                        // sql statement to check reservation
                                        $sql_check_reservation = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
                                        $stmt = $conn->prepare($sql_check_reservation);
                                        $stmt->bind_param("ii", $proj_id, $user_id);
                                        $stmt->execute();
                                        $result_check_reservation = $stmt->get_result();
                                        
                                        // check if the query was successful
                                        if ($result_check_reservation !== false) {
                                            // check if the user is the one who made the reservation
                                            if ($result_check_reservation->num_rows > 0) {
                                                // Show view reservation button
                                                ?>
                                                <form action="view_reservation.php" method="post">
                                                    <input type="hidden" name="Proj_ID" value="<?php echo $proj_id; ?>">
                                                    <button type="button" class="btn reserve-btn" onclick="window.location.href='viewreservepage.php?proj_id=<?php echo $proj_id; ?>'">View</button>
                                                </form>
                                                <?php
                                            } else {
                                                // Show reserve now button
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" name="Proj_ID_<?php echo $proj_id; ?>" value="<?php echo $proj_id; ?>">
                                                    <input type="hidden" name="Proj_Name_<?php echo $proj_id; ?>" value="CIT Projector <?php echo $proj_id; ?>">
                                                    <button type="submit" class="btn reserve-btn" name="reserve_<?php echo $proj_id; ?>">Reserve Now</button>
                                                </form>
                                                <?php
                                            }
                                        } 
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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