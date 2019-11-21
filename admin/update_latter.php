
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
    $path="";
    if (isset($_GET['path'])){
        $path=$_GET['path'];
        //$path=base64_decode($path);
    }
    $latter_id="";
    if (isset($_GET['latter_id'])){
        $latter_id=$_GET['latter_id'];
        //$latter_id=base64_decode($latter_id);
    }
    $subject="";
    if (isset($_GET['subject'])){
        $subject=$_GET['subject'];
        //$subject=base64_decode($subject);
    }
    $inoutid="";
    if (isset($_GET['inoutid'])){
        $inoutid=$_GET['inoutid'];
        $coulmn="STATUS";
        $table="inout_ward";
        $codition="INOUT_ID=".base64_decode($inoutid);
        $list=getDataStaticQuery($coulmn,$table,$codition);
        if ($list[0]['STATUS']==1){
            echo "<script>alertMsg('Error','Some thing Went Wrong');</script>";
            header("Location: update_latter.php?mesg=error");
            exit();
        }
    }



    if (isset($_POST['send'])){
        $path=$_POST['path'];
        $subject=$_POST['subject'];
        $latter_id=$_POST['latter_id'];
        $inoutid=$_POST['inoutid'];
        $letter="";
        $path=base64_decode($path);
        $subject=base64_decode($subject);
        $latter_id=base64_decode($latter_id);
        $inoutid=base64_decode($inoutid);
        $bool=unlink($path);
        if ($bool){
            echo "<script>
            console.log('File Deleted Sucssesfully');
          </script>";
        }
        if(isset($_FILES['letter'])){
            $member_obj=$_SESSION['Member_obj'];
            $name_addings=$member_obj[0]['DEPT_NAME'];
            $letter = uploadImageByPath($_FILES['letter'],"../images/letters",
                "../images/letters","$inoutid"."_"."$subject"." Sended By ".$name_addings);
        }
        $bool=updateLetterFile($latter_id,$letter);
        if ($bool){
                echo "<script>window.location.href='mainPanel.php?success=Latter has been updated successfully...'</script>";
        }else{
            echo "Something Went Wrong";
        }
    }
    ?>

    <div id = "min-height" class="container-fluid" style="padding:30px">
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h2 class="card-title ">UPDATE LATTER</h2>
                            </div>
                            <div class="card-body">
                                <form action="update_latter.php" class="form-control" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="top-margin">
                                                <label for="exampleInput1" class="bmd-label-floating">Select File
                                                    <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" id="letter" name="letter" required>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <input type="hidden" value="<?php echo $path; ?> " name="path" >
                                        <input type="hidden" value="<?php echo $subject;?> " name="subject" >
                                        <input type="hidden" value="<?php echo $latter_id; ?> " name="latter_id" >
                                        <input type="hidden" value="<?php echo $inoutid; ?>" name="inoutid">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <div class="top-margin">
                                                <input type="submit" value="Send" name="send" id="send" class="btn btn-round btn-success">
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </form>
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