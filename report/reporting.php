<?php require_once "../includes/admin/header.php"; ?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Left menu area -->
<?php require_once "../includes/admin/side_bar.php"; ?>
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php require_once "../includes/admin/nav.php"; ?>
    <?php require "../app/manager/report_manager.php" ?>
    <?php
    $user_obj = $_SESSION['Member_obj'];
    //        $user_id=$user_obj[0]['DEPT_ID'];
    $user_id = "";
    $sub_department = "";
    $isSuperAdmin="";
    $user_id = $user_obj[0]['USER_ID'];

    if ($user_obj[0]['REMARKS'] == "vc" || $user_obj[0]['REMARKS'] == "super admin") {
        $sub_department = getAllDepartment();
        $isSuperAdmin = "yes";
    } else if ($user_obj[0]['INST_ID'] == 0) {
        $sub_department = getSubDepartmentByHODId($user_id);
    }


    ?>

    <div id="min-height" class="container-fluid" style="padding:30px">
        <div class="content">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="card text-center ">
                            <h2>Reports</h2>
                        </div>
                        <!-- code goes here -->
                        <form action="show_report.php" method="post">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="top-margin">
                                        <label for="report_of_dept" class="bmd-label-floating">Show Report of
                                            <span class="text-danger">*</span></label>
                                        <select class="form-control" id="report_of_dept" name="report_of_dept" required>
                                            <option value="0">---Select A Option---</option>
                                            <option value="<?= $user_id ?>"><?= $user_obj[0]['NAME'] ?></option>
                                            <?php
                                            foreach ($sub_department as $key) {
                                                ?>
                                                <option value="<?= $key['USER_ID'] ?>"><?= $key['NAME'] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="top-margin">
                                        <label for="report_type" class="bmd-label-floating">Report Type
                                            <span class="text-danger">*</span></label>
                                        <select class="form-control" id="report_type" name="report_type" required>
                                            <option value="0">---Select A Option---</option>
                                            <option value="1">Automated Inward &#128628; Outward</option>
                                            <option value="2">Manual Inward &#128628; Outward</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="top-margin">
                                        <label for="report_of" class="bmd-label-floating">Report of
                                            <span class="text-danger">*</span></label>
                                        <select class="form-control" id="report_of" name="report_of" required>
                                            <option value="0">---Select A Option---</option>
                                            <option value="1">Inward</option>
                                            <option value="2">Outward</option>
                                            <option value="3">All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                <div class="col-md-2">
                                    <div class="top-margin" style="padding-top: 10px">
                                        <input type="hidden" value="<?= $isSuperAdmin ?>" name="isSuperAdmin" hidden />
                                        <input type="submit" value="Show" name="show" id="show"
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

<?php require_once "../includes/admin/footer.php"; ?>
