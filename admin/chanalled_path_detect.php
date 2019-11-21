
<?php require_once "../includes/admin/header.php";?>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Left menu area -->

<?php
require "../app/manager/path_detect_manager.php";
$inout_id;
if (isset($_GET['id'])){
    $inout_id=$_GET['id'];
    $inout_id=base64_decode($inout_id);
}
$origin_path=getCurrentLetterStatus($inout_id);
$path_array=getCompletePath($origin_path[0]['INOUT_ID']);
$complete_path=array_merge($origin_path,$path_array);
?>

<?php require_once "../includes/admin/side_bar.php";?>
<!-- End Left menu area -->
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <?php require_once "../includes/admin/nav.php";?>


    <div id = "min-height" class="container-fluid" style="padding:30px">
        <div class="content">
            <?php //print_r($complete_path);?>
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title">Letter Status</strong>
                            </div>
                            <div class="card-body">
                                <table id="mytableid" class="table table-striped table-bordered">
                                    <thead>
                                    <tr style="text-align: center">
                                        <th class="serial">Subject</th>
                                        <th>Send To</th>
                                        <th>Send By</th>
                                        <th>Inward Date</th>
                                        <th>Outward Date</th>
                                        <th>Seen</th>
                                        <th>Forwarded</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php for ($i=0;$i<sizeof($complete_path);$i++) {?>

                                        <td><?php echo $complete_path[$i]['SUBJECT'];?></td>
                                        <td><?php echo $complete_path[$i]['Send To'];?></td>
                                        <td><?php echo $complete_path[$i]['Send By'];?></td>
                                        <td><?php echo $complete_path[$i]['IN_DATE'];?></td>
                                        <td><?php echo $complete_path[$i]['OUT_DATE'];?></td>
                                        <td><?php if ($complete_path[$i]['STATUS']==1){
//                                                echo "YES";
//                                                echo "<img src='images/tick.png' alt='Yes' />";
                                                echo "<span><strong style='color: #0E993C'>Yes</strong></span>";
                                            }else{
//                                                echo "NO";
//                                                echo "<img src='images/cross.png' alt='No' />";
                                                echo "<span><strong style='color: orangered'>No</strong></span>";
                                            } ?></td>
                                        <td><?php if ($complete_path[$i]['PATH']==-1){
//                                                echo "YES";
//                                                echo "<img src='images/tick.png' alt='Yes' />";
                                                echo "<span><strong style='color: #0E993C'>Yes</strong></span>";

                                            }elseif (!$complete_path[$i]['PATH']){
                                                echo "<span><strong style='color: #dfcb18'>Completed</strong></span>";
                                            }
                                            else{
//                                                echo "NO";
                                                echo "<span><strong style='color: orangered'>Not yet</strong></span>";
                                            } ?></td>

                                        </tbody>
                                    <?php }?>
                                </table>
                                <pre>

        </pre>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <?php require_once "../includes/admin/footer_area.php";?>
</div>

<?php require_once "../includes/admin/footer.php";?>