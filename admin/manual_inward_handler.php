<?php
require "../app/manager/manual_inward_manager.php";
session_start();
if (!isset($_SESSION['Member_obj'])) {
    header("Location: ../public/index.php");
}


if (isset($_POST['receive'])) {
    $inward_no = "";
    $inward_date = "";
    $subject = "";
    $file_no = "";
    $postage_charges = "";
    $remarks = "";
    $receiver_id = "";
    $receiver_name = "";
    $sender_name = "";

    if (isset($_SESSION['Member_obj'])) {
        $member_obj = $_SESSION['Member_obj'];
        if ($member_obj) {
            $receiver_id = $member_obj[0]['USER_ID'];
            $receiver_name = $member_obj[0]['NAME'];
        }
    }

    // this section is correct for validation
    if (isset($_POST['inward_no'])) {
        if (isValidData($_POST['inward_no'])) {
            $inward_no = isValidData($_POST['inward_no']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $inward_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: manual_inward.php?error=Invalid Input in Outward No Allowed special character - / _ &mesg=inward_no");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=outward_no';</script>";

            }
        } else {

            header("Location: manual_inward.php?error=Invalid Input in Outward No Allowed special character - / _ &mesg=inward_no");
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=outward_no';</script>";
        }
    }
    // this section is perfect for validation

    if (isset($_POST['inward_date'])) {
        if (isValidData($_POST['inward_date'])) {
            $inward_date = isValidData($_POST['inward_date']);
            // now apply validation
            if (preg_match('/[!@#$%^&*(),.?":;{}|<>]/', $inward_date)) {
                // one or more of the 'special characters' found in $string
                header("Location: manual_inward.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=inward_date");
//                echo "<script>window.location.href='letter_outward.php?mesg=outward_date';</script>";
                exit();
            }
        } else {
            //
            header("Location: manual_inward.php?error=Invalid Input Outward Date Please Choose A Valid Date From Date Picker&mesg=inward_date");
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
                header("Location: manual_inward.php?error=Invalid Input in Subject allowed special character - / _ &mesg=subject");
                exit();

//                echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";

            }
        } else {
            //
            header("Location: manual_inward.php?error=Invalid Input in Subject allowed special character - / _ &mesg=subject");
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=subject';</script>";
        }
    }

    if (isset($_POST['file_no'])) {
        $file_no = isValidData($_POST['file_no']);
        if ($file_no) {
            if (preg_match('/[^0-9][!@#$%^&*(),.?":;{}|<>\/-_+a-z+A-Z]/', $file_no)) {
                // one or more of the 'special characters' found in $string
                header("Location: manual_inward.php?error=Invalid Input in File No&mesg=file_no");
                exit();

//                    echo "<script>window.location.href='letter_outward.php?mesg=file_no';</script>";
            }
        }
    }

    if (isset($_POST['postage_charges'])) {
        $postage_charges = isValidData($_POST['postage_charges']);
        if (preg_match('/[^0-9.][!@#$%^&*(),?":;{}|<\'>\/-_+a-z+A-Z]/', $postage_charges)) {
            // one or more of the 'special characters' found in $string
            header("Location: manual_inward.php?error=Invalid Input in Postage Charges&mesg=postage_charges");
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
                header("Location: manual_inward.php?error=Invalid Input in Remarks&mesg=remarks");
                exit();

//                echo "<script>window.location.href='letter_outward.php?mesg=remarks';</script>";

            }
        }
    }

    if (isset($_POST['send_by'])) {
        if (isValidData($_POST['send_by'])) {
            $sender_name = isValidData($_POST['send_by']);
            // now apply validation
            if (preg_match('/[!@#$%^&*().?":;{}|<>]/', $sender_name)) {
                // one or more of the 'special characters' found in $string
                header("Location: manual_inward.php?error=Invalid Input in Send To You have to choose some one to Receive Latter&mesg=send_by");
                exit();
//                echo "<script>window.location.href='letter_outward.php?mesg=send_to';</script>";

            }
        } else {
            //
            header("Location: manual_inward.php?error=Invalid Input in Send To You have to choose some one to Receive Latter&mesg=send_by");
            exit();
//            echo "<script>window.location.href='letter_outward.php?mesg=send_to';</script>";
        }
    }

    $bool = checkInwardNoExistance($inward_no, $receiver_id);
    $bool_in_manual = checkInwardNoInManualInOutWardExistance($inward_no, $receiver_id);
    if ($bool || $bool_in_manual) {
        header("Location: manual_inward.php?error=Out Ward No " . $inward_no . " Already exists&mesg=inward_no");
        exit();
    }

    $id_for_latter_Detail = getNextId('LETTERS_ID', 'letter_detail');
    $id = getNextId('M_INOUT_ID', 'manual_inout');

    $result = insertLettersDetailForManual($id_for_latter_Detail, $subject,
        $file_no, $postage_charges, $remarks);

// your code here for manual outward

        if ($result) {
            $letter_id = $id_for_latter_Detail;
            $id = getNextId('M_INOUT_ID', 'manual_inout');
            $combine_date_time = mergeDateAndTime($inward_date);
            $result = insertManualInwardForInWarding($id,$letter_id,$receiver_id,$sender_name,$inward_no,$combine_date_time);
            if ($result) {
                echo "<script>
                    window.location.href = 'mainPanel.php?success=Letter Has been Sent successfully...';
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