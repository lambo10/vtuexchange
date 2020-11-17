<?php

include'connect.php';
$network1 = $_GET["network1"];
$network2 = $_GET["network2"];
$gifting_only_flag = $_GET["gifting_only_flag"];
$accessKey = $_GET["key"];

if(strcmp($accessKey,"uraj1i2568") == 0 || strcmp($accessKey,"vdrat3t2356") == 0){
  if(strcmp($gifting_only_flag,"1") == 0){
    $handle2 = "SELECT * FROM data_airtime_purchase_bucket WHERE status='0' AND ((network='$network1' AND SUBSTR(sms_usd_string,1,1) in ('1','2','3','4','5','6','7','8','9','0')) OR network='$network2') LIMIT 1";
    $result2 = $conn->query($handle2);
    $dbData = array();
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $dbData[]=$row;
            update_row_status($conn,$row["id"]);
        }
        echo "{results:".json_encode($dbData)."}";
    }else{
        echo "{results:[]}";
    }
  }else{
    $handle2 = "SELECT * FROM data_airtime_purchase_bucket WHERE status='0' AND ((network='$network1' AND sms_usd_string REGEXP '^S') OR network='$network2') LIMIT 1";
    $result2 = $conn->query($handle2);
    $dbData = array();
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $dbData[]=$row;
            update_row_status($conn,$row["id"]);
        }
        echo "{results:".json_encode($dbData)."}";
    }else{
        echo "{results:[]}";
    }
  }
}else{
    echo "Access Denied";
}

function update_row_status($conn,$id){
    $updateHandle = "UPDATE data_airtime_purchase_bucket SET status=1 WHERE id='$id'";
    if ($conn->query($updateHandle) === TRUE) {
    }
}


?>