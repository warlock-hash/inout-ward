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
