<?php
/*
Plugin Name: Contact Us Plugin
Description: Simple contact us implementation.
Version: 1.0
Author: MrHowDidUGetOutOfBounds
*/
?>

<?php

require_once get_stylesheet_directory() . ("/../../../wp-content/plugins/SimpleContactUs/bin/vendor/autoload.php"); 
require_once get_stylesheet_directory() . ("/../../../wp-load.php");
add_action( 'init', 'add_contact' );

add_filter('theme_page_templates', 'pt_add_page_template_to_dropdown');
add_filter('template_include', 'pt_change_page_template');
add_action('wp_enqueue_scripts', 'pt_remove_style' );

add_action('wp_head', 'load_my_styles');
function load_my_styles(){

echo '<link rel="stylesheet" href="/wp-content/plugins/SimpleContactUs/myStyles.css">';

}

use HubSpot\Factory;
use HubSpot\Client\Crm\Contacts\ApiException;
use HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput;   

/**
* Add page templates.
*
* @param  array  $templates  The list of page templates
*
* @return array  $templates  The modified list of page templates
*/
function pt_add_page_template_to_dropdown( $templates )
{
   $templates[plugin_dir_path( __FILE__ ) . 'templates/contact_form.php'] = __( 'Contact Template', 'text-domain' );

   return $templates;
}

function pt_change_page_template($template)
{
    $template_path = plugin_dir_path( __FILE__ ) . 'templates/contact_form.php';

    if ( file_exists( $template_path ) ) {

        $template = $template_path;

    }

    return $template;
}

function pt_remove_style()
{
    if (is_page('contact_form')) {
        $theme = wp_get_theme();

        $parent_style = $theme->stylesheet . '-style'; 

        wp_dequeue_style($parent_style);
        wp_deregister_style($parent_style);
        wp_deregister_style($parent_style . '-css');
    }
}



function add_contact(){
if(isset($_POST['submit']))
{
$first_name = $_POST['f_name'];
$last_name = $_POST['l_name'];
$subject = $_POST['subject'];
$message =  $first_name . " " . $last_name . " wrote the following:" . $_POST['message'];
$mail = $_POST['email'];
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
$log  = "User: ". $first_name . " " . $last_name . " has received an email." . PHP_EOL
 . "Time: " . date("l jS \of F Y h:i:s A") . PHP_EOL
. "-------------------------".PHP_EOL;

file_put_contents('./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
}


}
}


?>

