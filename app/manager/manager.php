<?php
//require "../db/db.php";

function getConnection(){
//    $server = "162.216.113.196";
//    $username = "drgs123";
//    $password = "ka5hifshaikh";
//    $database = "drgs123_admission";
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "usindhex_exams_test";
    $con=mysqli_connect($server,$username,$password,$database);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
        return false;
    }else{
        //echo "Connected";
        return $con;
    }

}

function getNextId($id_for, $table)
{
    $con = getConnection();
    $id = 1;
    $query = "SELECT MAX($id_for) AS WANTED_ID FROM $table";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die("dead" . mysqli_error($con));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        //print_r($row);

        $id = $row['WANTED_ID'] + 1;


    }
    return $id;
}

function mergeDateAndTime($date){
    date_default_timezone_set('Asia/karachi');
    $time = date('H:i:s');
    $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
    return $combinedDT;
}

function getDepartmentById($dept_id){
    $con=getConnection();
    $query="Select * from department where DEPT_ID = '$dept_id'";
    $result=mysqli_query($con,$query);
    if (!$result){
        die("dead".mysqli_error($con));
        return false;
    }
    while ($row = mysqli_fetch_assoc($result)){
        return $row;
    }
}

function getDataStaticQuery($columns,$tables,$condition){
    $con = getConnection();
    $query = "SELECT $columns from $tables where $condition";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die( "dead" . mysqli_error($con));
        return false;
    }
    $list = array();
    $i=0;
    while ($row = mysqli_fetch_assoc($result)){
        $list[$i] = $row;
        $i++;
    }
    return $list;

}

function isValidData($data){

    $data  =   addslashes(trim($data));
    return $data;
}

//PERCENTAGE,COUNTER,PHD_COUNTER,MS_COUNTER,MPHIL_COUNTER,`STATUS`,`DESIGNATION`

function isValidAdmin($username,$password){
    $coulmn="DEPT_ID as USER_ID,FAC_ID,INST_ID,DEPT_NAME as 'NAME',IS_INST,`CODE`,REMARKS,USER_TEMP AS USERNAME,PASS_TEMP AS PASSWORD,CITY_NAME";
    $table="department";
    $condition="((EMAIL='$username' AND SAC_PASSWORD='$password') AND (IS_INST ='Y' OR IS_INST = 'N'))";
    
    // INST_ID = 0 AND (IS_INST ='Y' OR IS_INST = 'N'))
    
    $obj=getDataStaticQuery($coulmn,$table,$condition);
    
    return $obj;
}

function isValidSuperAdmin($username, $password){
    $column="USER_ID, `NAME`, USER_NAME, IMAGE, `PASSWORD`, RESET_TOKEN, ACCT_STATUS, REMARKS";
    $table="sac_login_user";
    $condition="USER_NAME='$username' AND `PASSWORD`='$password'";
    $obj=getDataStaticQuery($column,$table,$condition);
    return $obj;
}

function getUserInfo($dept_id){
    $coulmn="DEPT_ID,FAC_ID,INST_ID,DEPT_NAME,IS_INST,`CODE`,REMARKS,USER_TEMP AS USERNAME,CITY_NAME";
    $table="department";
    $condition="((DEPT_ID='$dept_id') AND (INST_ID = 0 AND (IS_INST ='Y' OR IS_INST = 'N')))";
    $obj=getDataStaticQuery($coulmn,$table,$condition);
    return $obj;
}