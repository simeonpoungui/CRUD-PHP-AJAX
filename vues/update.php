<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>update use ajax php</title>
</head>
<body>
    <div class="main">
        <center>
            <div class="form">
                <form id="form-update">
                    <div>
                        <h1>Mise à Jour</h1>
                    </div><br>
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="text" placeholder="nom" id="nom">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="text" placeholder="prenom" id="prenom">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-user"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="text" placeholder="phone" id="phone">
                            <span class="icon is-small is-left">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-check"></i>
                            </span>
                        </p>
                    </div>
                    <div>
                        <button type="submit" value="valider" class="button">Mettre à Jour<i class="fa-solid pl-3 fa-floppy-disk"></i></button>
                    </div>
                </form>
            </div>
        </center>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../assets/js/update.js"></script>
</body>
</html>