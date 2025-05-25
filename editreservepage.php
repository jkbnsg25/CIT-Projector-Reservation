<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation - CIT ProJector Reservation</title>
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
        .reserve-btn{
            background-color: #9F63FF;
            color: #fff;
            font-size:14px;
            font-weight: 400;
            padding: 10px 70px;
            border-radius: 30px;
            border: none;
            transition: 0.3s background-color;
        }
        .reserve-btn:hover{
            background-color: #aa5bc4;
        }
        /*body modifications*/
        body{
            display: flex;
            flex-direction: column;
            height: 160vh;
        }
        .body{
            margin-top: 20px;
            height: 160vh;
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
          border-radius: 6px;
          color: black;
          width: 400px !important;
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
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-profile">
                    <div class="icon-wrapper">
                        <i class="fa-regular fa-user profile" style="cursor: pointer;" onclick="showPopup()"></i>
                    </div>
                    </div>
                    </button>
                    </div>
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

<!-- Confirm sign-out pop-up -->
    <div class="pop-up" id="confirmSignoutPopup">
        <p id="errorMessage" style="color: black; padding: 10px; margin-top: 5px; text-align: center;">Are you sure you want to sign out?</p>
        <button type="button" class="btn-yes" onclick="confirmSignOut()" style="margin-right: 10px; margin-left: 80px; margin-bottom: 10px;">Yes</button>
        <button type="button" class="btn-cancel" onclick="closeConfirmSignout()" style="margin-left: 10px;">No</button>
    </div>

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
                <a href="reservepage.php">
                    <i class="fa-solid fa-arrow-left" style="margin-top: 10px;font-size:30px;color:#471847"></i>
                </a>
                <div class="h1-text col-lg-12 text-center">
                    <h1 style="margin-top: -10px; margin-bottom: 30px;"><span style="color: #471847; font-weight: bolder;">CIT Pro</span><span style="color: #FECC6B; font-weight: bolder; font-size: 45px;">J</span><span style="color: #471847; font-weight: bolder;">ector</span> | Edit Reservation</h1>
                    <h3 style="margin-top: 10px; margin-bottom: 10px;">
                        <?php 
                        if (isset($_SESSION['p_name']) && !empty($_SESSION['p_name'])) {
                            echo $_SESSION['p_name']; 
                        } else {
                            echo "Name not available"; 
                        }
                        ?>
                    </h3>
                </div>
            </div>
            
            <div class="container d-flex justify-content-center">
                <div class="row"  style="margin-top: 20px;">
                    <div class="col-12">
                        <img src="images/projector-img.svg" alt="projector image" style="border: 1px solid #471847;border-radius:5px;width:300px;">
                    </div>
                </div>
            </div>
            <form action="" method=post>
            <div class="container" style="margin-top:30px;width:220px;">
                <div class="row">
                    <div class="col-12">
                        <label for="Room">Room:</label>
                        <select class="form-select" name="Room" id="Room" aria-label="Default select example" required >
                            <option disabled selected>Select</option>
                            <option value="ICT 1">ICT 1</option>
                            <option value="ICT 2">ICT 2</option>
                            <option value="ICT 3">ICT 3</option>
                            <option value="ICT 4">ICT 4</option>
                            <option value="ICT 5">ICT 5</option>
                            <option value="ICT 6">ICT 6</option>
                            <option value="ICT 7">ICT 7</option>
                            <option value="ICT 8">ICT 8</option>
                            <option value="CL 1">CL 1</option>
                            <option value="CL 2">CL 2</option>
                            <option value="CL 3">CL 3</option> 
                        </select>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top:20px;width:220px;">
    <div class="row">
        <div class="col-12">
            <label for="dateInput">Date:</label>
            <input class="form-control" type="date" name="Date" id="dateInput">
        </div>
    </div>
</div>
<div class="container" style="margin-top:20px;width:220px;">
    <div class="row">
        <div class="col-12">
            <label for="startTime">Start Time:</label>
            <input class="form-control" name="StartTime" type="time" id="startTime" min="07:30" max="18:30">

            <label for="endTime">End Time:</label>
            <input class="form-control" name="EndTime" type="time" id="endTime" min="07:30" max="18:30">
        </div>
    </div>
</div>
<div class="container text-center" style="margin-top: 20px;">
    <div class="row" style="margin-bottom: 50px;">
        <div class="col-12">
            <button type="submit" class="reserve-btn" name="reserve-btn">Reserve</button>
        </div>
    </div>
</div>
</div>
</form>

<!-- date and time constraint -->
<script>
    const startTimeInput = document.getElementById("startTime");
    const endTimeInput = document.getElementById("endTime");
    const dateInput = document.getElementById("dateInput");
    const reserveButton = document.querySelector('.reserve-btn');

    function checkTimeRange() {
        const earliestTime = new Date().setHours(7, 30, 0, 0);
        const latestTime = new Date().setHours(18, 30, 0, 0);
        const selectedTime = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), startTimeInput.value.split(':')[0], startTimeInput.value.split(':')[1]);

        if (!(selectedTime >= earliestTime && selectedTime <= latestTime)) {
            showErrorMessage("Projector can only be reserved between 7:30 AM and 6:30 PM.");
            return false;
        }
        return true;
    }

    function validateDate() {
        const selectedDate = new Date(dateInput.value);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
            showErrorMessage("The date for projector reservations should be today or in the future.");
            dateInput.value = "";
            return false;
        }

        const dayOfWeek = selectedDate.getDay();
        if (dayOfWeek === 0 || dayOfWeek === 6) {
            showErrorMessage("The office is closed on weekends. Projector cannot be reserved.");
            dateInput.value = "";
            return false;
        }
        return true;
    }

    function validateCurrentDayTime() {
        const now = new Date();
        const selectedDate = new Date(dateInput.value);
        if (selectedDate.toDateString() === now.toDateString()) {
            const startTime = startTimeInput.value;
            const endTime = endTimeInput.value;

            const [startHours, startMinutes] = startTime.split(':');
            const [endHours, endMinutes] = endTime.split(':');
            const startDateTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), startHours, startMinutes);
            const endDateTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), endHours, endMinutes);

            if (startDateTime <= now || endDateTime <= now) {
                showErrorMessage("Projector cannot be reserved for a past time on today's date. Adjust the reservation time.");
                dateInput.value = "";
                startTimeInput.value = "";
                endTimeInput.value = "";
                return false;
            }
        }
        return true;
    }

    reserveButton.addEventListener("click", function (event) {
        const roomSelect = document.getElementById("Room");
        
        if (!dateInput.value || !startTimeInput.value || !endTimeInput.value) {
                showErrorMessage("Please fill out the form.");
                event.preventDefault();
                return;
        }
        if (roomSelect.selectedIndex === 0 ) {
            showErrorMessage("Please select a room.");
            event.preventDefault();
            return;
        }
        if (!checkTimeRange() || !validateDate() || !validateCurrentDayTime()) {
            event.preventDefault();
        }
    });

    startTimeInput.addEventListener("input", function () {
        if (!checkTimeRange()) {
            showErrorMessage("Projector can only be reserved between 7:30 AM and 6:30 PM.");
            startTimeInput.value = "07:30";
        }
    });

    endTimeInput.addEventListener("input", function () {
        if (!checkTimeRange()) {
            showErrorMessage("Projector can only be reserved between 7:30 AM and 6:30 PM.");
            endTimeInput.value = "18:30";
        }
    });

    const today = new Date().toISOString().split("T")[0];
    dateInput.min = today;

    // function to show error message pop-up
    function showErrorMessage(message) {
        document.getElementById("errorErrorMessage").innerText = message;
        document.getElementById("errornotifPopup").style.display = "block";
    }

    // function to close error message pop-up
    function closeError() {
        document.getElementById("errornotifPopup").style.display = "none";
    }
