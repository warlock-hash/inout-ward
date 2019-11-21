<?php
require "OutwardManager.php";
function changePathOfChanneledSender($inoutid){
    $con=getConnection();
    $bool=false;
    $query="UPDATE inout_ward SET PATH = '-1' WHERE INOUT_ID = '$inoutid'";
    $result=mysqli_query($con,$query);
    if (!$result){
        die("dead this is".mysqli_error($con));
    }else{
        $bool=true;
        return $bool;
    }
    return $bool;
}

function insertInOutWardChanneledForward($id,$letter_id,$send_to,$send_by,$outward_no,$outward_date,$path,$pre_inoutid){
    $con=getConnection();
    $temp_date = strtotime($outward_date);

    $outward_date = date('Y-m-d',$temp_date);
//    $is_forward = checkIsForwaded($letter_id);
//    echo "$is_forward";
//    echo "<br>";
//    echo "$send_to"." and "." $send_by";
//    exit();
    $query="INSERT INTO inout_ward (INOUT_ID,LETTERS_ID,`IN`,`OUT`,OUT_DATE,IS_CHANNELED,PATH,OUTWARD_NO,STATUS,PREVIOUS)  
VALUES ('$id', '$letter_id' ,'$send_to' ,'$send_by' , '$outward_date', '1', '$path', '$outward_no', '0', '$pre_inoutid')";

//    echo $query;
//    exit();
    $result=mysqli_query($con,$query);
    if (!$result) {
        //$result=false;
        die( "insert insert in out ward query die" . mysqli_error($con));
        //echo "insert insert in out ward query die";

    }else{
        return $result;
    }

}

function getSenderList($list_id){
    $con=getConnection();
    $dept_objects=array();
    for ($i=0;$i<sizeof($list_id);$i++){
        $query="SELECT DEPT_ID as USER_ID,FAC_ID,INST_ID,DEPT_NAME as 'NAME',IS_INST,`CODE`,REMARKS,CITY_NAME
                FROM department WHERE DEPT_ID = '$list_id[$i]'";
        $result=mysqli_query($con,$query);
        if (!$result){
            die("dead".mysqli_error($con));
        }
        while ($row=mysqli_fetch_assoc($result)){
            $dept_objects[$i]=$row;
        }
    }
    return $dept_objects;
}