<?php
require "../app/manager/channeled_forward_manager.php";
session_start();
if (!isset($_SESSION['Member_obj'])) {
    header("Location: ../public/index.php");
}

if (isset($_POST['send'])) {
    $outward_no = "";
    $outward_date = "";
    $subject = "";
    $file_no = "";
    $postage_charges = "";
    $remarks = "";
    $send_to = "";
    $send_by = "";
    $letter_image = "";
    $counter = "";
    $inoutid = "";
    $letter_id = "";
    $original_path = "";
    if (isset($_SESSION['Member_obj'])) {
        $member_obj = $_SESSION['Member_obj'];
        if ($member_obj) {
            $send_by = $member_obj[0]['USER_ID'];
        }
    }

    if (isset($_POST['inoutid'])) {

        if (isValidData($_POST['inoutid'])) {
            $inoutid = isValidData($_POST['inoutid']);
            $inoutid = base64_decode($inoutid);
            // now apply validation
            if ($inoutid == 0 || $inoutid < 0) {
                header("Location: inward_view.php?error=Oops That was not suppose to happen some thing went wrong");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=error';</script>";
            }
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>+a-z+A-Z]/', $inoutid)) {
                // one or more of the 'special characters' found in $string
                header("Location: inward_view.php?error=Oops That was not suppose to happen some thing went wrong");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=error';</script>";

            }
        } else {
            //
            header("Location: inward_view.php?error=Oops That was not suppose to happen some thing went wrong");
            exit();
        }
    }

    if (isset($_POST['letter_id'])) {
        if (isValidData($_POST['letter_id'])) {
            $letter_id = isValidData($_POST['letter_id']);
            $letter_id = base64_decode($letter_id);
            if ($letter_id == 0 || $letter_id < 0) {
                header("Location: inward_view.php?error=Oops That was not suppose to happen some thing went wrong");
                exit();
            }
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>+a-z+A-Z]/', $letter_id)) {
                // one or more of the 'special characters' found in $string
                header("Location: inward_view.php?error=Oops That was not suppose to happen some thing went wrong");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=error';</script>";

            }
        } else {
            header("Location: inward_view.php?error=Oops That was not suppose to happen some thing went wrong");
            exit();
        }
    }

    if (isset($_POST['original_path'])) {
        if (isValidData($_POST['original_path'])) {
            $original_path = $_POST['original_path'];
//            $original_path=base64_decode($original_path);
        } else {
            header("Location: inward_view.php?error=Oops That was not suppose to happen some thing went wrong");
            exit();
        }
    }

    if (isset($_POST['outward_no'])) {
        if (isValidData($_POST['outward_no'])) {
            $outward_no = isValidData($_POST['outward_no']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $outward_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: channeled_forward.php?error=Invalid Input in Outward No only allowed special character - / _&mesg=outward_no&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=outward_no';</script>";
            }
        } else {
            header("Location: channeled_forward.php?error=Invalid Input in Outward No only allowed special character - / _&mesg=outward_no&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
            exit();;
//            echo "<script>window.location.href='letter_outward.php?mesg=outward_no';</script>";
        }
    }

    $ret_outward_no = checkOutWardNoExistence($outward_no, $send_by);
    if ($ret_outward_no) {
        header("Location: channeled_forward.php?error=Outward No " . $outward_no . " Already Exist&mesg=outward_no&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
        exit();
    }

    if (isset($_POST['outward_date'])) {
        if (isValidData($_POST['outward_date'])) {
            $outward_date = isValidData($_POST['outward_date']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $outward_date)) {
                // one or more of the 'special characters' found in $string
                header("Location: channeled_forward.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=outward_date&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
//                echo "<script>window.location.href='letter_outward.php?mesg=outward_date';</script>";
                exit();
            }
        } else {
            //
            header("Location: channeled_forward.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=outward_date&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=outward_date';</script>";
        }
    }

    if (isset($_POST['subject'])) {
        if (isValidData($_POST['subject'])) {
            $subject = isValidData($_POST['subject']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $subject)) {
                // one or more of the 'special characters' found in $string
                header("Location: channeled_forward.php?error=Invalid Input in Subject only allowed special character - / _&mesg=subject&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
                exit();

//                echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";

            }
        } else {
            //
            header("Location: channeled_forward.php?error=Invalid Input in Subject only allowed special character - / _&mesg=subject&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";
        }
    }

    if (isset($_POST['file_no'])) {
        $file_no = isValidData($_POST['file_no']);
        if ($file_no) {
            if (preg_match('/[^0-9][!@#$%^&*(),.?":;{}|<>\/-_+a-z+A-Z]/', $file_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: channeled_forward.php?error=Invalid Input in File No&mesg=file_no&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
                exit();

//                    echo "<script>window.location.href='letter_outward.php?mesg=file_no';</script>";
            }
        }
    }

    if (isset($_POST['postage_charges'])) {
        $postage_charges = isValidData($_POST['postage_charges']);
        if (preg_match('/[^0-9.][!@#$%^&*(),?":;{}|<\'>\/-_+a-z+A-Z]/', $postage_charges)) {
            // one or more of the 'special characters' found in $string
            header("Location: channeled_forward.php?error=Invalid Input in Postage Charges&mesg=postage_charges&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
            exit();


//                echo "<script>window.location.href='letter_outward.php?mesg=postage_charges';</script>";

        }
    }

    if (isset($_POST['remarks'])) {
        if (isValidData($_POST['remarks'])) {
            $remarks = isValidData($_POST['remarks']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $remarks)) {
                // one or more of the 'special characters' found in $string
                header("Location: channeled_forward.php?error=Invalid Input in Remarks&mesg=remarks&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
                exit();

//                echo "<script>window.location.href='letter_outward.php?mesg=remarks';</script>";

            }
        }
    }

    if (isset($_POST['send_to'])) {
        if (isValidData($_POST['send_to'])) {
            $send_to = isValidData($_POST['send_to']);
            // now apply validation
            if ($send_to == 0) {
                header("Location: channeled_forward.php?error=Please Select a Valid option from List&mesg=send_to&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=error';</script>";
            }
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>+a-z+A-Z]/', $send_to)) {
                // one or more of the 'special characters' found in $string
                header("Location: channeled_forward.php?error=Please Select a Valid option from List&mesg=send_to&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=error';</script>";

            }
        } else {
            //
            header("Location: channeled_forward.php?error=Please Select a Valid option from List&mesg=send_to&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=error';</script>";
        }
    }


    if (isset($_POST['counter'])) {
        if (isValidData($_POST['counter'])) {
            $counter = isValidData($_POST['counter']);
            $counter = base64_decode($counter);
            //now apply validation
        } else {
            //
            header("Location: channeled_forward.php?error=Well that was not suppose to happen&mesg=error&path=$original_path&id=" . base64_encode($letter_id) . "&inoutid=" . base64_encode($inoutid));
            exit();
        }
    }
    $path_list = array();
    $original_path = base64_decode($original_path);
    $path_list = explode(",", $original_path);

    $new_list = array();
    $c = 0;
    for ($i = 0; $i < sizeof($path_list); $i++) {
        if ($path_list[$i] !== $send_to) {
            $new_list[$c] = $path_list[$i];
            $c++;
        }
    }

    $path_string = "";

    if (sizeof($new_list) > 0) {
        for ($i = 0; $i < sizeof($new_list); $i++) {
            $path_string .= $new_list[$i] . ',';
        }
    }

    $path_string = trim($path_string, ',');


//    if (($key = array_search($send_to, $path_list)) !== false) {
//        unset($path_list[$key]);
//    }


    changePathOfChanneledSender($inoutid);
    $pre_inoutid = $inoutid;
    $id_for_latter_Detail = getNextId('LETTERS_ID', 'letter_detail');

    $id = getNextId('INOUT_ID', 'inout_ward');

    $letter="";
    if ($_FILES['letter']['size'] != 0 &&
        $_FILES['cover_image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $member_obj = $_SESSION['Member_obj'];
        $name_addings = $member_obj[0]['NAME'];
        $letter = uploadImageByPath($_FILES['letter'], "../images/letters",
            "../images/letters", "$id" . "_" . "$subject" . " Sended By " . $name_addings);
    } else {
        echo "Some Error Occurs at Uploading the image";
        $letter = "";
    }


    $result = insertLettersDetail($id_for_latter_Detail, $subject, $file_no, $postage_charges, $letter, $remarks);
    if ($result) {
        $letter_id = $id_for_latter_Detail;

//        if(isset($_FILES['letter'])){
//            $member_obj=$_SESSION['Member_obj'];
//            $name_addings=$member_obj[0]['DEPT_NAME'];
//            $letter = uploadImageByPath($_FILES['letter'],"../images/letters",
//                "../images/letters","$id"."_"."$subject"." Sended By ".$name_addings);
//        }else{
//
//        }
        $result = insertInOutWardChanneledForward($id, $letter_id, $send_to, $send_by, $outward_no, $outward_date, $path_string, $pre_inoutid);
        if ($result) {
            //header("Location : public/page.php");
            echo "<script>
//                    window.alertMsg('Information','Letter Has been Sent successfully...');
                    window.location.href = 'mainPanel.php?success=Letter Has been Sent successfully...';
                  </script>";
        } else {
            echo "<script>
//                    window.alertMsg('Information','Letter Has been Sent successfully...');
                    window.location.href = 'mainPanel.php?status=no';
                  </script>";
        }
    } else {
        echo "<script>
//                    window.alertMsg('Information','Letter Has been Sent successfully...');
                    window.location.href = 'mainPanel.php?success=Sorry Something went wrong letter can not be delivered';
                  </script>";
    }
}
