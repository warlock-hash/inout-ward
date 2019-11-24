<?php
require "manager.php";

function getAllRecievedLetters($user_id)
{
    $coulmns = "iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE
,d.DEPT_NAME as 'NAME' ,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.IS_CHANNELED,iow.PATH, iow.STATUS";
    $table = "department d,letter_detail ld,inout_ward iow";
    $condition = "iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.OUT=d.DEPT_ID
              AND iow.IN= '$user_id'
              ORDER BY iow.INOUT_ID DESC ,iow.INWARD_NO DESC";
    $data = getDataStaticQuery($coulmns, $table, $condition);
    return $data;
}

function getAllReceivedLettersOrderBy($user_id, $order)
{
    $coulmns = "iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE
,d.DEPT_NAME as 'NAME' ,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.IS_CHANNELED,iow.PATH, iow.STATUS";
    $table = "department d,letter_detail ld,inout_ward iow";
    $condition = "iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.OUT=d.DEPT_ID
              AND iow.IN= '$user_id'
              ORDER BY " . $order;
    $data = getDataStaticQuery($coulmns, $table, $condition);
    return $data;
}

function getAllUnreceivedLetters($user_id)
{
    $coulmns = "iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE
,d.DEPT_NAME as 'NAME' ,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.IS_CHANNELED,iow.PATH, iow.STATUS";
    $table = "department d,letter_detail ld,inout_ward iow";
    $condition = "iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.OUT=d.DEPT_ID
              AND iow.IN= '$user_id'
              AND iow.STATUS= 0
              ORDER BY iow.INOUT_ID DESC ,iow.INWARD_NO DESC";
    $data = getDataStaticQuery($coulmns, $table, $condition);
    return $data;
}

function getOnlyReceivedLetters($user_id)
{
    $coulmns = "iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE
,d.DEPT_NAME as 'NAME' ,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.IS_CHANNELED,iow.PATH, iow.STATUS";
    $table = "department d,letter_detail ld,inout_ward iow";
    $condition = "iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.OUT=d.DEPT_ID
              AND iow.IN= '$user_id'
              AND iow.STATUS= 1
              ORDER BY iow.INOUT_ID DESC ,iow.INWARD_NO DESC";
    $data = getDataStaticQuery($coulmns, $table, $condition);
    return $data;
}

function changeStatusToRead($id, $inward_no)
{
    date_default_timezone_set('Asia/karachi');
    $con = getConnection();
    $date = Date('Y-m-d');
    $time = date('H:i:s');
    $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
    $bool = false;
    $query = "UPDATE inout_ward SET `STATUS`=1,INWARD_NO='$inward_no',IN_DATE='$combinedDT' WHERE INOUT_ID = $id";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("dead " . mysqli_error($con));
    }
    if ($result) {
        $bool = true;
        return $bool;
    }
    return $bool;
}

function checkInwardNoExistance($inward_no, $user_id)
{
    $con = getConnection();
    $ret_inward_no = "";
    $query = "SELECT INWARD_NO FROM inout_ward WHERE INWARD_NO='$inward_no' AND `IN`='$user_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ret_inward_no = $row['INWARD_NO'];
        }
    }
    return $ret_inward_no;
}

function checkInwardNoInManualInOutWardExistance($inward_no, $user_id)
{
    $con = getConnection();
    $ret_inward_no = "";
    $query = "SELECT INWARD_NO FROM manual_inout WHERE INWARD_NO='$inward_no' AND `IN`='$user_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $ret_inward_no = $row['INWARD_NO'];
        }
    }
    return $ret_inward_no;
}

function getLastInwardNo($user_id)
{
    $con = getConnection();
    $inward_no_inout_ward = "";
    $inward_no_manual_inout_ward = "";
    $inward_date_inout_ward = "";
    $inward_date_manual_inout_ward = "";
    $query = "SELECT * FROM inout_ward WHERE INOUT_ID=
            (SELECT MAX(INOUT_ID) AS 'INOUT_ID' FROM inout_ward WHERE `IN`='$user_id' AND `STATUS`<>0)";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $inward_no_inout_ward = $row['INWARD_NO'];
            $inward_date_inout_ward=$row['IN_DATE'];
        }
    }
    $query="SELECT * FROM manual_inout WHERE M_INOUT_ID=
            (SELECT MAX(M_INOUT_ID) AS 'M_INOUT_ID' FROM manual_inout WHERE `IN`='$user_id')";
    $result = mysqli_query($con, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $inward_no_manual_inout_ward = $row['INWARD_NO'];
            $inward_date_manual_inout_ward=$row['IN_DATE'];
        }
    }
    if ($inward_date_inout_ward > $inward_date_manual_inout_ward){
        return $inward_no_inout_ward;
    }else{
        return $inward_no_manual_inout_ward;
    }
}

?>
