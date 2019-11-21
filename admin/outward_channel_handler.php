<?php
require "../app/manager/OutwardManager.php";
session_start();
if (!isset($_SESSION['Member_obj'])) {
    header("Location: ../public/index.php");
}
if (isset($_POST['send'])) {
    $path = array();
    $outward_no = "";
    $outward_date = "";
    $subject = "";
    $file_no = "";
    $postage_charges = "";
    $remarks = "";
    $send_to = "";
    $send_by = "";
    $counter = "";
    $letter_image = "";
    if (isset($_SESSION['Member_obj'])) {
        $member_obj = $_SESSION['Member_obj'];
        if ($member_obj) {
            $send_by = $member_obj[0]['USER_ID'];
        }
    }

    if (isset($_POST['outward_no'])) {
        if (isValidData($_POST['outward_no'])) {
            $outward_no = isValidData($_POST['outward_no']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $outward_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: outward_through_proper_channel.php?error=Invalid Input in Outward No Allowed special character - / _ &mesg=outward_no");
                exit();
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=outward_no';</script>";

            }
        } else {
            header("Location: outward_through_proper_channel.php?error=Invalid Input in Outward No Allowed special character - / _ &mesg=outward_no");
            exit();
//            echo "<script>window.location.href='outward_channel_handler.php?mesg=outward_no';</script>";
        }
    }

    $ret_out_no = checkOutWardNoExistence($outward_no, $send_by);
    if ($ret_out_no) {
        header("Location: outward_through_proper_channel.php?error=Out Ward No " . $outward_no . " Already exists&mesg=outward_no");
        exit();
    }

    if (isset($_POST['outward_date'])) {
        if (isValidData($_POST['outward_date'])) {
            $outward_date = isValidData($_POST['outward_date']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $outward_date)) {
                // one or more of the 'special characters' found in $string
                header("Location: outward_through_proper_channel.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=outward_date");
                exit();
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=outward_date';</script>";

            }
        } else {
            //
            header("Location: outward_through_proper_channel.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=outward_date");
            exit();
//            echo "<script>window.location.href='outward_channel_handler.php?mesg=outward_date';</script>";
        }
    }

    if (isset($_POST['subject'])) {
        if (isValidData($_POST['subject'])) {
            $subject = isValidData($_POST['subject']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $subject)) {
                // one or more of the 'special characters' found in $string
                header("Location: outward_through_proper_channel.php?error=Invalid Input in Subject allowed special character - / _ &mesg=subject");
                exit();
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=subject';</script>";

            }
        } else {
            //
            header("Location: outward_through_proper_channel.php?error=Invalid Input in Subject allowed special character - / _ &mesg=subject");
            exit();
//            echo "<script>window.location.href='outward_channel_handler.php?mesg=subject';</script>";
        }
    }

    if (isset($_POST['file_no'])) {
        $file_no = isValidData($_POST['file_no']);
        if ($file_no) {
            if (preg_match('/[^0-9][!@#$%^&*(),.?":;{}|<>\/-_+a-z+A-Z]/', $file_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: outward_through_proper_channel.php?error=Invalid Input in File No&mesg=file_no");
                exit();
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=file_no';</script>";
            }
        }
    }


    if (isset($_POST['postage_charges'])) {
        $postage_charges = isValidData($_POST['postage_charges']);
        if (preg_match('/[^0-9.][!@#$%^&*(),?":;{}|<\'>\/-_+a-z+A-Z]/', $postage_charges)) {
            // one or more of the 'special characters' found in $string
            header("Location: outward_through_proper_channel.php?error=Invalid Input in Postage Charges&mesg=postage_charges");
            exit();
//            echo "<script>window.location.href='outward_channel_handler.php?mesg=postage_charges';</script>";

        }
    }

    if (isset($_POST['remarks'])) {
        if (isValidData($_POST['remarks'])) {
            $remarks = isValidData($_POST['remarks']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $remarks)) {
                // one or more of the 'special characters' found in $string
                header("Location: outward_through_proper_channel.php?error=Invalid Input in Remarks&mesg=remarks");
                exit();
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=remarks';</script>";

            }
        }
    }

//    if (isset($_POST['send_to'])) {
//        if (isValidData($_POST['send_to'])) {
//            $send_to = isValidData($_POST['send_to']);
//            // now apply validation
//            if ($send_to == 0){
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=send_to';</script>";
//            }
//            if (preg_match('/[!@#$%^&*(),.?":;{}|<>+a-z+A-Z]/', $send_to))
//            {
//                // one or more of the 'special characters' found in $string
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=send_to';</script>";
//
//            }
//        } else {
//            //
//            echo "<script>window.location.href='outward_channel_handler.php?mesg=send_to';</script>";
//        }
//    }

    if (isset($_POST['counter'])) {
        if (isValidData($_POST['counter'])) {
            $counter = isValidData($_POST['counter']);
            // apply validation
            if ($counter < 2) {
                header("Location: outward_through_proper_channel.php?error=Invalid Selection Select The Path Please select more than one at least two&mesg=path_selector");
                exit();
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=count';</script>";
            }
            if (preg_match('/[^0-9][!@#$%^&*(),.?":;{}|<>\/-_+a-z+A-Z]/', $counter)) {
                header("Location: outward_through_proper_channel.php?error=Invalid Selection Select The Path Please select more than one at least two&mesg=path_selector");
                exit();
//                echo "<script>window.location.href='outward_channel_handler.php?mesg=count';</script>";
            }
        } else {
            //
            header("Location: outward_through_proper_channel.php?error=Invalid Selection Select The Path Please select more than one at least two&mesg=path_selector");
            exit();
//            echo "<script>window.location.href='outward_channel_handler.php?mesg=count';</script>";
        }
    }

    for ($i = 1; $i <= $counter; $i++) {
        if (isset($_POST['a' . $i])) {
            $path[$i] = isValidData($_POST['a' . $i]);
        }
    }

    $send_to = array_shift($path);
//    echo $send_to.'<br><br><br>';
//    print_r($path);
//    exit();
//    echo "below is just path";
//    echo "<br>";
//    print_r($path);
//    echo "<br>";
//    echo sizeof($path)+1;
//    echo "<br>";
//    echo "<br>";
//    echo "below is just send to";
//    echo "<br>";
//    echo $send_to;
//    echo "<br>";
//    echo "<br>";
//    echo "<br>";
    $path_string = "";
    if ($send_to != null) {
        if (sizeof($path) > 0) {
            foreach ($path as $key) {
                $path_string .= $key . ',';
            }
        }
    }
    $path_string = trim($path_string, ",");
//    echo "below is just path string";
//    echo "<br>";
//    print_r($path_string);
//    echo "<br>";
//    echo "<br>";
//    echo "<br>";
//    echo "<br>";
//    echo "<br>";
//    exit();
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
        $result = insertInOutWardChanneled($id, $letter_id, $send_to, $send_by, $outward_no, $outward_date, $path_string);
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
                    window.location.href = 'mainPanel.php?error=Sorry Some thing went wrong...';
                  </script>";
    }
}