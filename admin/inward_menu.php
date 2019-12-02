
<?php require_once "../includes/admin/header.php";?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Left menu area -->
<?php require_once "../includes/admin/side_bar.php";?>
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php require_once "../includes/admin/nav.php";?>

    <?php
    require "../app/manager/inward_view_manager.php";
    $obj = $_SESSION['Member_obj'];
    $user_id="";
    $user_id = $obj[0]['USER_ID'];
    $status = false;
    $status_mesg = "";
    if (isset($_GET['status'])) {
        $status = true;
        $status_mesg = $_GET['status'];
    }
    $data = getAllUnreceivedLetters($user_id);
    ?>

    <div id = "min-height" class="container-fluid" style="padding:30px">
        <div class="content">

            <?php if ($data){ ?>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="marquee col-md-10">
                        <?php
                        $string="";
                        foreach ($data as $key){
                            $string .= $key['SUBJECT']." By ".$key['NAME'].",";
                        }
                        $string = trim($string,',');
                        if ($string){?>
                            <p style="color: #0b75c9"><?php echo $string; ?></p>
                        <?php }?>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-4 col-md-4">
                    <a href="inward_view.php">
                        <div class="card" >
                            <span class="badge badge-light"><?php if (sizeof($data) > 0){
                                    echo sizeof($data);
                                } ?></span>
                            <span class="sr-only">unread messages</span>
                            <div class="card-header" style="height:90px;text-align:center;">
                                <h6 style="padding-top:8%">Inbox</h6>
                            </div>
                            <div class="card-body " style="text-align:center;">

                                <img src="../includes/admin/images/receiving.png" alt="Inbox" style="max-height:200px;" >
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-2"></div>
                <div class="col-lg-4 col-md-4">
                    <a href="manual_inward.php">
                        <div class="card" >
                            <div class="card-header" style="height:90px;text-align:center;">
                                <h6 style="padding-top:8%">Manual Inward</h6>
                            </div>
                            <div class="card-body " style="text-align:center;">

                                <img src="../includes/admin/images/manual_inward.png" alt="Letter Through Proper Channel" style="max-height:200px;" >
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-1 col-md-1"></div>
            </div>

        </div>
    </div>

    <?php require_once "../includes/admin/footer_area.php";?>
</div>

<?php require_once "../includes/admin/footer.php";?>