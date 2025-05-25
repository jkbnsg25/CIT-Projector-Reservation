<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'connection.php'; 

$proj_id = mysqli_real_escape_string($conn, $_GET['proj_id']);

$sql = "DELETE FROM reservation WHERE proj_id=? AND user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $proj_id, $_SESSION['user_id']);

if ($stmt->execute()) {
    $successMessage = "Reservation Deleted Successfully!";
    echo "<script>showSuccessMessage('$successMessage');</script>";
} else {
    $errorMessage = "Failed to delete reservation.";
    echo "<script>showErrorMessage('$errorMessage');</script>";
}
?>