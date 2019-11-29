<?php
require "inward_view_manager.php";

function insertLettersDetailForManual($id, $subject, $file_no, $postage_charges, $remarks)
{
    $con = getConnection();
//    $test="INSERT INTO inout_ward
//(INOUT_ID,LETTERS_ID,`IN`,`OUT`,OUT_DATE,IS_CHANNELED,PATH,OUTWARD_NO,STATUS)
//VALUES
//('32', '14', '', '3', '2019-09-27', '1', '9,6', '90', '0')";
    $query = "INSERT INTO letter_detail (LETTERS_ID,SUBJECT,FILE_NO,POSTAGE_CHARGES,LETTER_IMAGE,REMARKS) VALUES 
('$id','$subject','$file_no','$postage_charges','','$remarks')";
    //echo $query.'query of letter details <br>';
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("insert letters Detail query die" . mysqli_error($con));
        echo "insert letters Detail query die";
        $result = false;
    } else {
        return $result;
    }
}

function insertManualInwardForInWarding($id, $letter_id, $receiver_id,
                                        $sender_name, $inward_no, $inward_date)
{
    $con = getConnection();
    $in = $receiver_id;
    $query = "INSERT INTO manual_inout 
            (M_INOUT_ID, 
             LETTERS_ID,
             S_R_NAME, 
             SEND_OR_RECEIVE, 
             `IN`, 
             INWARD_NO, 
             IN_DATE) 
             values ('$id',
                     '$letter_id',
                     '$sender_name',
                     'R',
                     '$in',
                     '$inward_no',
                     '$inward_date')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("insert manual inward_outward query die" . mysqli_error($con));
        $result = false;
    } else {
        return $result;
    }
}