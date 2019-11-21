<?php
require_once "../app/manager/inward_view_manager.php";
session_start();
if (!isset($_SESSION['Member_obj'])){
    header("Location: ../public/index.php");
}
$path;
if (isset($_GET['path'])){
    $path=$_GET['path'];
}
// To force download the file
//exit();
$path=base64_decode($path);
//echo "id is : $id";
//echo "<br>";
//echo "<br>";
//echo "Path is : $path";
// send the file to the browser
header("Cache-Control: no-store");
header("Content-Type: application/octet-stream");
//header("Content-type: application/msword");
header('Content-Disposition: attachment; filename="'. basename($path) . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '. filesize($path));
//header("Location: mainPanel.php");
ob_clean();
flush();
readfile($path);
exit();