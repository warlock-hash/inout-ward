<?php
require "../app/manager/OutwardManager.php";
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
    $sender_id = "";
    $sender_name = "";
    $check_auto_manual = "";
    $m_receiver_name = "";
    $letter_image = "";

    if (isset($_SESSION['Member_obj'])) {
        $member_obj = $_SESSION['Member_obj'];
        if ($member_obj) {
            $sender_id = $member_obj[0]['USER_ID'];
            $sender_name = $member_obj[0]['NAME'];
        }
    }

    // this section is correct for validation
    if (isset($_POST['outward_no'])) {
        if (isValidData($_POST['outward_no'])) {
            $outward_no = isValidData($_POST['outward_no']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $outward_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: letter_outward.php?error=Invalid Input in Outward No Allowed special character - / _ &mesg=outward_no");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=outward_no';</script>";

            }
        } else {

            header("Location: letter_outward.php?error=Invalid Input in Outward No Allowed special character - / _ &mesg=outward_no");
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=outward_no';</script>";
        }
    }
    // this section is perfect for validation

    if (isset($_POST['outward_date'])) {
        if (isValidData($_POST['outward_date'])) {
            $outward_date = isValidData($_POST['outward_date']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $outward_date)) {
                // one or more of the 'special characters' found in $string
                header("Location: letter_outward.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=outward_date");
//                echo "<script>window.location.href='letter_outward.php?mesg=outward_date';</script>";
                exit();
            }
        } else {
            //
            header("Location: letter_outward.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=outward_date");
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
                header("Location: letter_outward.php?error=Invalid Input in Subject allowed special character - / _ &mesg=subject");
                exit();

//                echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";

            }
        } else {
            //
            header("Location: letter_outward.php?error=Invalid Input in Subject allowed special character - / _ &mesg=subject");
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";
        }
    }

    if (isset($_POST['file_no'])) {
        $file_no = isValidData($_POST['file_no']);
        if ($file_no) {
            if (preg_match('/[^0-9][!@#$%^&*(),.?":;{}|<>\/-_+a-z+A-Z]/', $file_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: letter_outward.php?error=Invalid Input in File No&mesg=file_no");
                exit();

//                    echo "<script>window.location.href='letter_outward.php?mesg=file_no';</script>";
            }
        }
    }

    if (isset($_POST['postage_charges'])) {
        $postage_charges = isValidData($_POST['postage_charges']);
        if (preg_match('/[^0-9.][!@#$%^&*(),?":;{}|<\'>\/-_+a-z+A-Z]/', $postage_charges)) {
            // one or more of the 'special characters' found in $string
            header("Location: letter_outward.php?error=Invalid Input in Postage Charges&mesg=postage_charges");
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
                header("Location: letter_outward.php?error=Invalid Input in Remarks&mesg=remarks");
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
                header("Location: letter_outward.php?error=Invalid Input in Send To You have to choose some one to Send Latter&mesg=send_to");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=send_to';</script>";
            }
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>+a-z+A-Z]/', $send_to)) {
                // one or more of the 'special characters' found in $string
                header("Location: letter_outward.php?error=Invalid Input in Send To You have to choose some one to Receive Latter&mesg=send_to");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=send_to';</script>";

            }
        } else {
            //
            header("Location: letter_outward.php?error=Invalid Input in Send To You have to choose some one to Receive Latter&mesg=send_to");
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=send_to';</script>";
        }
    }

    if (isset($_POST['m_receiver_name'])) {
        if (isValidData($_POST['m_receiver_name'])) {
            $m_receiver_name = isValidData($_POST['m_receiver_name']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $m_receiver_name)) {
                // one or more of the 'special characters' found in $string
                header("Location: letter_outward.php?error=Invalid Input in Subject allowed special character - / _ &mesg=m_receiver_name");
                exit();

//                echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";

            }
        } else {
            //
            header("Location: letter_outward.php?error=Invalid Input in Subject allowed special character - / _ &mesg=m_receiver_name");
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";
        }
    }

    $bool = checkOutWardNoExistence($outward_no, $sender_id);
    $bool_in_manual = checkOutWardNoExistenceInManualInOutWard($outward_no, $sender_id);
    if ($bool || $bool_in_manual) {
        header("Location: letter_outward.php?error=Out Ward No " . $outward_no . " Already exists&mesg=outward_no");
        exit();
    }

    $id_for_latter_Detail = getNextId('LETTERS_ID', 'letter_detail');
    $id = getNextId('INOUT_ID', 'inout_ward');
    $letter = "";
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

    $result = insertLettersDetail($id_for_latter_Detail, $subject,
        $file_no, $postage_charges, $letter, $remarks);

// your code here for manual outward

    if ($send_to == -1) {
        if ($result) {
            $letter_id = $id_for_latter_Detail;
            $id = getNextId('M_INOUT_ID', 'manual_inout');
            $combine_date_time = mergeDateAndTime($outward_date);
            $result = insertManualInoutWard($id,$letter_id,$sender_id,$m_receiver_name,$outward_no,$combine_date_time);
            if ($result) {
                echo "<script>
                    window.location.href = 'mainPanel.php?success=Letter Has been Sent successfully...';
                  </script>";
            }
        }
    }


    if ($result) {
        $letter_id = $id_for_latter_Detail;
        $combine_date_time=mergeDateAndTime($outward_date);
        $result = insertInOutWard($id, $letter_id, $send_to, $sender_id, $outward_no, $combine_date_time);
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
?>