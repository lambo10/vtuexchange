<?php
include'connect.php';

$serviceID = $_GET["serviceID"];
$autoRenew = $_GET["autoRenew"];
$phoneNo = $_GET["phoneNo"];
$airTime_amount = $_GET["airTime_amount"];

$extAPI_userID = "CK100028706";
$extAPI_key = "DA45TTZW6W597K3P453E41ETI4CBM9E08H1QQ2ZI2T6NRT9970COU3T64270H3N3";

session_start();
$email = $_SESSION["email"];

$handle2 = "SELECT cost,serviceType,network,validity,extAPI_ID  FROM services WHERE id='$serviceID'";
$result2 = $conn->query($handle2);
if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        $cost = $row["cost"];
        $serviceType = $row["serviceType"];
        $network = $row["network"];
        $validity = $row["validity"];
        $plan = $row["extAPI_ID"];
        if(empty($email)){
          insertOrder($conn,$cost,$serviceType,$phoneNo,$network);             
        }else{
          if(strcmp($serviceType,"DATA") == 0){
            buydata($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$plan);
          }else if(strcmp($serviceType,"AIRTIME") == 0){
            buyAirtime($conn,$email,((int)$airTime_amount - ((int)$airTime_amount * (int)$cost)),$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$airTime_amount);
          }
        }
    }
}else{
    echo "100111";
}

function insertRenewal($conn,$userEmail,$cost,$type,$network,$duration,$phoneNo){
    $sql = "INSERT INTO renewal (userEmail,cost,serviceType,network,duration,meter_pnone_iuc_No)
    VALUES ('$userEmail','$cost','$type','$network','$duration','$phoneNo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "11111";
      }else{
          echo "100111";
      }
}

function insertTransaction($conn,$userEmail,$cost,$type,$autoRenew,$network,$duration,$phoneNo,$refID){
    $profit_margin = getProfitMargin($conn,$type,$network);
    if((int)$profit_margin >= 0){
        $calculatedCost = (int)$cost + (int)$profit_margin;
        $sql = "INSERT INTO transactions (userEmail,cost,type,network,meter_pnone_iuc_No,refID)
    VALUES ('$userEmail','$calculatedCost','$type','$network','$phoneNo','$refID')";
    
    if ($conn->query($sql) === TRUE) {
        
        if(strcmp($autoRenew,"NO") == 0){
            echo "11111";
        }else{
            insertRenewal($conn,$userEmail,$calculatedCost,$type,$network,$duration,$phoneNo);
        }

      }else{
          echo "100111";
      }
    }else{
        echo "100111";
    }
    
}

function insertOrder($conn,$cost,$type,$phoneNo,$network){
    $profit_margin = getProfitMargin($conn,$type,$network);
    $calculatedCost = (int)$cost + (int)$profit_margin;
    $sql = "INSERT INTO service_Order (cost,type,meter_pnone_iuc_No)
    VALUES ('$calculatedCost','$type','$phoneNo')";
    
    if ($conn->query($sql) === TRUE) {
        echo "11111";
      }else{
          echo "100111";
      }
}

function getProfitMargin($conn,$serviceType,$networkProvider){
    $handle2 = "SELECT profit FROM profits WHERE serviceType='$serviceType' AND network='$networkProvider'";
$result2 = $conn->query($handle2);
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        $profit = $row["profit"];
        return $profit;
    }
    
}else{
    return -1;
}
}

function buydata($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$plan){
  $network_code = "";
  if(strcmp($network,"MTN") == 0){
    $network_code = "01";
  }else if(strcmp($network,"GLO") == 0){
    $network_code = "02";
  }else if(strcmp($network,"AIRTEL") == 0){
    $network_code = "04";
  }else if(strcmp($network,"9MOBILE") == 0){
    $network_code = "03";
  }

    $url = 'https://www.nellobytesystems.com/APIDatabundleV1.asp?UserID='.$extAPI_userID.'&APIKey='.$extAPI_key.'&MobileNetwork='.$network_code.'&DataPlan='.$plan.'&MobileNumber='.$phoneNo;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $apiResponse = curl_exec($ch);
   
    curl_close($ch);
    
    $dec_jsonAPI_response = json_decode($apiResponse,true);
    
    if(strcmp($dec_jsonAPI_response["status"],"ORDER_RECEIVED") == 0){
        insertTransaction($conn,$email,$cost,$serviceType,$autoRenew,$network,$validity,$phoneNo,$dec_jsonAPI_response["orderid"]);
    }else{
        echo "100111";
    }
    
    


}

function buyAirtime($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$airTime_amount){
    $network_code = "";
    if(strcmp($network,"MTN") == 0){
      $network_code = "01";
    }else if(strcmp($network,"GLO") == 0){
      $network_code = "02";
    }else if(strcmp($network,"AIRTEL") == 0){
      $network_code = "04";
    }else if(strcmp($network,"9MOBILE") == 0){
      $network_code = "03";
    }
  
      $url = 'https://www.nellobytesystems.com/APIQueryV1.asp?UserID='.$extAPI_userID.'&APIKey='.$extAPI_key.'&MobileNetwork='.$network_code.'&Amount='.$airTime_amount.'&MobileNumber='.$phoneNo;
      
      $ch = curl_init();
      
      curl_setopt($ch, CURLOPT_URL, $url);
  
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
      $apiResponse = curl_exec($ch);
     
      curl_close($ch);
      
      $dec_jsonAPI_response = json_decode($apiResponse,true);
      
      if(strcmp($dec_jsonAPI_response["status"],"ORDER_RECEIVED") == 0){
          insertTransaction($conn,$email,$cost,$serviceType,$autoRenew,$network,$validity,$phoneNo,$dec_jsonAPI_response["orderid"]);
      }else{
          echo "100111";
      }
      
      
  
  
  }
?>