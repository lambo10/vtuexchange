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
$extAPI_key = "A4982BM979V8JP274CO7GZ1YK42ZIP8V7FG1F84QLZE3UPF61O3B7JQ03788QQ49";

$mtn_pin = "4242";
$mtn_airtime_pin = "3434";
$airtel_pin = "3434";
$glo_pin = "3434";
$et_9mobile_pin = "3434";

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
            $final_calAmount = $calculatedCost-((get_user_accType($conn,$email)*$calculatedCost)/100);
            if(deduct_amout_from_user_bal($conn,$email,$final_calAmount)){
            buydata($conn,$email,$final_calAmount,$serviceType,$autoRenew,$validity,$phoneNo,$network,$plan,$mtn_pin,$glo_pin,$airtel_pin,$et_9mobile_pin);
            }else{
              echo "100119";
            }
          }else if(strcmp($serviceType,"AIRTIME") == 0){
            // $calculated_airtime_Cost = ((float)$airTime_amount - ((float)$airTime_amount * ((float)$cost/100)));
            $calculated_airtime_Cost = $airTime_amount + (float)$profit_margin;
            $final_calAmount = $calculated_airtime_Cost-((get_user_accType($conn,$email)*$calculated_airtime_Cost)/100);
            if(deduct_amout_from_user_bal($conn,$email,$final_calAmount)){
            buyAirtime($conn,$email,$final_calAmount,$serviceType,$autoRenew,$validity,$phoneNo,$network,$airTime_amount,$mtn_airtime_pin,$glo_pin,$airtel_pin,$et_9mobile_pin);
          }else{
            echo "100119";
          }
          }else if(strcmp($serviceType,"TV_SUB") == 0){
            $final_calAmount = $calculatedCost-((get_user_accType($conn,$email)*$calculatedCost)/100);
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
    $check_value = abs($profit_margin);
    if($check_value >= 0){
      if(strpos($profit_margin, "-") !== false){
        $profit_margin = $check_value * -1;
      }else{
        $profit_margin = $check_value;
      }
        $calculatedCost = (float)$cost + (float)$profit_margin;
        if((float)$profit_margin == NULL){
          $calculatedCost = (int)$cost + (int)$profit_margin;
        }
        
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
  if(strcmp($network,"EKEDC") == 0){
    $network_code = "01";
  }else if(strcmp($network,"IKEDC") == 0){
    $network_code = "02";
  }else if(strcmp($network,"AEDC") == 0){
    $network_code = "03";
  }else if(strcmp($network,"KEDC") == 0){
    $network_code = "04";
  }else if(strcmp($network,"PHEDC") == 0){
    $network_code = "05";
  }else if(strcmp($network,"JEDC") == 0){
    $network_code = "06";
  }else if(strcmp($network,"IBEDC") == 0){
    $network_code = "07";
  }else if(strcmp($network,"KAEDC") == 0){
    $network_code = "08";
  }else if(strcmp($network,"EEDC") == 0){
    $network_code = "09";
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
  if(strcmp($network,"EKEDC") == 0){
    $network_code = "01";
  }else if(strcmp($network,"IKEDC") == 0){
    $network_code = "02";
  }else if(strcmp($network,"AEDC") == 0){
    $network_code = "03";
  }else if(strcmp($network,"KEDC") == 0){
    $network_code = "04";
  }else if(strcmp($network,"PHEDC") == 0){
    $network_code = "05";
  }else if(strcmp($network,"JEDC") == 0){
    $network_code = "06";
  }else if(strcmp($network,"IBEDC") == 0){
    $network_code = "07";
  }else if(strcmp($network,"KAEDC") == 0){
    $network_code = "08";
  }else if(strcmp($network,"EEDC") == 0){
    $network_code = "09";
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
      $sms_string = "605-2-1-".$phoneNo."-".$plan."-".$airtel_pin;
    }if(strcmp($network,"MTN")==0){
      $sms_string = "Transfer ".$phoneNo." ".$plan." ".$mtn_pin;
    }else if(strcmp($network,"9MOBILE")==0){
      // $sms_string = "*223*".$et_9mobile_pin."*".$plan."*".$phoneNo."#";
      $sms_string = "*232#";
    }else if(strcmp($network,"GLO")==0){
      $sms_string = "202-2-".$phoneNo."-".$plan."-".$glo_pin."-1";
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
 
  if(strcmp($plan,"1GB 1 Day") == 0 && strcmp($network,"9MOBILE")==0){
    
    $ussd_string = "*200*3*5*1*4*1*1*".$phoneNo."#";

  }else if(strcmp($plan,"2GB 1 Day") == 0 && strcmp($network,"9MOBILE")==0){
  
    $ussd_string = "*200*3*5*1*5*1*1*".$phoneNo."#";

  }else if(strcmp($plan,"7GB 7 Days") == 0 && strcmp($network,"9MOBILE")==0){

    $ussd_string = "*229*2*2*".$phoneNo."#";

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

  }

  else if(strcmp($plan,"1.35GB (800MB + 550MB night)") == 0 && strcmp($network,"GLO")==0){

    $ussd_string = "*127*57*".$phoneNo."#";
    
    } else if(strcmp($plan,"2.9GB (1.9GB + 1GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*53*".$phoneNo."#";
    
    }else if(strcmp($plan,"4.1GB(3.5GB+600MB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*53*".$phoneNo."#";
    
    }else if(strcmp($plan,"5.8GB (5.2GB + 600MB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*55*".$phoneNo."#";
    
    }else if(strcmp($plan,"7.7GB (6.8GB + 750MB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*58*".$phoneNo."#";
    
    }else if(strcmp($plan,"10GB (9GB + 1GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*54*".$phoneNo."#";
    
    }else if(strcmp($plan,"13.25GB (12.25GB + 1GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*59*".$phoneNo."#";
    
    }else if(strcmp($plan,"18.25GB (177GB + 1.25GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*2*".$phoneNo."#";
    
    }else if(strcmp($plan,"29.5GB (27.5GB + 2GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*1*".$phoneNo."#";
    
    }else if(strcmp($plan,"50GB (46GB + 4GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*11*".$phoneNo."#";
    
    }else if(strcmp($plan,"93GB (86GB + 7GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*12*".$phoneNo."#";
    
    }else if(strcmp($plan,"119GB (109GB + 10GB night)") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*13*".$phoneNo."#";
    
    }else if(strcmp($plan,"138GB (126GB + 12GB night) ") == 0 && strcmp($network,"GLO")==0){
    
    $ussd_string = "*127*33*".$phoneNo."#";
    
    }

  else if(strcmp($plan,"2.5gb-N450/2 Days") == 0 && strcmp($network,"MTN")==0){
    $ussd_string = "131-7-2-5-".$phoneNo;

  }else if(strcmp($plan,"1GB-N300/1 Day") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "131-7-2-4-".$phoneNo;

  }else if(strcmp($plan,"1GB-N450/1 Week") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "131-7-2-2-3-".$phoneNo;

  }else if(strcmp($plan,"6GB-N1350/1 Week") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "461-3-3-".$phoneNo."-".$mtn_pin."";

  }
  
  else if(strcmp($plan,"500MB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMEB ".$phoneNo." 500 ".$mtn_pin;

  }else if(strcmp($plan,"1GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMEC ".$phoneNo." 1000 ".$mtn_pin;

  }else if(strcmp($plan,"2GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMED ".$phoneNo." 2000 ".$mtn_pin;

  }else if(strcmp($plan,"3GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMFF ".$phoneNo." 3000 ".$mtn_pin;

  }else if(strcmp($plan,"5GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "SMEE ".$phoneNo." 5000 ".$mtn_pin;

  }
  
  else if(strcmp($plan,"4.5GB") == 0 && strcmp($network,"MTN")==0){
    
    $ussd_string = "3-3-".$phoneNo."";

  }else if(strcmp($plan,"6GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "3-4-".$phoneNo."";

  }else if(strcmp($plan,"10GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "3-5-".$phoneNo."";

  }else if(strcmp($plan,"15GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "3-6-".$phoneNo."";

  }else if(strcmp($plan,"40GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "3-7-".$phoneNo."";

  }else if(strcmp($plan,"75GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "3-8-".$phoneNo."";

  }else if(strcmp($plan,"110GB") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "99-9-".$phoneNo."";

  }else if(strcmp($plan,"2gb -N450 /2 Days") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "1-5-".$phoneNo."";

  }else if(strcmp($plan,"1gb-N300/1day") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "1-4-".$phoneNo."";

  }else if(strcmp($plan,"1gb-N450/1week") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "2-3-".$phoneNo."";

  }else if(strcmp($plan,"6gb-N1350/ 1 week") == 0 && strcmp($network,"MTN")==0){

    $ussd_string = "2-4-".$phoneNo."";

  }

  else if(strcmp($plan,"1.5GB") == 0 && strcmp($network,"AIRTEL")==0){

    $ussd_string = "1-7-".$phoneNo."-".$airtel_pin;
    
    } else if(strcmp($plan,"2GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "1-6-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"3GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "1-5-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"4.5GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "1-4-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"6GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "1-3-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"8GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "1-2-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"11GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "1-1-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"15GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "4-4-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"40GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "4-3-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"75GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "4-2-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"120GB") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "4-1-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"6GB/1 WEEK") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "2-1-".$phoneNo."-".$airtel_pin;
    
    }else if(strcmp($plan,"750mb/1 WEEK") == 0 && strcmp($network,"AIRTEL")==0){
    
    $ussd_string = "2-3-".$phoneNo."-".$airtel_pin;
    
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
      $handle2 = "SELECT accType FROM users WHERE email='$email'";
      $result2 = $conn->query($handle2);
      if ($result2->num_rows > 0) {
          while($row = $result2->fetch_assoc()) {
            $accType = $row["accType"];
            $handle = "SELECT instruction_or_data FROM site_operation_var WHERE operation_name='$accType' LIMIT 1";
            $result = $conn->query($handle);
            if ($result->num_rows > 0) {
                while($row2 = $result->fetch_assoc()) {
                  $output = $row2["instruction_or_data"];
                  return (float)$output;
                }
            }else{
              return -1;
            }
          }
        }else{
          return -1;
        }
    }

    function update_acc_bal($conn,$newBalance,$email){
      $updateHandle = "UPDATE users SET AccBalance=$newBalance WHERE email='$email'";
                        if ($conn->query($updateHandle) === TRUE) {
                        }
      }

?>