$(document).ready(function() {

    $("#form-inscription").submit(function(event) {

        event.preventDefault();

        var formData = {

            nom: $("#nom").val(),
            prenom: $("#prenom").val(),
            phone: $("#phone").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            retype_password: $("#retype_password").val()

        };

        $.ajax({

            type: "POST",
            url: "../services/insertion.php",
            data: formData

        }).done(res => {

            console.log(res)

        }).fail(res => {

            console.log(res)

        })

    });
});
