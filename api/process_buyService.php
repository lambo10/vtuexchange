<?php
include'connect.php';

$serviceID = $_GET["serviceID"];
$autoRenew = $_GET["autoRenew"];
$phoneNo = $_GET["phoneNo"];
$airTime_amount = $_GET["airTime_amount"];

$ElectricCompany = $_GET["ElectricCompany"];
$meterType = $_GET["meterType"];
$meterNumber = $_GET["meterNumber"];
$autoRenew = $_GET["autoRenew"];
$phoneNo = $_GET["phoneNo"];
$sub_amount = $_GET["sub_amount"];
$sub_service_type = $_GET["sub_service_type"]; 

$smartCard_iucNo = $_GET["smartCard_iucNo"];

$extAPI_userID = "CK100028706";
$extAPI_key = "DA45TTZW6W597K3P453E41ETI4CBM9E08H1QQ2ZI2T6NRT9970COU3T64270H3N3";

$mtn_pin = "1998";
$airtel_pin = "1097";
$glo_pin = "23227";
$et_9mobile_pin = "1998";

session_start();
$email = $_SESSION["email"];

if(strcmp($sub_service_type,"POWER") == 0){
  if(deduct_amout_from_user_bal($conn,$email,$sub_amount)){
  buyPower($conn,$email,$sub_amount,$serviceType,$phoneNo,$extAPI_key,$extAPI_userID,$ElectricCompany,$meterType,$meterNumber);
  }else{
    echo "100119";
  }
}else if(strcmp($sub_service_type,"VERIFY_METER_NO") == 0){
  verifyMeterNo($extAPI_key,$extAPI_userID,$ElectricCompany,$meterNumber);
}
else{

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
          $profit_margin = getProfitMargin($conn,$serviceType,$network);
          $calculatedCost = (float)$cost + (float)$profit_margin;

          if(strcmp($serviceType,"DATA") == 0){
            // buydata($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$plan);
           $final_calAmount = $calculatedCost - (get_user_accType($conn,$email)/100)*$calculatedCost;
            if(deduct_amout_from_user_bal($conn,$email,$final_calAmount)){
            buydata($conn,$email,$final_calAmount,$serviceType,$autoRenew,$validity,$phoneNo,$network,$plan,$mtn_pin,$glo_pin,$airtel_pin,$et_9mobile_pin);
            }else{
              echo "100119";
            }
          }else if(strcmp($serviceType,"AIRTIME") == 0){
            // buyAirtime($conn,$email,((int)$airTime_amount - ((int)$airTime_amount * (int)$cost)),$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$airTime_amount);
            $calculated_airtime_Cost = ((float)$airTime_amount - ((float)$airTime_amount * ((float)$cost/100)));
            if(deduct_amout_from_user_bal($conn,$email,$calculated_airtime_Cost)){
            buyAirtime($conn,$email,$calculated_airtime_Cost,$serviceType,$autoRenew,$validity,$phoneNo,$network,$airTime_amount,$mtn_pin,$glo_pin,$airtel_pin,$et_9mobile_pin);
          }else{
            echo "100119";
          }
          }else if(strcmp($serviceType,"TV_SUB") == 0){
            $final_calAmount = $calculatedCost - (get_user_accType($conn,$email)/100)*$calculatedCost;
            if(deduct_amout_from_user_bal($conn,$email,$final_calAmount)){
            tv_sub($conn,$email,$final_calAmount,$serviceType,$autoRenew,$validity,$smartCard_iucNo,$extAPI_key,$extAPI_userID,$network,$plan);
          }else{
            echo "100119";
          }
          }
        }
    }
}else{
    echo "100111";
}

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

