$(function (){

    $('#contact-form').submit(function(e){

        e.preventDefault();
        var postdata = $('#contact-form').serialize();

        $.ajax({
            type: 'POST',
            url: '../php/contactus.php',
            data: postdata,
            dataType: 'json',
            success: function(result) {

                if(result.isSuccess){
                    $("#contact-form").append("<p><strong>Votre message a bien été envoyé. Merci de nous avoir contacté :)</strong></p>");
                    $("#contact-form")[0].reset();
                }

            }
        });
    });
})
