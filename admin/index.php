<?php
@session_start();
if (!$_SESSION['admin']) {
    header("location:login.php");
    exit;

} else {
    header("location:user.php");
    exit;
}
