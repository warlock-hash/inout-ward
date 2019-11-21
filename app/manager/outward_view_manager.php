<?php
require "manager.php";

function getAllSendedLetters($user_id){

    $coulmns="iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE,iow.OUT_DATE
,d.DEPT_NAME,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.STATUS,iow.IS_CHANNELED,iow.PREVIOUS";
    $table="department d,letter_detail ld,inout_ward iow";
    $condition="iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.IN=d.DEPT_ID
              AND iow.OUT= '$user_id' 
              ORDER BY iow.OUTWARD_NO DESC ,iow.OUT_DATE DESC";
    $data=getDataStaticQuery($coulmns,$table,$condition);
    return $data;

}

function getAllSendedLetterOrderBy($user_id,$order_by){
    $coulmns="iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE,iow.OUT_DATE
,d.DEPT_NAME,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.STATUS,iow.IS_CHANNELED,iow.PREVIOUS";
    $table="department d,letter_detail ld,inout_ward iow";
    $condition="iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.IN=d.DEPT_ID
              AND iow.OUT= '$user_id' 
              ORDER BY ".$order_by;
    $data=getDataStaticQuery($coulmns,$table,$condition);
    return $data;
}

function getLimitedSendLetter($user_id,$lb,$ub){
    echo "user_id: ".$user_id." Lower Bound: ".$lb." Upper Bound: ".$ub;
    exit();
    $coulmns="iow.INOUT_ID,ld.LETTERS_ID ,ld.SUBJECT,ld.FILE_NO,ld.POSTAGE_CHARGES,ld.LETTER_IMAGE,iow.IN_DATE,iow.OUT_DATE
,d.DEPT_NAME,iow.INWARD_NO,iow.OUTWARD_NO,ld.REMARKS,iow.STATUS,iow.IS_CHANNELED,iow.PREVIOUS";
    $table="department d,letter_detail ld,inout_ward iow";
    $condition="iow.LETTERS_ID=ld.LETTERS_ID
              AND iow.IN=d.DEPT_ID
              AND iow.OUT= '$user_id' 
              ORDER BY iow.OUTWARD_NO DESC ,iow.OUT_DATE DESC LIMIT $lb,$ub";
    $data=getDataStaticQuery($coulmns,$table,$condition);
    return $data;
}

function uploadImageByPath($image,$folder_path,$db_path,$name){

    $post_image = $image['name'];
    $post_image_temp = $image['tmp_name'];
    //$post_image_type = $file['image']['type'];
    $length= strrpos($post_image,".");
    $image_type=substr($post_image, $length);
    $image_name = $name."".$image_type;


    if(!file_exists($folder_path)){
        mkdir($folder_path,0777,true);
    }
    $db_path = "$db_path/$image_name";
    $folder_path = "$folder_path/$image_name";
    move_uploaded_file($post_image_temp,$folder_path );
    return $db_path;
}

function updateLetterFile($letter_id,$letter_path){
    $bool=false;
    $con=getConnection();
    $query="UPDATE letter_detail SET LETTER_IMAGE = '$letter_path' WHERE LETTERS_ID = $letter_id";
    $result=mysqli_query($con,$query);
    if (!$result){
        die("dead ".mysqli_error($con));
    }
    if ($result){
        $bool=true;
    }
    return $bool;
}