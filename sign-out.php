<?php
Session_start();
Session_destroy();
header("location:landingpage.php");
?>