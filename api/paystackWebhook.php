<?php
include 'connect.php';

if ((strtoupper($_SERVER['REQUEST_METHOD']) != 'POST' ) || !array_key_exists('HTTP_X_PAYSTACK_SIGNATURE', $_SERVER) ) {
    // only a post with paystack signature header gets our attention
    exit();
}

// Retrieve the request's body
$input = @file_get_contents("php://input");
define('PAYSTACK_SECRET_KEY','sk_xxxx_xxxxxx');

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
        break;

    // subscription.disable
    case 'subscription.disable':
        $costumer_email = $event->customer;
        $paid_amount = $event->data->amount;
        $refID = $event->data->reference;
        $prev_user_balance = getUserBalance ($conn,$costumer_email);
        if(strcmp($prev_user_balance,"null") == 0){
        }else{
             if(updateUserBalance($conn,((int)$paid_amount+(int)$prev_user_balance),$costumer_email)){
                insertTransaction($conn,$costumer_email,$paid_amount,$type,$refID);
            };
        }
        
        break;

    // invoice.create and invoice.update
    case 'invoice.create':
    case 'invoice.update':
        break;

}

exit();

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