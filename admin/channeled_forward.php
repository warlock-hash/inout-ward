<?php require_once "../includes/admin/header.php"; ?>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
            href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Start Left menu area -->
<?php require_once "../includes/admin/side_bar.php";

require "../app/manager/channeled_forward_manager.php";
$original_path = "";
$path = "";
if (isset($_GET['path'])) {
    $path = $_GET['path'];
    $original_path = $path;
    $path = base64_decode($path);
//    echo $path;
//    exit();
}
$latter_id = "";
if (isset($_GET['id'])) {
    $latter_id = $_GET['id'];
    $latter_id = base64_decode($latter_id);
}
$inoutid = "";
if (isset($_GET['inoutid'])) {
    $inoutid = $_GET['inoutid'];
}

?>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php require_once "../includes/admin/nav.php"; ?>
        <?php
        $user_obj = $_SESSION['Member_obj'];
        $user_id = $user_obj[0]['USER_ID'];
        $bool = false;
        $point = "";
        $mesg = "";
        if (isset($_GET['mesg'])) {
            $bool = true;
            $point = $_GET['mesg'];
        }

        $columns = "LETTERS_ID,`SUBJECT`,FILE_NO,POSTAGE_CHARGES,LETTER_IMAGE,REMARKS";
        $table = "letter_detail";
        $condition = "LETTERS_ID='$latter_id'";
        $letter_detail = getDataStaticQuery($columns, $table, $condition);

        $pre_outward_no = getLastOutWardNo($user_id);
        if (!$pre_outward_no) {
            $pre_outward_no = 0;
        }

        $list = array();
        $list = explode(',', $path);
        //    print_r($list);
        //    echo "<br>";
        $sender_list = getSenderList($list);
        //    echo "<br>";
        //    print_r($sender_list);
        //    exit();

        //    $new_list=array();
        //    if (sizeof($list)>1){
        //        for ($i=1;$i<sizeof($list);$i++){
        //            $new_list[$i]=$list[$i];
        //        }
        //    }else{
        //        $new_list[1] = -1;
        //    }
        //    echo "<br>";
        //    echo "<br>";
        //    echo "<br>";
        //    print_r($original_path);
        //    echo "<br>";
        //    print_r(base64_decode($original_path));
        //    echo "<br>";
        //    print_r($new_list);
        //    exit();
        //    $coulmns="DEPT_ID,FAC_ID,INST_ID,DEPT_NAME,IS_INST,`CODE`,REMARKS,USER_TEMP,PASS_TEMP,CITY_NAME,PERCENTAGE,COUNTER,PHD_COUNTER,MS_COUNTER,MPHIL_COUNTER,`STATUS`,DESIGNATION";
        //    $table="department";
        //    $condition="DEPT_ID='$list[0]'";
        //    $dept_detail=getDataStaticQuery($coulmns,$table,$condition);
        $current_date = Date('m/d/Y');

        ?>

        <div id="min-height" class="container-fluid" style="padding:30px">
            <div class="content">

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <div class="card text-center ">
                                <h2>Channeled Forward</h2>
                            </div>
                            <form action="channeled_forward_handler.php"
                                  onsubmit="return confirm('Are You Sure To Send Letter')" method="post"
                                  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Previous Outward No
                                                <span class="text-danger"></span></label>
                                            <input type="text" class="form-control" value="<?= $pre_outward_no ?>"
                                                   disabled/>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Outward No
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="outward_no" class="form-control" name="outward_no"
                                                   value="<?= $pre_outward_no ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Outward Date
                                                <span class="text-danger">*</span></label>
                                            <input type="text" id="outward_date" value="<?= $current_date ?>"
                                                   class="form-control" name="outward_date" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="top-margin">
                                            <label for="exampleInput1" class="bmd-label-floating">Subject
                                                <span class="text-danger">*</span></label>
                                            <input type="hidden" id="subject"
                                                   value="<?php echo $letter_detail[0]['SUBJECT']; ?>" name="subject"
                                                   hidden>
                                            <input type="text" class="form-control"
                                                   value="<?php echo $letter_detail[0]['SUBJECT']; ?>" name="subj"
                                                   disabled/>
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
                                            <label for="exampleInput1" class="bmd-label-floating">Send To
                                                <span class="text-danger">*</span></label>
                                            <select class="form-control" id="send_to" name="send_to" required>
                                                <option value="0">---Select A Option---</option>
                                                <?php
                                                foreach ($sender_list as $key) {
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
                                            <label for="exampleInput1" class="bmd-label-floating">Select File
                                                <span class="text-danger"></span></label>
                                            <input type="file" class="form-control" id="letter" name="letter">
                                            <?php if ($letter_detail[0]['LETTER_IMAGE'] == null) { ?>
                                                <span style="color: red">This letter's origin sender has not provide any file.</span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <div class="top-margin">
                                            <input type="hidden" name="inoutid" value="<?php echo $inoutid; ?>" hidden>
                                            <input type="hidden" name="letter_id"
                                                   value="<?php echo base64_encode($latter_id); ?>" hidden>
                                            <input type="hidden" name="original_path"
                                                   value="<?php echo $original_path; ?>" hidden>
                                            <input type="hidden" name="counter"
                                                   value="<?php echo base64_encode(sizeof($list)) ?>">

                                            <input type="submit" value="Send" name="send" id="send"
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
        <script>
            document.getElementById('<?= $point ?>').style.borderColor = '#f73905';
        </script>
        <?php require_once "../includes/admin/footer_area.php"; ?>
    </div>

<?php require_once "../includes/admin/footer.php"; ?>