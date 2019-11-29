<?php require_once "../includes/admin/header.php";
require "../app/manager/inward_view_manager.php";
?>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade
        your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
<?php require_once "../includes/admin/side_bar.php"; ?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php require_once "../includes/admin/nav.php"; ?>

        <?php
        $user_obj = $_SESSION['Member_obj'];
        $user_id = $user_obj[0]['USER_ID'];
        $last_inward_no = getLastInwardNo($user_id);
        $point = "";
        if (isset($_GET['mesg'])) {
            $point = $_GET['mesg'];
        }
        $current_date = Date('m/d/Y');
        ?>


        <div id="min-height" class="container-fluid" style="padding:30px">
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="card text-center ">
                                <h2>Manual Inward</h2>
                            </div>
                            <form action="manual_inward_handler.php" method="post"
                                  onsubmit="return confirm('Are You Sure To Send Letter')"
                                  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Previous Inward No
                                                <span class="text-danger"></span></label>
                                            <input type="text" value="<?= $last_inward_no ?>" class="form-control"
                                                   disabled/>
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
                                                   value="<?= $last_inward_no ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Inward Date
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="inward_date" value="<?= $current_date ?>"
                                                   class="form-control" name="inward_date" required>
                                            <!--                                        <input type="date" id="outward_date" class="form-control" name="outward_date"  required />-->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Subject
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="subject" class="form-control" name="subject"
                                                   required/>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">File No
                                                <span class="text-danger"></span></label>
                                            <input type="text" id="file_no" class="form-control" name="file_no"/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Postage Charges
                                                <span class="text-danger"></span></label>
                                            <input type="text" id="postage_charges" class="form-control"
                                                   name="postage_charges"/>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Remarks
                                                <span class="text-danger"></span></label>
                                            <input type="text" id="remarks" class="form-control" name="remarks"/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Send By
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="send_by" class="form-control" name="send_by" required />
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
<!--                                <div class="row">-->
<!--                                    <div class="col-md-1"></div>-->
<!--                                    <div class="col-md-10">-->
<!--                                        <div class="top-margin" id="img_holder">-->
<!--                                            <label for="exampleInput1" class="bmd-label-floating">Select File-->
<!--                                                <span class="text-danger"></span></label>-->
<!--                                            <input type="file" accept=".doc,.docx,.xls,.xlsx,.ppt,.pptx,.pdf,.jpeg,.jpg"-->
<!--                                                   class="form-control" id="letter" name="letter"/>-->
<!--                                        </div>-->
<!--                                        <div class="top-margin" id="manual_input">-->
<!---->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-1"></div>-->
<!--                                </div>-->
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <div class="top-margin" id="final_point">
                                            <input type="submit" value="Receive" name="receive" id="receive"
                                                   class="btn btn-round btn-success">
                                        </div>
                                    </div>
                                    <div class="col-md-5"></div>
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
        <?php if ($point != null){ ?>
        document.getElementById('<?= $point ?>').style.borderColor = '#f73905';
        <?php } ?>
    </script>

<?php require_once "../includes/admin/footer.php"; ?>