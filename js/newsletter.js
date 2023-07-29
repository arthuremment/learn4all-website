
//newletter
    $("#suscribe").click(function(){
        var email = $("#newsmail").val();

        $.ajax({
            url: "../php/newsletter.php",
            type: "POST",
            data: {email: email},
            success: function(result){
                alert(result);
                $("#newsmail")[0].reset();
            }
        });
    });
