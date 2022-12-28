$(document).ready(function() {
    $("#form-update").submit(function(event) {
        event.preventDefault();
        
        var formData = {
            nom: $("#nom").val(),
            prenom: $("#prenom").val(),
            phone: $("#phone").val(),
        };

        $.ajax({
                type: "POST",
                url: "../services/mise_a_jour.php",
                data: {
                    formData
                }
            })
            .done((res) => {
                data = res.message
                console.log(data);
            })
            .fail((res) => {
                console.log(res);
            });
    });
});
