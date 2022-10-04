<?php
/* Template Name: Contact Template*/
?>

<html lang="en">
             <?php get_header();?> 
        <!--<link rel="stylesheet" href="style.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            
        jQuery(document).ready(function() {
        $("#contactForm").submit(function(e)
        {
        var firstName = $("#f_name").val();
        var lastName = $("#l_name").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var email = $("#email").val();
     
        var dataString = 'firstName='+ firstName + 
        '&lastName='+ lastName + '&subject='+ 
        subject + '&message='+ message + '&email=' + email;

        // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "http://wpfolder/wp-content/plugins/SimpleContactUs/ajaxsubmitform.php",
        data: dataString,
        cache: false,
        success: function(result){
        alert(result);
        }
        });
        
        return false;
        });
});
            </script>
    <body>
           
        <form name="contactForm" id="contactForm" method="post" action="" class="contact-form">
	 					<div class = "contact-desc-header">
							Contact Us
	 					</div>
            <div>
                <div class="contact-desc">First Name:</div>
                <input type="text" id="f_name" name="f_name"
											 class = "contact-input">
            </div>
            <div>
                <div class="contact-desc">Last Name:</div>
                <input type="text" id="l_name" name="l_name"
											 class = "contact-input">
            </div>
            <div>
                <div class="contact-desc">Subject:</div>
                <input type="text" id="subject" name="subject" class = "contact-input">
            </div>
            <div>
                <div class="contact-desc">Message:</div>
                <input type="text" id="message" name="message" class = "contact-input">
            </div>
  
            <div>
                <div class="contact-desc">Email:</div>
                <input type="text" id="email" name="email"
											 class = "contact-input">
            </div>
            <br>
            <div>
                <input type="submit" value="Submit" class = "submit-btn" name="submit"> 
            </div>
            <br>
        </form>
    </body>

    <footer>
          <?php
          get_footer(); 
          ?>
    </footer>
 
</html>


