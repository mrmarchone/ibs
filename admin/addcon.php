<?php
session_start();
include"connect.php";
include"header.php";
?>
<?php
if (isset($_SESSION['username'])) {?>
<?php include"navbar.php";?>
<?php
array($_FILES['file']);
?>
<?php
} else {
    header('Location: dashboard.php');
    exit();
}
?>
<?php
include"footer.php";
?>