
$(document).ready(function(){
        alert("Ebaniy JS");
        $("#submit").click(function()
        {
        var firstName = $("#f_name").val();
        var lastName = $("#l_name").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        var email = $("#email").val();
     
        var dataString = 'firstName='+ firstName + 
        '&lastName='+ lastName + '&subject='+ 
        subject + '&message='+ message + '$&email=' + email;

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