</script>

    <!-- Error message pop-up -->
    <div class="popUp" id="errornotifPopup">
    <span class="close" onclick="closeError()">&times;</span>
        <p id="errorErrorMessage" style="padding: 15px; margin-top: 10px; text-align: center;"></p>
    </div>

    <!-- Success message pop-up -->
    <div class="popUp" id="successnotifPopup">
        <p id="successMessage" style=" padding: 10px; margin-top: 10px; text-align: center;"></p>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // JavaScript function to show error message pop-up
        function showErrorMessage(message) {
            document.getElementById("errorErrorMessage").innerText = message;
            document.getElementById("errornotifPopup").style.display = "block";
        }

        // JavaScript function to show success message pop-up
        function showSuccessMessage(message) {
            document.getElementById("successMessage").innerText = message;
            document.getElementById("successnotifPopup").style.display = "block";
        }

        // JavaScript function to close error or success message pop-up
        function closeError() {
            document.getElementById("errornotifPopup").style.display = "none";
            document.getElementById("successnotifPopup").style.display = "none";
        }
</script>

    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 me-auto">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-google"></i>
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
// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php';

$proj_id = $_GET['proj_id'] ?? null; // Check if proj_id is provided
if (!$proj_id) {
    exit("Projector ID is missing.");
}

