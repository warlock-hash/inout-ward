<?php require_once "../includes/admin/header.php"; ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Left menu area -->

<?php
require_once "../app/manager/inward_view_manager.php";
$user_obj = $_SESSION['Member_obj'];
$user_id = $user_obj[0]['USER_ID'];
$path = "";
$pre_inward_no = "";
$point = "";
if (isset($_GET['path'])) {
    $path = $_GET['path'];

}
$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pre_inward_no = getLastInwardNo($user_id);
    if (!$pre_inward_no) {
        $pre_inward_no = 0;
    }
//    $id=base64_decode($id);

}
if (isset($_GET['mesg'])) {
    $point = $_GET['mesg'];
}


?>

<?php require_once "../includes/admin/side_bar.php"; ?>
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php require_once "../includes/admin/nav.php"; ?>

    <div id="min-height" class="container-fluid" style="padding:30px">
        <div class="content">

            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="card text-center ">
                            <h2>Receive Latter</h2>
                        </div>
                        <form action="recievelatter.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <?php if ($path == null) { ?>
                                        <div class="alert alert-info" style="text-align: center">
                                            <span><b>Letter does not contain any File.
                                                    So nothing is able to download.
                                                    Enter Inward number to mark this letter as Received.</b>
                                            </span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Previous Inward No
                                            <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" value="<?= $pre_inward_no ?>" disabled/>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="top-margin">
                                        <label for="exampleInput1" class="bmd-label-floating">Inward No
                                            <span class="text-danger">*</span></label>
                                        <input type="text" id="inward_no" class="form-control" name="inward_no"
                                              value="<?= $pre_inward_no ?>" required/>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="hidden" name="id" value="<?= $id ?>" hidden>
                                    <?php if ($path != null) { ?>
                                        <input type="hidden" name="path" value="<?= $path ?>" hidden>
                                    <?php } ?>
                                </div>
                                <div class="col-md-1">
                                    <div class="top-margin">
                                        <input type="submit" class="btn btn-round btn-success" value="Receive"
                                               name="receive">
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php require_once "../includes/admin/footer_area.php"; ?>
</div>
<script>
    document.getElementById('<?= $point ?>').style.borderColor = '#f73905';
</script>
<?php require_once "../includes/admin/footer.php"; ?>
<?php
if (isset($_POST['receive'])) {
    $user_obj = $_SESSION['Member_obj'];
    $user_id = $user_obj[0]['USER_ID'];

    $inward_no = "";
    $id = "";
    $path = "";

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['path'])) {
        $path = $_POST['path'];
    }

    if (isset($_POST['inward_no'])) {
        if (isValidData($_POST['inward_no'])) {
            $inward_no = isValidData($_POST['inward_no']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $inward_no)) {
//                header("Location: recievelatter.php?error=Invalid Input in Inward No Allowed special character - / _ &mesg=inward_no&path=$path&id=$id");
                echo "<script>window.location.href='recievelatter.php?error=Invalid Input in Inward No Allowed special character - / _ &mesg=inward_no&path=$path&id=$id';</script>";
                exit();
            }
        } else {
//            header("Location: recievelatter.php?error=Invalid Input in Inward No Allowed special character - / _ &mesg=inward_no&path=$path&id=$id");
            echo "<script>window.location.href='recievelatter.php?error=Invalid Input in Inward No Allowed special character - / _ &mesg=inward_no&path=$path&id=$id';</script>";
            exit();
        }
    }

    $ret_inward_no = checkInwardNoExistance($inward_no, $user_id);
    $ret_manual_inward_no = checkInwardNoInManualInOutWardExistance($inward_no, $user_id);
    if ($ret_inward_no || $ret_manual_inward_no) {
//        header("Location: recievelatter.php?error=Inward No ".$inward_no." Already Exist&mesg=inward_no&path=$path&id=$id");
        echo "<script> window.location.href='recievelatter.php?error=Inward No " . $inward_no . " Already Exist&mesg=inward_no&path=$path&id=$id'; </script>";
        exit();
    }


//    $check=insertInwradNoAndDate($inward_no,$id);
//    if (!$check){
//        echo "Some thing went Wrong";
//    }
    $id = base64_decode($id);
    $bool = changeStatusToRead($id, $inward_no);
    if (!$bool) {
        echo "Some thing Very Wrong happens";
    }
    if ($bool && $path != null) {
        // To force download the file
//        $path=base64_decode($path);
        echo "<script>
                window.location.href='viewlatter.php?path=$path';
              </script>";
        //Notice: Undefined index: DEPT_ID in C:\xampp\htdocs\inout-ward\admin\recievelatter.php on line 11


        //echo "id is : $id";
        //echo "<br>";
        //echo "<br>";
        //echo "Path is : $path";
        // send the file to the browser
//        header("Cache-Control: no-store");
//        header("Content-Type: application/octet-stream");
//        //header("Content-type: application/msword");
//        header('Content-Disposition: attachment; filename="'. basename($path) . '"');
//        header('Content-Transfer-Encoding: binary');
//        header('Content-Length: '. filesize($path));
//        ob_clean();
//        flush();
//        readfile($path);
        //header("Location: page.php");
//        echo "<script>
//
//                  var anchor=document.getElementById('anchor');
//                  anchor.click();
//                window.location.href='mainPanel.php';
//              </script>";
    }
    //exit();


}
?>
