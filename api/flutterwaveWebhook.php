<?php
include 'connect.php';
insertTransaction($conn,"gg","00","dfj","345");
// Retrieve the request's body
$body = @file_get_contents("php://input");

// retrieve the signature sent in the reques header's.
$signature = (isset($_SERVER['HTTP_VERIF_HASH']) ? $_SERVER['HTTP_VERIF_HASH'] : '');

/* It is a good idea to log all events received. Add code *
 * here to log the signature and body to db or file       */

if (!$signature) {
    // only a post with rave signature header gets our attention
    exit();
}

// Store the same signature on your server as an env variable and check against what was sent in the headers
$local_signature = getenv('d63365947225761a0c974c2f8767ecbf17000d18');

// confirm the event's signature
if( $signature !== $local_signature ){
  // silently forget this ever happened
  exit();
}

http_response_code(200);

$response = json_decode($body);
if ($response->status == 'successful') {
  
    $costumer_email = $response->customer->email;
    $paid_amount = $response->amount;
    $refID = $response->orderRef;
    $prev_user_balance = getUserBalance ($conn,$costumer_email);
    
    if(strcmp($prev_user_balance,"null") == 0){
    }else{
         if(updateUserBalance($conn,((float)$paid_amount + (float)$prev_user_balance),$costumer_email)){
            insertTransaction($conn,$costumer_email,$paid_amount,"FUND",$refID);
        }
        pay_upline_bonus($conn,$costumer_email);
    }


}
exit();

function pay_upline_bonus($conn,$email){
    $handle2 = "SELECT instruction_or_data FROM profits WHERE operation_name='referral_bonus'";
    $result2 = $conn->query($handle2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $refID = get_upline_refID($conn,$email);
            $instruction_or_data = $row["instruction_or_data"];

            $handle3 = "SELECT commission,AccBalance FROM users WHERE referralID='$refID'";
            $result3 = $conn->query($handle3);
            if ($result3->num_rows > 0) {
                while($row = $result3->fetch_assoc()) {
                    $commission_string = $row["commission"];
                    $commission = (int)$commission_string;
                    $AccBalance = $row["AccBalance"];
                    
                    if((int)$AccBalance >= (int)$instruction_or_data){
                        $new_commission_bal = (int)$instruction_or_data + $commission;
        
                    $updateHandle = "UPDATE users SET commission='$new_commission_bal' WHERE referralID='$refID'";
                    if ($conn->query($updateHandle) === TRUE) {
                        return true;
                    }else{
                        return false;
                    }
                    }else{
                        return false;
                    }
        
                    
                }
            }
         }
        
            

        }
    }

    function get_upline_refID($conn,$email){
        $handle2 = "SELECT whoReferredID FROM users WHERE email='$email'";
    $result2 = $conn->query($handle2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            return $row["whoReferredID"];
        }
    }else{
        return "null";
    }
    }

function updateUserBalance ($conn,$accountBal,$email){
    $updateHandle = "UPDATE users SET AccBalance='$accountBal'WHERE email='$email'";
    if ($conn->query($updateHandle) === TRUE) {
        return true;
    }else{
        return false;
    }
}

function getUserBalance ($conn,$email){
    $handle2 = "SELECT AccBalance FROM users WHERE email='$email'";
    $result2 = $conn->query($handle2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            return $row["AccBalance"];
        }
    }else{
        return "null";
    }
}

function insertTransaction($conn,$userEmail,$cost,$type,$refID){
    
        $sql = "INSERT INTO transactions (userEmail,cost,type,refID)
    VALUES ('$userEmail','$cost','$type','$refID')";
    
    if ($conn->query($sql) === TRUE) {
     }
    
}

?>