$proj_name = '';

// Fetch the projector name
$proj_name_sql = "SELECT `proj_name` FROM `projector` WHERE `proj_id` = ?";
$proj_name_stmt = $conn->prepare($proj_name_sql);
$proj_name_stmt->bind_param("i", $proj_id);
$proj_name_stmt->execute();
$proj_name_result = $proj_name_stmt->get_result();

if ($proj_name_result->num_rows > 0) {
    $row = $proj_name_result->fetch_assoc();
    $proj_name = $row['proj_name'];
} else {
    exit("Projector not found.");
}

// Check if the user has a reservation for this projector
$sql = "SELECT * FROM reservation WHERE proj_id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $proj_id, $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    exit("No reservation found for this projector ID.");
}

$reservation = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input fields
    if (!empty($_POST['Room']) && !empty($_POST['Date']) && !empty($_POST['StartTime']) && !empty($_POST['EndTime'])) {
        $room = mysqli_real_escape_string($conn, $_POST['Room']);
        $date = mysqli_real_escape_string($conn, $_POST['Date']);
        $start_time = mysqli_real_escape_string($conn, $_POST['StartTime']);
        $end_time = mysqli_real_escape_string($conn, $_POST['EndTime']);

        // Ensure start time is earlier than end time
        if (strtotime($start_time) >= strtotime($end_time)) {
            echo "<script>showErrorMessage('End time must be later than start time.');</script>";
            exit();
        }

        // Check if the room is already reserved
        $room_conflict_sql = "SELECT * FROM reservation WHERE room = ? AND date = ? AND (
            (start_time <= ? AND end_time > ?) OR
            (start_time < ? AND end_time >= ?)
        )";
        $room_conflict_stmt = $conn->prepare($room_conflict_sql);
        $room_conflict_stmt->bind_param(
            "ssssss",
            $room,
            $date,
            $start_time,
            $start_time,
            $end_time,
            $end_time
        );
        $room_conflict_stmt->execute();
        $room_conflict_result = $room_conflict_stmt->get_result();

        if ($room_conflict_result->num_rows > 0) {
            echo "<script>showErrorMessage('$room is already reserved on $date at " . date("g:i A", strtotime($start_time)) . " to " . date("g:i A", strtotime($end_time)) . ".');</script>";
            exit();
        }

        // Check if the projector is already reserved
        $proj_conflict_sql = "SELECT * FROM reservation WHERE proj_id = ? AND date = ? AND (
            (start_time <= ? AND end_time > ?) OR
            (start_time < ? AND end_time >= ?)
        )";
        $proj_conflict_stmt = $conn->prepare($proj_conflict_sql);
        $proj_conflict_stmt->bind_param(
            "isssss",
            $proj_id,
            $date,
            $start_time,
            $start_time,
            $end_time,
            $end_time
        );
        $proj_conflict_stmt->execute();
        $proj_conflict_result = $proj_conflict_stmt->get_result();

        if ($proj_conflict_result->num_rows > 0) {
            echo "<script>showErrorMessage('$proj_name is already reserved on $date at " . date("g:i A", strtotime($start_time)) . " to " . date("g:i A", strtotime($end_time)) . ".');</script>";
            exit();
        }

        // Update the reservation
        $update_sql = "UPDATE reservation SET room = ?, date = ?, start_time = ?, end_time = ? WHERE proj_id = ? AND user_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssssii", $room, $date, $start_time, $end_time, $proj_id, $_SESSION['user_id']);

        if ($update_stmt->execute()) {
            $successMessage = "Reservation Updated Successfully for $proj_name!";
            echo "<script>
                showSuccessMessage('" . $successMessage . "');
                setTimeout(function() {
                    window.location.href = 'reservepage.php';
                }, 2000);
            </script>";
        } else {
            $errorMessage = "Reservation update failed. Please try again.";
            echo "<script>showErrorMessage('$errorMessage');</script>";
        }
    } else {
        $errorMessage = "Please fill out all fields to update the reservation.";
        echo "<script>showErrorMessage('$errorMessage');</script>";
    }
}
?>
