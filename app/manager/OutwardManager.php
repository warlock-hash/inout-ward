<?php
require "manager.php";

function getNextId($id_for,$table){
    $con = getConnection();
    $id=1;
    $query="SELECT MAX($id_for) AS WANTED_ID FROM $table";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die( "dead" . mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        //print_r($row);

        $id  = $row['WANTED_ID'] + 1;


    }
    return $id;
}

//function checkIsForwaded($letter_id){
//    $data="";
//    $con=getConnection();
//    $check=false;
//    $query="SELECT LETTERS_ID
//            FROM inout_ward
//            WHERE LETTERS_ID = '$letter_id'";
//    $result=mysqli_query($con,$query);
//    if (!$result){
//        die("dead" . mysqli_error($con));
//    }
//    while($row =mysqli_fetch_assoc($result) ){
//           $data = $row['IS_FORWARD'];
//           $check=true;
//    }
//    if ($check){
//        return 1;
//    }else{
//        return 0;
//    }
//}


function insertLettersDetail($id,$subject,$file_no,$postage_charges,$letter,$remarks){
    $con=getConnection();
//    $test="INSERT INTO inout_ward
//(INOUT_ID,LETTERS_ID,`IN`,`OUT`,OUT_DATE,IS_CHANNELED,PATH,OUTWARD_NO,STATUS)
//VALUES
//('32', '14', '', '3', '2019-09-27', '1', '9,6', '90', '0')";
    $query="INSERT INTO letter_detail (LETTERS_ID,SUBJECT,FILE_NO,POSTAGE_CHARGES,LETTER_IMAGE,REMARKS) VALUES 
('$id','$subject','$file_no','$postage_charges','$letter','$remarks')";
    //echo $query.'query of letter details <br>';
    $result=mysqli_query($con,$query);
    if (!$result) {
        die( "insert letters Detail query die" . mysqli_error($con));
        echo "insert letters Detail query die";
        $result=false;
    }else{
        return $result;
    }
}
function insertInOutWard($id,$letter_id,$send_to,$send_by,$outward_no,$outward_date){
    $con=getConnection();
    $temp_date = strtotime($outward_date);

    $outward_date = date('Y-m-d',$temp_date);

//    $is_forward = checkIsForwaded($letter_id);
//    echo "$is_forward";
//    echo "<br>";
//    echo "$send_to"." and "." $send_by";
//    exit();
    $query="INSERT INTO inout_ward (INOUT_ID,LETTERS_ID,`OUT`,OUT_DATE,IS_CHANNELED,OUTWARD_NO,`IN`)  
VALUES ('$id','$letter_id','$send_by','$outward_date','0','$outward_no','$send_to')";
    $result=mysqli_query($con,$query);
    if (!$result) {
        //$result=false;
        die( "insert insert in out ward query die" . mysqli_error($con));
        //echo "insert insert in out ward query die";

    }else{
        return $result;
    }

}

function insertInOutWardChanneled($id,$letter_id,$send_to,$send_by,$outward_no,$outward_date,$path){
    $con=getConnection();
    $temp_date = strtotime($outward_date);

    $outward_date = date('Y-m-d',$temp_date);
//    $is_forward = checkIsForwaded($letter_id);
//    echo "$is_forward";
//    echo "<br>";
//    echo "$send_to"." and "." $send_by";
//    exit();
    $query="INSERT INTO inout_ward (INOUT_ID,LETTERS_ID,`IN`,`OUT`,OUT_DATE,IS_CHANNELED,PATH,OUTWARD_NO,STATUS)  
VALUES ('$id', '$letter_id', '$send_to', '$send_by', '$outward_date', '1', '$path', '$outward_no', '0')";
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

function checkOutWardNoExistence($out_no,$out_user){
    $con=getConnection();
    $ret_out_no="";
//    echo "<br>".$out_no."<br>".$out_user."<br>";
//    exit();
    $query="select OUTWARD_NO from inout_ward WHERE OUTWARD_NO='$out_no' AND `OUT`='$out_user'";
    $result=mysqli_query($con,$query);
    if ($result){
        while ($row=mysqli_fetch_assoc($result)){
            $ret_out_no=$row['OUTWARD_NO'];
        }
    }
    return $ret_out_no;
}
function getLastOutWardNo($user){
    $con=getConnection();
    $out_ward_no="";
    $query="SELECT * FROM inout_ward WHERE INOUT_ID= (SELECT MAX(INOUT_ID) AS 'INOUT_ID' FROM inout_ward WHERE `OUT`='$user')";
    $result=mysqli_query($con,$query);
    if (!$result){
        die("dead ".mysqli_error($con));
    }
    while ($row=mysqli_fetch_assoc($result)){
        $out_ward_no=$row['OUTWARD_NO'];
    }
    return $out_ward_no;
}

function checkIsSuperAdmin(){

}