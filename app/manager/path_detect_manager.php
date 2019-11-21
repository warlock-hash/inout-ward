<?php
require "manager.php";


function getCurrentLetterStatus($inout_id){
    $origin_path=array();
    $count=0;
    $con=getConnection();
    $query="SELECT  iow.INOUT_ID,ld.SUBJECT,ind.DEPT_NAME AS 'Send To',outd.DEPT_NAME AS 'Send By',iow.IN_DATE,iow.OUT_DATE,iow.IS_CHANNELED,iow.PATH
            ,iow.INWARD_NO,iow.OUTWARD_NO,iow.`STATUS`,iow.PREVIOUS
            FROM inout_ward iow,department ind,letter_detail ld,department outd
            WHERE iow.LETTERS_ID=ld.LETTERS_ID
                  AND iow.`IN`=ind.DEPT_ID
                  AND iow.`OUT`=outd.DEPT_ID
                  AND iow.IS_CHANNELED = 1
                  AND iow.INOUT_ID = $inout_id";
    $result=mysqli_query($con,$query);
    if (!$result){
        die("dead function getCurrentLetterStatus ".mysqli_error($con));
    }
    while ($row=mysqli_fetch_assoc($result)){
        $origin_path[$count]=$row;
    }
//    print_r($origin_path);
//    echo "<br>";
//    echo sizeof($origin_path);
//    exit();
    return $origin_path;
}

$count=0;
$path_array=array();
function pathFinder($inout_id){
//    $path_array=array();
//    $count=sizeof($path_array);
//    if (sizeof($path_array) == 0){
//        $count=0;
//    }
    $con=getConnection();
    $query="SELECT  iow.INOUT_ID,ld.SUBJECT,ind.DEPT_NAME AS 'Send To',outd.DEPT_NAME AS 'Send By',iow.IN_DATE,iow.OUT_DATE,iow.IS_CHANNELED,iow.PATH
            ,iow.INWARD_NO,iow.OUTWARD_NO,iow.`STATUS`,iow.PREVIOUS
            FROM inout_ward iow,department ind,letter_detail ld,department outd
            WHERE iow.LETTERS_ID=ld.LETTERS_ID
                  AND iow.`IN`=ind.DEPT_ID
                  AND iow.`OUT`=outd.DEPT_ID
                  AND iow.IS_CHANNELED = 1
                  AND iow.PREVIOUS = $inout_id";
    $result=mysqli_query($con,$query);
    if (!$result){
        die("dead function pathFinder".mysqli_error($con));
    }
    while ($row=mysqli_fetch_assoc($result)){
//        echo "function worked";
        $GLOBALS['path_array'][$GLOBALS['count']]=$row;
//        print_r($row);
        $GLOBALS['count']++;
        $inout_id=$row['INOUT_ID'];
        return pathFinder($inout_id);
    }
}
function getCompletePath($inout_id){
    pathFinder($inout_id);
//    print_r($GLOBALS['path_array']);
//    exit();
    return $GLOBALS['path_array'];
}