<?php
session_start();
if (!isset($_SESSION['Member_obj'])){
    header("Location: ../public/index.php");
}
session_unset();
session_destroy();
header("Location: ../public/index.php");
