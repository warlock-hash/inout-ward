<?php
require "manager.php";

function getHeadOfDepartmentsList()
{
    $con = getConnection();
    $data = array();
    $i = 0;
    $query = "SELECT * FROM department where INST_ID = 0 and (IS_INST = 'Y' or IS_INST = 'N')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("dead" . mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i] = $row;
        $i++;
    }
    return $data;
}

function getAllDepartment()
{
    $data = array();
    $i = 0;
    $con = getConnection();
    $query = "SELECT DEPT_ID as 'USER_ID',FAC_ID,INST_ID,DEPT_NAME as 'NAME',IS_INST,`CODE`,REMARKS,USER_TEMP AS USERNAME,PASS_TEMP AS PASSWORD,CITY_NAME
                FROM department
                WHERE IS_INST ='Y' OR IS_INST = 'N'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("dead" . mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i] = $row;
        $i++;
    }
    return $data;
}

function getSubDepartmentByHODId($hod_id)
{
    $data = array();
    $i = 0;
    $con = getConnection();
    $query = "SELECT DEPT_ID as 'USER_ID',FAC_ID,INST_ID,DEPT_NAME as 'NAME',IS_INST,`CODE`,REMARKS,USER_TEMP AS USERNAME,PASS_TEMP AS PASSWORD,CITY_NAME 
            FROM department 
            where INST_ID = '$hod_id' and (IS_INST = 'Y' or IS_INST = 'N')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("dead" . mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $data[$i] = $row;
        $i++;
    }
    return $data;
}

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

function getAllSendedLetters($user_id)
{

    $coulmns = "iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE,iow.OUT_DATE
,d.DEPT_NAME,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.STATUS,iow.IS_CHANNELED,iow.PREVIOUS";
    $table = "department d,letter_detail ld,inout_ward iow";
    $condition = "iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.IN=d.DEPT_ID
              AND iow.OUT= '$user_id' 
              ORDER BY iow.OUTWARD_NO DESC ,iow.OUT_DATE DESC";
    $data = getDataStaticQuery($coulmns, $table, $condition);
    return $data;

}

function getAllSendedLetterOrderBy($user_id, $order_by)
{
    $coulmns = "iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE,iow.OUT_DATE
,d.DEPT_NAME,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.STATUS,iow.IS_CHANNELED,iow.PREVIOUS";
    $table = "department d,letter_detail ld,inout_ward iow";
    $condition = "iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.IN=d.DEPT_ID
              AND iow.OUT= '$user_id' 
              ORDER BY " . $order_by;
    $data = getDataStaticQuery($coulmns, $table, $condition);
    return $data;
}

function getAllManualReceivedLatter($user_id)
{
    $columns = "mi.M_INOUT_ID as 'ID', ld.LETTERS_ID, ld.SUBJECT, 
            ld.FILE_NO, ld.POSTAGE_CHARGES, ld.LETTER_IMAGE, ld.REMARKS as 'LETTER_REMARKS',
            d.DEPT_ID as 'USER_ID', d.FAC_ID, d.INST_ID, d.DEPT_NAME as 'NAME', d.IS_INST, 
            d.REMARKS, mi.S_R_NAME as 'SENDER_NAME', mi.SEND_OR_RECEIVE, mi.`IN`,mi.`OUT` ,
            mi.INWARD_NO as 'INWARD_NO', mi.IN_DATE";
    $table = "manual_inout mi, letter_detail ld, department d";
    $condition = "mi.LETTERS_ID = ld.LETTERS_ID
            and mi.SEND_OR_RECEIVE = 'R'
            and mi.`IN` = d.DEPT_ID
            and mi.`IN` = '$user_id'
            order by mi.INWARD_NO desc ";
    $data = getDataStaticQuery($columns, $table, $condition);
    return $data;
}

function getAllManualSendedLatters($user_id)
{
    $columns="mi.M_INOUT_ID as 'ID', mi.LETTERS_ID, mi.S_R_NAME as 'RECEIVING_NAME',
            mi.SEND_OR_RECEIVE,mi.`OUT`, mi.OUTWARD_NO, mi.OUT_DATE,
            d.DEPT_ID as 'USER_ID', d.DEPT_NAME as 'NAME', d.REMARKS as 'DEPT_REMARKS',
            ld.LETTERS_ID, ld.SUBJECT, ld.FILE_NO, ld.POSTAGE_CHARGES,ld.LETTER_IMAGE, 
            ld.REMARKS as 'LETTER_REMARKS'";
    $tables="manual_inout mi, department d, letter_detail ld";
    $condition="mi.`OUT`=d.DEPT_ID
            and mi.SEND_OR_RECEIVE='S'
            and mi.LETTERS_ID=ld.LETTERS_ID
            and mi.`OUT`='$user_id'
            order by mi.OUTWARD_NO desc";
    $data=getDataStaticQuery($columns,$tables,$condition);
    return $data;
}


