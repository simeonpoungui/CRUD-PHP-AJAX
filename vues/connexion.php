<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>connexion use ajax php</title>
</head>

<body>

    <div class="main">
        <center>
            <div class="form">
                <form id="form-connexion">
                    <div>
                        <h1>CONNEXION</h1>
                    </div><br>
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="Email" id="email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="password" placeholder="Password" id="password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <div>
                        <button type="submit" value="valider" class="button">Se connecter<i class="fa-solid pl-3 fa-floppy-disk"></i></button>
                    </div>
                </form>
            </div>
        </center>
    </div>
    <script>
        $(document).ready(function() {

            $("#form-connexion").submit(function(event) {

                event.preventDefault();

                var formData = {

                    email: $("#email").val(),
                    password: $("#password").val()
                };

                $.ajax({

                    type: "POST",
                    url: "../services/connect.php",
                    data: formData

                }).done(res => {

                    console.log(res)

                }).fail(res => {

                    console.log(res)

                })

            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>