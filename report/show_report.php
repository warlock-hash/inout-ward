<?php require_once "../includes/admin/header.php"; ?>
<?php
require "../app/manager/report_manager.php";
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
        $report_of_dept_id = "";
        $report_type = "";
        $report_of = "";
        $isSuperAdmin = -1;
        $report_for_user_obj = "";

        if (isset($_POST['show'])) {

            if ($_POST['report_of_dept']) {
                if (isValidData($_POST['report_of_dept'])) {
                    $report_of_dept_id = $_POST['report_of_dept'];
                }
            }

            if ($_POST['isSuperAdmin']) {
                if (isValidData($_POST['isSuperAdmin'])) {
                    $isSuperAdmin = $_POST['isSuperAdmin'];
                }
            }

            if ($_POST['report_type']) {
                if (isValidData($_POST['report_type'])) {
                    $report_type = $_POST['report_type'];
                }
            }

            if ($_POST['report_of']) {
                if (isValidData($_POST['report_of'])) {
                    $report_of = $_POST['report_of'];
                }
            }

            $report_for_user_obj = getDepartmentById($report_of_dept_id, $isSuperAdmin);

        }

        $order = "";
        if (isset($_GET['order'])) {
            $order = $_GET['order'];

            if (isset($_GET['id'])) {
                $report_of_dept_id = $_GET['id'];
            }

            if (isset($_GET['rType'])) {
                $report_type = $_GET['rType'];
            }

            if (isset($_GET['rOf'])) {
                $report_of = $_GET['rOf'];
            }

            if (isset($_GET['sp'])) {
                $isSuperAdmin = $_GET['sp'];
            }
        }

        ?>

        <div id="min-height" class="container-fluid" style="padding:30px">
            <!-- Automated Reporting Section -->
            <?php
            if ($report_type == 1) {
                ?>
                <?php
                if ($report_of == 1) {
                    ?>
                    <!-- Reporting Section for Automated Inwards -->
                    <?php
                    $table_column = ["Inward No", "Subject", "File No", "Postage Charges", "Date", "Sended By", "Outward No", "Remarks", "Seen", "Is Channeled"];
                    ?>
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                            <div class="main-sparkline13-hd">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h1>Inward Report For <?= $report_for_user_obj['NAME'] ?></h1>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-1">
                                                        <div class="top-margin" style="padding-top: 10px">
                                                            <h4>Order By</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control"
                                                                onchange="changeOrderOfAutomatedInward()"
                                                                id="order_by">
                                                            <option value="-1">--Select Order By--</option>
                                                            <option value="1">All Unreceived Letters</option>
                                                            <option value="2">All Received Letters</option>
                                                            <option value="3">Date Ascending</option>
                                                            <option value="4">Date Descending</option>
                                                            <option value="5">Default View</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">

                                                <div id="toolbar">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                       data-search="true"
                                                       data-show-columns="true" data-show-pagination-switch="true"
                                                       data-show-refresh="true" data-key-events="true"
                                                       data-show-toggle="true"
                                                       data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true"
                                                       data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($table_column as $col) {
                                                            ?>

                                                            <th data-field="<?= $col ?>"
                                                                onclick="sortTable(<?= $i ?>)"><?= $col ?></th>
                                                            <?php
                                                            $i++;
                                                        }
                                                        ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $list = getAllRecievedLetters($report_of_dept_id);
                                                    if ($order == 1) {
                                                        $list = getAllUnreceivedLetters($report_of_dept_id);
                                                    } elseif ($order == 2) {
                                                        $list = getOnlyReceivedLetters($report_of_dept_id);
                                                    } elseif ($order == 3) {
                                                        $list = getAllReceivedLettersOrderBy($report_of_dept_id, "iow.OUT_DATE ASC");
                                                    } elseif ($order == 4) {
                                                        $list = getAllReceivedLettersOrderBy($report_of_dept_id, "iow.OUT_DATE DESC");
                                                    }
                                                    //                                    print_r($list);
                                                    //                                    exit();
                                                    foreach ($list as $key) {
                                                        //echo "<script>console.log('loop is running');</script>";
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $key['INWARD_NO']; ?></td>
                                                            <td><?php echo $key['SUBJECT']; ?></td>
                                                            <td><?php echo $key['FILE_NO']; ?></td>
                                                            <td><?php echo $key['POSTAGE_CHARGES']; ?></td>
                                                            <td><?php echo $key['IN_DATE']; ?></td>
                                                            <td><?php echo $key['NAME']; ?></td>
                                                            <td><?php echo $key['OUTWARD_NO']; ?></td>
                                                            <td><?php echo $key['REMARKS']; ?></td>
                                                            <td><?php
                                                                if ($key['STATUS'] == 0) {
                                                                    echo "<span style='color: red; font-size-adjust: inherit'>
                                                                            <b>No</b>
                                                                      </span>";
                                                                } else {
                                                                    echo "<span style='color: #24ff17; font-size-adjust: inherit'>
                                                                            <b>Yes</b>
                                                                      </span>";
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                if ($key['IS_CHANNELED'] == 0) {
                                                                    echo "<span style='color: #171eff; font-size-adjust: inherit'>
                                                                            <b>No</b>
                                                                      </span>";
                                                                } else {
                                                                    echo "<span style='color: #171eff; font-size-adjust: inherit'>
                                                                            <b>Yes</b>
                                                                      </span>";
                                                                }
                                                                ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>

                                                    </tbody>


                                                </table>


                                            </div> <!-- /.table-stats -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($report_of == 2) {
                    ?>
                    <!-- Reporting Section for Automated Outwards -->
                    <?php
                    $table_column = ["Outward No", "Subject", "File No", "Postage Charges", "Outward Date", "Sended To", "Inward No", "Remarks", "Seen", "Is Channeled"];
                    ?>
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                            <div class="main-sparkline13-hd">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h1>Outward Report for <?= $report_for_user_obj['NAME'] ?></h1>
                                                    </div>
                                                    <div class="col-md-5"></div>
                                                    <div class="col-md-1">
                                                        <div class="top-margin" style="padding-top: 10px">
                                                            <h4>Order By</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control"
                                                                onchange="changeOrderOfAutomatedOutward()"
                                                                id="order_by">
                                                            <option value="-1">--Select Order By--</option>
                                                            <option value="1">Outward Date Ascending</option>
                                                            <option value="2">Outward Date Descending</option>
                                                            <option value="3">Outward No Ascending</option>
                                                            <option value="4">Outward No Descending</option>
                                                            <option value="5">Default View</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">

                                                <div id="toolbar">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                       data-search="true" data-show-columns="true"
                                                       data-show-pagination-switch="true" data-show-refresh="true"
                                                       data-key-events="true" data-show-toggle="true"
                                                       data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true"
                                                       data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($table_column as $col) {
                                                            ?>

                                                            <th data-field="<?= $col ?>"
                                                                onclick="sortTable(<?= $i ?>)"><?= $col ?></th>
                                                            <?php
                                                            $i++;
                                                        }
                                                        ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $list = getAllSendedLetters($report_of_dept_id);
                                                    if ($order == 1) {
                                                        $list = getAllSendedLetterOrderBy($report_of_dept_id, "iow.OUT_DATE ASC");
                                                    } elseif ($order == 2) {
                                                        $list = getAllSendedLetterOrderBy($report_of_dept_id, "iow.OUT_DATE DESC");
                                                    } elseif ($order == 3) {
                                                        $list = getAllSendedLetterOrderBy($report_of_dept_id, "iow.OUTWARD_NO ASC");
                                                    } elseif ($order == 4) {
                                                        $list = getAllSendedLetterOrderBy($report_of_dept_id, "iow.OUTWARD_NO DESC");
                                                    }

                                                    foreach ($list as $key) {
                                                        ?>
                                                        <tr>
                                                            <td></td>

                                                            <td><?php echo $key['OUTWARD_NO']; ?></td>
                                                            <td><?php echo $key['SUBJECT']; ?></td>
                                                            <td><?php echo $key['FILE_NO']; ?></td>
                                                            <td><?php echo $key['POSTAGE_CHARGES']; ?></td>
                                                            <td><?php echo $key['OUT_DATE']; ?></td>
                                                            <td><?php echo $key['DEPT_NAME']; ?></td>
                                                            <td><?php echo $key['INWARD_NO']; ?></td>
                                                            <td><?php echo $key['REMARKS']; ?></td>
                                                            <td><?php
                                                                if ($key['STATUS'] == 0) {
                                                                    echo "<span style='color: red; font-size-adjust: inherit'>
                                                                            <b>No</b>
                                                                      </span>";
                                                                } else {
                                                                    echo "<span style='color: #24ff17; font-size-adjust: inherit'>
                                                                            <b>Yes</b>
                                                                      </span>";
                                                                }
                                                                ?></td>
                                                            <td><?php
                                                                if ($key['IS_CHANNELED'] == 0) {
                                                                    echo "<span style='color: #171eff; font-size-adjust: inherit'>
                                                                            <b>No</b>
                                                                      </span>";
                                                                } else {
                                                                    echo "<span style='color: #171eff; font-size-adjust: inherit'>
                                                                            <b>Yes</b>
                                                                      </span>";
                                                                }
                                                                ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div> <!-- /.table-stats -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
            } elseif ($report_type == 2) {
                ?>
                <?php
                if ($report_of == 1) {
                    ?>
                    <!-- Reporting Section for Manual Inwards -->
                    <?php
                    $table_column = ["Inward No", "Subject", "File No", "Postage Charges", "Date", "Sended By", "Remarks"];
                    ?>
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                            <div class="main-sparkline13-hd">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h1>Manual Inward Report
                                                            For <?= $report_for_user_obj['NAME'] ?></h1>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-1">
                                                        <div class="top-margin" style="padding-top: 10px">
                                                            <h4>Order By</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control"
                                                                onchange="changeOrderOfManualInward()"
                                                                id="order_by">
                                                            <option value="-1">--Select Order By--</option>
                                                            <option value="1">All Unreceived Letters</option>
                                                            <option value="2">All Received Letters</option>
                                                            <option value="3">Date Ascending</option>
                                                            <option value="4">Date Descending</option>
                                                            <option value="5">Default View</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">

                                                <div id="toolbar">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                       data-search="true"
                                                       data-show-columns="true" data-show-pagination-switch="true"
                                                       data-show-refresh="true" data-key-events="true"
                                                       data-show-toggle="true"
                                                       data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true"
                                                       data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($table_column as $col) {
                                                            ?>

                                                            <th data-field="<?= $col ?>"
                                                                onclick="sortTable(<?= $i ?>)"><?= $col ?></th>
                                                            <?php
                                                            $i++;
                                                        }
                                                        ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $list = getAllManualReceivedLatter($report_of_dept_id);
                                                    foreach ($list as $key) {
                                                        //echo "<script>console.log('loop is running');</script>";
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $key['INWARD_NO']; ?></td>
                                                            <td><?php echo $key['SUBJECT']; ?></td>
                                                            <td><?php echo $key['FILE_NO']; ?></td>
                                                            <td><?php echo $key['POSTAGE_CHARGES']; ?></td>
                                                            <td><?php echo $key['IN_DATE']; ?></td>
                                                            <td><?php echo $key['SENDER_NAME']; ?></td>
                                                            <td><?php echo $key['LETTER_REMARKS']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div> <!-- /.table-stats -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                } elseif ($report_of == 2) {
                    ?>
                    <!-- Reporting Section for Manual Outwards -->
                    <?php
                    $table_column = ["Outward No", "Subject", "File No", "Postage Charges", "Date", "Sent to", "Remarks"];
                    ?>
                    <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-list">
                                        <div class="sparkline13-hd">
                                            <div class="main-sparkline13-hd">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h1>Manual Outward Report
                                                            For <?= $report_for_user_obj['NAME'] ?></h1>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-1">
                                                        <div class="top-margin" style="padding-top: 10px">
                                                            <h4>Order By</h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select class="form-control"
                                                                onchange="changeOrderOfManualOutward()"
                                                                id="order_by">
                                                            <option value="-1">--Select Order By--</option>
                                                            <option value="1">All Unreceived Letters</option>
                                                            <option value="2">All Received Letters</option>
                                                            <option value="3">Date Ascending</option>
                                                            <option value="4">Date Descending</option>
                                                            <option value="5">Default View</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">

                                                <div id="toolbar">
                                                    <select class="form-control dt-tb">
                                                        <option value="">Export Basic</option>
                                                        <option value="all">Export All</option>
                                                        <option value="selected">Export Selected</option>
                                                    </select>
                                                </div>
                                                <table id="table" data-toggle="table" data-pagination="true"
                                                       data-search="true"
                                                       data-show-columns="true" data-show-pagination-switch="true"
                                                       data-show-refresh="true" data-key-events="true"
                                                       data-show-toggle="true"
                                                       data-resizable="true" data-cookie="true"
                                                       data-cookie-id-table="saveId" data-show-export="true"
                                                       data-click-to-select="true" data-toolbar="#toolbar">
                                                    <thead>
                                                    <tr>
                                                        <th data-field="state" data-checkbox="true"></th>
                                                        <?php
                                                        $i = 0;
                                                        foreach ($table_column as $col) {
                                                            ?>

                                                            <th data-field="<?= $col ?>"
                                                                onclick="sortTable(<?= $i ?>)"><?= $col ?></th>
                                                            <?php
                                                            $i++;
                                                        }
                                                        ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $list = getAllManualSendedLatters($report_of_dept_id);
                                                    foreach ($list as $key) {
                                                        //echo "<script>console.log('loop is running');</script>";
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $key['OUTWARD_NO']; ?></td>
                                                            <td><?php echo $key['SUBJECT']; ?></td>
                                                            <td><?php echo $key['FILE_NO']; ?></td>
                                                            <td><?php echo $key['POSTAGE_CHARGES']; ?></td>
                                                            <td><?php echo $key['OUT_DATE']; ?></td>
                                                            <td><?php echo $key['RECEIVING_NAME']; ?></td>
                                                            <td><?php echo $key['LETTER_REMARKS']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div> <!-- /.table-stats -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>

        <?php require_once "../includes/admin/footer_area.php"; ?>
    </div>
    <script>
        function changeOrderOfManualOutward() {

        }

        function changeOrderOfManualInward() {

        }

        function changeOrderOfAutomatedInward() {
            let e = document.getElementById("order_by");
            let val = e.options[e.selectedIndex].value;
            let id =<?= $report_of_dept_id ?>;
            let rType =<?= $report_type ?>;
            let rOf =<?= $report_of ?>;
            let isSuperAdmin =<?= $isSuperAdmin ?>;
//        console.log(val);
            if (val != -1) {
                console.log(val + " inside the if");
                if (val == 1) {
                    window.location.href = "show_report.php?order=" + val + "&id="
                        + id + "&rtype=" + rType + "&rOf=" + rOf + "&sp=" + isSuperAdmin;
                } else if (val == 2) {
                    window.location.href = 'show_report.php?order=' + val;
                } else if (val == 3) {
                    window.location.href = 'show_report.php?order=' + val;
                } else if (val == 4) {
                    window.location.href = 'show_report.php?order=' + val;
                } else {
                    window.location.href = 'show_report.php';
                }
            }
        }

        function changeOrderOfAutomatedOutward() {
            let e = document.getElementById("order_by");
            let val = e.options[e.selectedIndex].value;
//        console.log(val);
            if (val != -1) {
//            console.log(val+" inside the if");
                if (val == 1) {
                    window.location.href = 'outward_view.php?order=' + val;
                } else if (val == 2) {
                    window.location.href = 'outward_view.php?order=' + val;
                } else if (val == 3) {
                    window.location.href = 'outward_view.php?order=' + val;
                } else if (val == 4) {
                    window.location.href = 'outward_view.php?order=' + val;
                } else {
                    window.location.href = 'outward_view.php';
                }

            }

        }
    </script>
<?php require_once "../includes/admin/footer.php"; ?>