function insertTransaction($conn,$userEmail,$cost,$type,$autoRenew,$network,$duration,$phoneNo,$refID,$output){
    $profit_margin = getProfitMargin($conn,$type,$network);
    if((float)$profit_margin >= 0){
        $calculatedCost = (float)$cost + (float)$profit_margin;
        
          $sql = "INSERT INTO transactions (userEmail,cost,type,network,meter_pnone_iuc_No,refID,output)
    VALUES ('$userEmail','$calculatedCost','$type','$network','$phoneNo','$refID','$output')";
    
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

function insertTransactionForPOWER($conn,$userEmail,$cost,$type,$autoRenew,$network,$duration,$phoneNo,$refID,$output){
 
 $sql = "INSERT INTO transactions (userEmail,cost,type,network,meter_pnone_iuc_No,refID,output)
  VALUES ('$userEmail','$cost','$type','$network','$phoneNo','$refID','$output')";
  
  if ($conn->query($sql) === TRUE) {
      
      if(strcmp($autoRenew,"NO") == 0){
          echo $output;
      }else{
          insertRenewal($conn,$userEmail,$cost,$type,$network,$duration,$phoneNo);
      }

    }else{
        echo "100111";
    }
  
}

function insertOrder($conn,$cost,$type,$phoneNo,$network){
    $profit_margin = getProfitMargin($conn,$type,$network);
    $calculatedCost = (float)$cost + (float)$profit_margin;
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

function tv_sub($conn,$email,$cost,$serviceType,$autoRenew,$validity,$smartCard_iucNo,$extAPI_key,$extAPI_userID,$network,$plan){
  $network_code = "";
  if(strcmp($network,"DStv") == 0){
    $network_code = "01";
  }else if(strcmp($network,"GOtv") == 0){
    $network_code = "02";
  }else if(strcmp($network,"StarTimes") == 0){
    $network_code = "03";
  }

    $url = 'https://www.nellobytesystems.com/APIDatabundleV1.asp?UserID='.$extAPI_userID.'&APIKey='.$extAPI_key.'&CableTV='.$network_code.'&Package='.$plan.'&SmartCardNo='.$smartCard_iucNo;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $apiResponse = curl_exec($ch);
   
    curl_close($ch);
    
    $dec_jsonAPI_response = json_decode($apiResponse,true);
    $refID = $dec_jsonAPI_response["orderid"];
    $output = "";
    if(strcmp($dec_jsonAPI_response["status"],"ORDER_RECEIVED") == 0){
        insertTransaction($conn,$email,$cost,$serviceType,$autoRenew,$network,$validity,$smartCard_iucNo,$refID,$output);
    }else{
        echo "100111";
    }
     


}

function verifyMeterNo($extAPI_key,$extAPI_userID,$network,$meterNumber){
  $network_code = "";
  if(strcmp($network,"PHCN") == 0){
    $network_code = "01";
  }else if(strcmp($network,"IKEDC") == 0){
    $network_code = "02";
  }else if(strcmp($network,"KEDCO") == 0){
    $network_code = "04";
  }else if(strcmp($network,"PHED") == 0){
    $network_code = "05";
  }else if(strcmp($network,"JED") == 0){
    $network_code = "06";
  }

    $url = 'https://www.nellobytesystems.com/APIVerifyElectricityV1.asp?UserID='.$extAPI_userID.'&APIKey='.$extAPI_key.'&ElectricCompany='.$network_code.'&meterno='.$meterNumber;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $apiResponse = curl_exec($ch);
   
    curl_close($ch);
    
    $dec_jsonAPI_response = json_decode($apiResponse,true);

    $output = $dec_jsonAPI_response["customer_name"];

    echo $output;
}

function buyPower($conn,$email,$cost,$serviceType,$phoneNo,$extAPI_key,$extAPI_userID,$network,$meterType,$meterNumber){
  $network_code = "";
  if(strcmp($network,"PHCN") == 0){
    $network_code = "01";
  }else if(strcmp($network,"IKEDC") == 0){
    $network_code = "02";
  }else if(strcmp($network,"KEDCO") == 0){
    $network_code = "04";
  }else if(strcmp($network,"PHED") == 0){
    $network_code = "05";
  }else if(strcmp($network,"JED") == 0){
    $network_code = "06";
  }

    $url = 'https://www.nellobytesystems.com/APIDatabundleV1.asp?UserID='.$extAPI_userID.'&APIKey='.$extAPI_key.'&ElectricCompany='.$network_code.'&MeterType='.$meterType.'&MeterNo='.$meterNumber.'&Amount='.$cost;
    
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $apiResponse = curl_exec($ch);
   
    curl_close($ch);
    
    $dec_jsonAPI_response = json_decode($apiResponse,true);
    $refID = $dec_jsonAPI_response["orderid"];
    $output = $dec_jsonAPI_response["metertoken"];
    if(strcmp($dec_jsonAPI_response["status"],"ORDER_RECEIVED") == 0){
      insertTransactionForPOWER($conn,$email,$cost,"POWER","NO",$network,"",$phoneNo,$refID,$output);
    }else{
        echo "100111";
    }


}

//   Start buying data from clubkonnect

// function buydata($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$plan){
//   $network_code = "";
//   if(strcmp($network,"MTN") == 0){
//     $network_code = "01";
//   }else if(strcmp($network,"GLO") == 0){
//     $network_code = "02";
//   }else if(strcmp($network,"AIRTEL") == 0){
//     $network_code = "04";
//   }else if(strcmp($network,"9MOBILE") == 0){
//     $network_code = "03";
//   }

//     $url = 'https://www.nellobytesystems.com/APIDatabundleV1.asp?UserID='.$extAPI_userID.'&APIKey='.$extAPI_key.'&MobileNetwork='.$network_code.'&DataPlan='.$plan.'&MobileNumber='.$phoneNo;
    
//     $ch = curl_init();
    
//     curl_setopt($ch, CURLOPT_URL, $url);

//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
//     $apiResponse = curl_exec($ch);
   
//     curl_close($ch);
    
//     $dec_jsonAPI_response = json_decode($apiResponse,true);
//     $refID = $dec_jsonAPI_response["orderid"];
//     $output = "";
//     if(strcmp($dec_jsonAPI_response["status"],"ORDER_RECEIVED") == 0){
//         insertTransaction($conn,$email,$cost,$serviceType,$autoRenew,$network,$validity,$phoneNo,$refID,$output);
//     }else{
//         echo "100111";
//     }
    
    


// }

// End buying data from clubkonnect

function buyAirtime($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$network,$plan,$mtn_pin,$glo_pin,$airtel_pin,$et_9mobile_pin){
  
    $refID = genarateToken(8);
    $sms_string = "";
    if(strcmp($network,"AIRTEL")==0){
      $sms_string = "2u ".$phoneNo." ".$plan." ".$airtel_pin;
    }if(strcmp($network,"MTN")==0){
      $sms_string = "Transfer ".$phoneNo." ".$plan." ".$mtn_pin;
    }else if(strcmp($network,"9MOBILE")==0){
      $sms_string = "*223*".$et_9mobile_pin."*".$plan."*".$phoneNo."#";
    }else if(strcmp($network,"GLO")==0){
      $sms_string = "*131*".$phoneNo."*".$plan."*".$glo_pin."#";
    }

    $sql = "INSERT INTO data_airtime_purchase_bucket (userEmail,type,network,phone,refID,sms_usd_string)
    VALUES ('$email','$serviceType','$network','$phoneNo','$refID','$sms_string')";
    
    if ($conn->query($sql) === TRUE) {
        
      $output = "";
        insertTransaction($conn,$email,$cost,$serviceType,$autoRenew,$network,$validity,$phoneNo,$refID,$output);

      }else{
          echo "100111";
      }

}

// function buyAirtime($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$extAPI_key,$extAPI_userID,$network,$airTime_amount){
//     $network_code = "";
//     if(strcmp($network,"MTN") == 0){
//       $network_code = "01";
//     }else if(strcmp($network,"GLO") == 0){
//       $network_code = "02";
//     }else if(strcmp($network,"AIRTEL") == 0){
//       $network_code = "04";
//     }else if(strcmp($network,"9MOBILE") == 0){
//       $network_code = "03";
//     }
  
//       $url = 'https://www.nellobytesystems.com/APIQueryV1.asp?UserID='.$extAPI_userID.'&APIKey='.$extAPI_key.'&MobileNetwork='.$network_code.'&Amount='.$airTime_amount.'&MobileNumber='.$phoneNo;
      
//       $ch = curl_init();
      
//       curl_setopt($ch, CURLOPT_URL, $url);
  
//       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      
//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
//       $apiResponse = curl_exec($ch);
     
//       curl_close($ch);
      
//       $dec_jsonAPI_response = json_decode($apiResponse,true);
//       $refID = $dec_jsonAPI_response["orderid"];
//       $output = "";
//       if(strcmp($dec_jsonAPI_response["status"],"ORDER_RECEIVED") == 0){
//           insertTransaction($conn,$email,$cost,$serviceType,$autoRenew,$network,$validity,$phoneNo,$refID,$output);
//       }else{
//           echo "100111";
//       }
      
      
  
  
//   }


function buydata($conn,$email,$cost,$serviceType,$autoRenew,$validity,$phoneNo,$network,$plan,$mtn_pin,$glo_pin,$airtel_pin,$et_9mobile_pin){
  
  $refID = genarateToken(8);
  $ussd_string = "";
 
  if(strcmp($plan,"1.5GB") == 0 && strcmp($network,"AIRTEL")==0){
    $ussd_string = "*141*6*2*1*7*1*".$phoneNo."*".$airtel_pin."#";
  }else if(strcmp($plan,"2GB") == 0 && strcmp($network,"AIRTEL")==0){
    $ussd_string = "*141*6*2*1*6*1*".$phoneNo."*".$airtel_pin."#";
  }else if(strcmp($plan,"3GB") == 0 && strcmp($network,"AIRTEL")==0){
    $ussd_string = "*141*6*2*1*5*1*".$phoneNo."*".$airtel_pin."#";
  }else if(strcmp($plan,"4.5GB") == 0 && strcmp($network,"AIRTEL")==0){
    $ussd_string = "*141*6*2*1*4*1*".$phoneNo."*".$airtel_pin."#";
  }else if(strcmp($plan,"6GB") == 0 && strcmp($network,"AIRTEL")==0){
    $ussd_string = "*141*6*2*1*3*1*".$phoneNo."*".$airtel_pin."#";
  }else if(strcmp($plan,"8GB") == 0 && strcmp($network,"AIRTEL")==0){
    $ussd_string = "*141*6*2*1*2*1*".$phoneNo."*".$airtel_pin."#";
  }else if(strcmp($plan,"11GB") == 0 && strcmp($network,"AIRTEL")==0){
    $ussd_string = "*141*6*2*1*1*1*".$phoneNo."*".$airtel_pin."#";
  }else if(strcmp($plan,"500MB") == 0 && strcmp($network,"9MOBILE")==0){
    
    $ussd_string = "*229*2*12*".$phoneNo."#";

  }else if(strcmp($plan,"1.5GB") == 0 && strcmp($network,"9MOBILE")==0){
  
    $ussd_string = "*229*2*7*".$phoneNo."#";

  }else if(strcmp($plan,"2GB") == 0 && strcmp($network,"9MOBILE")==0){

    $ussd_string = "*229*2*25*".$phoneNo."#";

  }else if(strcmp($plan,"3GB") == 0 && strcmp($network,"9MOBILE")==0){

    $ussd_string = "*229*2*3*".$phoneNo."#";

  }else if(strcmp($plan,"4.5GB") == 0 && strcmp($network,"9MOBILE")==0){

    $ussd_string = "*229*2*8*".$phoneNo."#";

  }else if(strcmp($plan,"11GB") == 0 && strcmp($network,"9MOBILE")==0){

    $ussd_string = "*229*2*36*".$phoneNo."#";

  }else if(strcmp($plan,"15GB") == 0 && strcmp($network,"9MOBILE")==0){

    $ussd_string = "*229*2*36*".$phoneNo."#";

  }else if(strcmp($plan,"40GB") == 0 && strcmp($network,"9MOBILE")==0){

    $ussd_string = "*229*4*1*".$phoneNo."#";

  }else if(strcmp($plan,"1GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*57*".$phoneNo."#";

  }else if(strcmp($plan,"2.3GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*53*".$phoneNo."#";

  }else if(strcmp($plan,"5.25GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*55*".$phoneNo."#";

  }else if(strcmp($plan,"7GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*58*".$phoneNo."#";

  }else if(strcmp($plan,"9GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*54*".$phoneNo."#";

  }else if(strcmp($plan,"12GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*59*".$phoneNo."#";

  }else if(strcmp($plan,"16.5GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*2*".$phoneNo."#";

  }else if(strcmp($plan,"25GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*1*".$phoneNo."#";

  }else if(strcmp($plan,"42GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*11*".$phoneNo."#";

  }else if(strcmp($plan,"78GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*12*".$phoneNo."#";

  }else if(strcmp($plan,"100GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*12*".$phoneNo."#";

  }else if(strcmp($plan,"100GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*13*".$phoneNo."#";

  }else if(strcmp($plan,"115GB") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*33*".$phoneNo."#";

  }else if(strcmp($plan,"250MB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMEA ".$phoneNo." 250 ".$mtn_pin;

  }else if(strcmp($plan,"500MB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMEB ".$phoneNo." 500 ".$mtn_pin;

  }else if(strcmp($plan,"1GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMEC ".$phoneNo." 1000 ".$mtn_pin;

  }else if(strcmp($plan,"2GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMED ".$phoneNo." 2000 ".$mtn_pin;

  }else if(strcmp($plan,"5GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SME ".$phoneNo." 5000 ".$mtn_pin;

  }

  $sql = "INSERT INTO data_airtime_purchase_bucket (userEmail,type,network,phone,refID,sms_usd_string)
  VALUES ('$email','$serviceType','$network','$phoneNo','$refID','$ussd_string')";
  
  if ($conn->query($sql) === TRUE) {
      
    $output = "";
      insertTransaction($conn,$email,$cost,$serviceType,$autoRenew,$network,$validity,$phoneNo,$refID,$output);

    }else{
        echo "100111";
    }

}

  function genarateToken($len = 32){
    return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
    }

    function deduct_amout_from_user_bal($conn,$email,$cost){
      $handle2 = "SELECT AccBalance FROM users WHERE email='$email'";
      $result2 = $conn->query($handle2);
      if ($result2->num_rows > 0) {
          while($row = $result2->fetch_assoc()) {
              $accBalance = $row["AccBalance"];
              $newBalance = (float)$accBalance - $cost;
              if($newBalance > 0){
                update_acc_bal($conn,$newBalance,$email);
                return true;
              }else{
                return false;
              }
          }
      }else{
        return false;
      }
    }

    function get_user_accType($conn,$email){
      $handle2 = "SELECT AccBalance FROM accType WHERE email='$email'";
      $result2 = $conn->query($handle2);
      if ($result2->num_rows > 0) {
          while($row = $result2->fetch_assoc()) {
            $accType = $row["accType"];
            if(strcmp($accType,"Enduser") == 0){
              return 0;
            }else if(strcmp($accType,"Reseller") == 0){
              return 8.9;
            }else if(strcmp($accType,"Portal-Owner") == 0){
              return 12;
            }
          }
        }
    }

    function update_acc_bal($conn,$newBalance,$email){
      $updateHandle = "UPDATE users SET AccBalance=$newBalance WHERE email='$email'";
                        if ($conn->query($updateHandle) === TRUE) {
                        }
      }

?>