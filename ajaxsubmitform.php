<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] ); require_once( $parse_uri[0] . 'wp-load.php' );

require_once get_stylesheet_directory() . ("/../../../wp-load.php");
require_once get_stylesheet_directory() . ("/../../../wp-content/plugins/SimpleContactUs/bin/vendor/autoload.php"); 


use HubSpot\Factory;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;   


$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$subject = $_POST['subject'];
$mail = $_POST['email'];

$message = $first_name . " " . $last_name . " wrote the following:" . $_POST['message'];
  
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
    
    
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    echo $emailErr;
    exit();
    }
    
    $client = Factory::createWithAccessToken("pat-eu1-dcd3181d-9557-4ff2-9364-21df7ba72466");
    $properties = [
     "company" => "Default Company",
     "email" => $mail,
     "firstname" =>$first_name,
     "lastname" => $last_name,
    ];
    $SimplePublicObjectInput = new SimplePublicObjectInput(['properties' => $properties]);
    try {
     $apiResponse = $client->crm()->contacts()->basicApi()->create($SimplePublicObjectInput);
     
     echo "Contact was added succesfully";
    } catch (ApiException $e) {
    echo "Your contact may exist";
     
    }
    if(!wp_mail($mail,$subject,$message,$headers))
    {
    echo " Email was not sent";
    }
    else
    {
    echo " Email was sent succesfully";
    date_default_timezone_set('Europe/Minsk');
    echo $first_name;
    $log  = "User: ". $first_name . " " . $last_name . " has received an email." . PHP_EOL
     . "Time: " . date("l jS \of F Y h:i:s A") . PHP_EOL
     . "User's email: " . $mail . PHP_EOL
    . "-------------------------".PHP_EOL;
    
    if(!file_exists('./Logs'))
    {
        mkdir('./Logs', 0777, true);
    }
    
    file_put_contents('./Logs/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
    
    }

    

?>