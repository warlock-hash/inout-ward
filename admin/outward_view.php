
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
    require "../app/manager/outward_view_manager.php";
    $user_id="";
    if (isset($_SESSION['Member_obj'])){
        $obj=$_SESSION['Member_obj'];
        $user_id=$obj[0]['USER_ID'];
    }

    $order="";
    if (isset($_GET['order'])){
        $order=$_GET['order'];
    }

    ?>


    <div id = "min-height" class="container-fluid" style="padding:30px">
        <?php
        $table_column = ["Outward No","Subject","File No","Postage Charges","Outward Date","Sended To","Inward No","Remarks","View Latter","Update Latter","Status"];
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
                                            <h1>OUTWARD LIST</h1>
                                        </div>
                                        <div class="col-md-5"></div>
                                        <div class="col-md-1">
                                            <div class="top-margin" style="padding-top: 10px">
                                                <h4>Order By</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <select class="form-control" onchange="changeOrder()" id="order_by" >
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
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                           data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <?php
                                            $i=0;
                                            foreach($table_column as $col){
                                                ?>

                                                <th data-field="<?=$col?>" onclick="sortTable(<?=$i?>)" ><?=$col?></th>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $list=getAllSendedLetters($user_id);
                                        if ($order == 1){
                                            $list=getAllSendedLetterOrderBy($user_id,"iow.OUT_DATE ASC");
                                        }elseif ($order == 2){
                                            $list=getAllSendedLetterOrderBy($user_id,"iow.OUT_DATE DESC");
                                        }elseif ($order == 3){
                                            $list=getAllSendedLetterOrderBy($user_id,"iow.OUTWARD_NO ASC");
                                        }elseif ($order == 4){
                                            $list=getAllSendedLetterOrderBy($user_id,"iow.OUTWARD_NO DESC");
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

                                                <?php
                                                $status=$key['STATUS'];
                                                $path=$key['LETTER_IMAGE'];
                                                $path=base64_encode($path);
                                                $subject=base64_encode($key['SUBJECT']);
                                                $latter_id=base64_encode($key['LETTERS_ID']);
                                                $inout_id=base64_encode($key['INOUT_ID']);
                                                $is_channeld=$key['IS_CHANNELED'];
                                                ?>

                                                <td>
                                                    <button onclick='doRedirect("viewlatter.php?path=<?php echo $path; ?>")' data-toggle="tooltip" class="pd-setting-ed" data-original-title="View Letter">
                                                        <i class="fa fa-desktop" aria-hidden="true"></i>
                                                    </button>

                                                </td>
                                                <td>
                                                    <?php
                                                    if ($status == 0){
                                                        echo "<button onclick=\"doRedirect('update_latter.php?path=$path&subject=$subject&latter_id=$latter_id&inoutid=$inout_id')\" data-toggle='tooltip' class='pd-setting-ed' data-original-title='View Letter'>
                                                                <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                                                </button>";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($is_channeld == 1){
                                                        echo "<button onclick=\"doRedirect('chanalled_path_detect.php?id=$inout_id')\" data-toggle='tooltip' class='pd-setting-ed' data-original-title='View Letter'>
                                                                <i class='fa fa-binoculars' aria-hidden='true'></i>
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

    <?php require_once "../includes/admin/footer_area.php";?>
</div>

<script>
    function doRedirect(URL){
        //alert(id);
        window.location.href = URL;
    }
    function changeOrder() {
        let e = document.getElementById("order_by");
        let val = e.options[e.selectedIndex].value;
//        console.log(val);
        if (val != -1){
//            console.log(val+" inside the if");
            if (val == 1){
                window.location.href='outward_view.php?order='+val;
            }else if (val == 2){
                window.location.href='outward_view.php?order='+val;
            }else if (val == 3){
                window.location.href='outward_view.php?order='+val;
            }else if (val == 4) {
                window.location.href='outward_view.php?order='+val;
            }else {
                window.location.href='outward_view.php';
            }

        }

    }
</script>

<?php require_once "../includes/admin/footer.php";?>