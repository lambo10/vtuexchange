<?php
include 'connect.php';

if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) {
    // only a post with paystack signature header gets our attention
    exit();
}

// Retrieve the request's body
$input = @file_get_contents("php://input");
define('PAYSTACK_SECRET_KEY','sk_live_4613bd09bf5e03e20e94df450ecbfc430437b456');

if(!$_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] || ($_SERVER['HTTP_X_PAYSTACK_SIGNATURE'] !== hash_hmac('sha512', $input, PAYSTACK_SECRET_KEY))){
  // silently forget this ever happened
  exit();
}


http_response_code(200);

// parse event (which is json string) as object
// Do something - that will not take long - with $event
$event = json_decode($input);

switch($event->event){
    // subscription.create
    case 'subscription.create':
        break;

    // charge.success
    case 'charge.success':
        $costumer_email = $event->data->customer->email;
        $paid_amount = $event->data->amount;
        $refID = $event->data->reference;
        $prev_user_balance = getUserBalance ($conn,$costumer_email);
        if(strcmp($prev_user_balance,"null") == 0){
        }else{
             if(updateUserBalance($conn,(((float)$paid_amount/100) + (float)$prev_user_balance),$costumer_email)){
                insertTransaction($conn,$costumer_email,$paid_amount,"FUND",$refID);
            }
            pay_upline_bonus($conn,$costumer_email);
        }
        break;

    // subscription.disable
    case 'subscription.disable':
        break;

    // invoice.create and invoice.update
    case 'invoice.create':
    case 'invoice.update':
        break;

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