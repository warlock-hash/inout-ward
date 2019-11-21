<?php require_once "../includes/admin/header.php"; ?>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
            href="http://browsehappy.com/">upgrade
        your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
<?php require_once "../includes/admin/side_bar.php";

require "../app/manager/inward_view_manager.php";
$user_id = "";
if (isset($_SESSION['Member_obj'])) {
    $obj = $_SESSION['Member_obj'];
    $user_id = $obj[0]['USER_ID'];
}

$order = "";
if (isset($_GET['order'])) {
    $order = $_GET['order'];
}

?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php require_once "../includes/admin/nav.php"; ?>


        <div id="min-height" class="container-fluid" style="padding:30px">
            <?php
            $table_column = ["Inward No", "Subject", "File No", "Postage Charges", "Date", "Sended By", "Outward No", "Remarks", "View Latter", "Forward Letter"];
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
                                                <h1>INWARD LIST</h1>
                                            </div>
                                            <div class="col-md-5"></div>
                                            <div class="col-md-1">
                                                <div class="top-margin" style="padding-top: 10px">
                                                    <h4>Order By</h4>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" onchange="changeOrder()" id="order_by">
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
                                        <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                               data-show-columns="true" data-show-pagination-switch="true"
                                               data-show-refresh="true" data-key-events="true" data-show-toggle="true"
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
                                            $list = getAllRecievedLetters($user_id);
                                            if ($order == 1) {
                                                $list = getAllUnreceivedLetters($user_id);
                                            } elseif ($order == 2) {
                                                $list = getOnlyReceivedLetters($user_id);
                                            } elseif ($order == 3) {
                                                $list = getAllReceivedLettersOrderBy($user_id, "iow.OUT_DATE ASC");
                                            } elseif ($order == 4) {
                                                $list = getAllReceivedLettersOrderBy($user_id, "iow.OUT_DATE DESC");
                                            }
                                            //                                    print_r($list);
                                            //                                    exit();
                                            foreach ($list as $key) {
                                                //echo "<script>console.log('loop is running');</script>";
                                                ?>
                                                <tr>
                                                    <td></td>
                                                    <?php
                                                    $status = $key['STATUS'];
                                                    if ($status == 0) {
                                                        ?>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['INWARD_NO']; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['SUBJECT']; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['FILE_NO']; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['POSTAGE_CHARGES']; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['IN_DATE']; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['NAME']; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['OUTWARD_NO']; ?></strong>
                                                        </td>
                                                        <td>
                                                            <strong style="text-decoration: solid; color: #ff1a26;"><?php echo $key['REMARKS']; ?></strong>
                                                        </td>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <td><?php echo $key['INWARD_NO']; ?></td>
                                                        <td><?php echo $key['SUBJECT']; ?></td>
                                                        <td><?php echo $key['FILE_NO']; ?></td>
                                                        <td><?php echo $key['POSTAGE_CHARGES']; ?></td>
                                                        <td><?php echo $key['IN_DATE']; ?></td>
                                                        <td><?php echo $key['NAME']; ?></td>
                                                        <td><?php echo $key['OUTWARD_NO']; ?></td>
                                                        <td><?php echo $key['REMARKS']; ?></td>
                                                        <?php
                                                    }
                                                    $path_image = $key['LETTER_IMAGE'];
                                                    $path_image = base64_encode($path_image);
                                                    $id = $key['INOUT_ID'];
                                                    $id = base64_encode($id);
                                                    $latter_id = $key['LETTERS_ID'];
                                                    $latter_id = base64_encode($latter_id);
                                                    $inoutid = $key['INOUT_ID'];
                                                    $inoutid = base64_encode($inoutid);
                                                    $status = $key['STATUS'];

                                                    ?>
                                                    <td>
                                                        <?php

                                                        if ($path_image != null) {
                                                            if ($status == 0) {

                                                                echo "<button onclick='doRedirect(\"recievelatter.php?path=$path_image&id=$id\")' data-toggle=\"tooltip\" class=\"pd-setting-ed\" data-original-title=\"Receive Letter\">
                                                    <i class='fa fa-download' aria-hidden='true'></i>
                                                    </button>";

                                                            } else {

                                                                echo "<button onclick='doRedirect(\"viewlatter.php?path=$path_image\")' data-toggle=\"tooltip\" class=\"pd-setting-ed\" data-original-title=\"View Letter\">
                                                    <i class='fa fa-desktop' aria-hidden='true'></i>
                                                    </button>";

                                                            }
                                                        } else {

                                                            if ($status == 0) {
                                                                echo "<button onclick='doRedirect(\"recievelatter.php?id=$id\")' 
                                                                          data-toggle=\"tooltip\" class=\"pd-setting-ed\" 
                                                                          data-original-title=\"Mark Letter as Receive\">
                                                                          <i class='fa fa-download' aria-hidden='true'></i>
                                                                      </button>";
                                                            } else {
                                                                echo "<span style='color: red; font-size-adjust: inherit'>
                                                                            <b>Does not contain any file</b>
                                                                      </span>";
                                                            }

                                                        }

                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php
                                                        $is_channeled = $key['IS_CHANNELED'];
                                                        $path = $key['PATH'];
                                                        //                                                if (!$path){
                                                        //                                                    $path= -2;
                                                        //                                                }
                                                        //                                                echo $path;
                                                        if ($is_channeled == 1 && $status == 1 && $path != -1 && $path) {
                                                            $path = base64_encode($path);
                                                            echo "<button onclick=\"doRedirect('channeled_forward.php?path=$path&id=$latter_id&inoutid=$inoutid')\" data-toggle='tooltip' class='pd-setting-ed' data-original-title='Forward Letter'>
                                                                <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                                                </button>";
                                                        }
                                                        ?>
                                                    </td>

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
        </div>

        <?php require_once "../includes/admin/footer_area.php"; ?>
    </div>
    <script>
        function doRedirect(URL) {
            //alert(id);
            window.location.href = URL;
        }

        function changeOrder() {
            let e = document.getElementById("order_by");
            let val = e.options[e.selectedIndex].value;
//        console.log(val);
            if (val != -1) {
                console.log(val + " inside the if");
                if (val == 1) {
                    window.location.href = 'inward_view.php?order=' + val;
                } else if (val == 2) {
                    window.location.href = 'inward_view.php?order=' + val;
                } else if (val == 3) {
                    window.location.href = 'inward_view.php?order=' + val;
                } else if (val == 4) {
                    window.location.href = 'inward_view.php?order=' + val;
                } else {
                    window.location.href = 'inward_view.php';
                }

            }

        }
    </script>
<?php require_once "../includes/admin/footer.php"; ?>