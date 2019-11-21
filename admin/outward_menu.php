
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


    <div id = "min-height" class="container-fluid" style="padding:30px">
        <div class="content">

            <div class="row">
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-3 col-md-6">
                    <a href="letter_outward.php">
                        <div class="card" >
                            <div class="card-header" style="height:90px;text-align:center;">
                                <h6 style="padding-top:8%">Outward A Letter</h6>
                            </div>
                            <div class="card-body " style="text-align:center;">

                                <img src="../includes/admin/images/Send_mail.png" alt="Outward A Letter" style="max-height:200px;" >
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-3 col-md-6">
                    <a href="outward_through_proper_channel.php">
                        <div class="card" >
                            <div class="card-header" style="height:90px;text-align:center;">
                                <h6 style="padding-top:8%">Letter Through Proper Channel</h6>
                            </div>
                            <div class="card-body " style="text-align:center;">

                                <img src="../includes/admin/images/through_proper_channel.png" alt="Letter Through Proper Channel" style="max-height:200px;" >
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-3 col-md-6">
                    <a href="outward_view.php">
                        <div class="card" >
                            <div class="card-header" style="height:90px;text-align:center;">
                                <h6 style="padding-top:8%">Outwarded Letters</h6>
                            </div>
                            <div class="card-body " style="text-align:center;">

                                <img src="../includes/admin/images/letter_box.png" alt="Outward's Letters" style="max-height:200px;" >
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    <?php require_once "../includes/admin/footer_area.php";?>
</div>

<?php require_once "../includes/admin/footer.php";?>