   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="../assets/css/style.css">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
       <link rel="stylesheet" href="../node_modules/node-fetch">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
       <title>recuperation</title>
   </head>
   <body>
       <div class="principale">
           <div id="modal-js-example" class="modal">
               <div class="modal-background"></div>
               <div class="modal-content">
                   <div class="box">
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
               </div>
               <button class="modal-close is-large" aria-label="close"></button>
           </div>
           <table class="table">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>NOM</th>
                       <th>PRENOM</th>
                       <th>PHONE</th>
                       <th>EMAIL</th>
                       <th>PASSWORD</th>
                       <th>ACTIONS</th>
                   </tr>
               </thead>
               <tbody>
                   <script>
                       // function update(id) {

                       //     var fetch = fetch("../vues/update.php", {
                       //         mode: 'cors',
                       //         method: 'UPDATE',
                       //         body: JSON.stringify({
                       //             "id": id
                       //         })

                       //     }).then((res) => res.json());
                       //     fetch.then(res => {
                       //         data = res.message
                       //         console.log(data)
                       //     })
                       // }

                       var fetch = fetch("http://localhost:5000/services/affichage.php", {
                           mode: 'cors',
                           method: 'GET'
                       }).then((res) => res.json());
                       fetch.then(res => {
                           data = res.message
                           console.log(data);

                           var tbody = document.querySelector('tbody')

                           data.map((i, index) => {

                               var tr = document.createElement("tr");
                               var td = document.createElement("td");
                               td.innerText = i.id;
                               tr.appendChild(td);

                               var td = document.createElement("td");
                               td.innerText = i.nom;
                               tr.appendChild(td);

                               var td = document.createElement("td");
                               td.innerText = i.prenom;
                               tr.appendChild(td);

                               var td = document.createElement("td");
                               td.innerText = i.phone;
                               tr.appendChild(td);

                               var td = document.createElement("td");
                               td.innerText = i.email;
                               tr.appendChild(td);

                               var td = document.createElement("td");
                               td.innerText = i.password;
                               tr.appendChild(td);


                               var td = document.createElement("td");
                               // creation btn modifier
                               var modifier = document.createElement("button");
                               modifier.classList.add("button");
                               modifier.classList.add("is-link");
                               modifier.classList.add("mx-1");
                               modifier.classList.add("js-modal-trigger")
                               modifier.setAttribute("data-target", "modal-js-example")
                               modifier.innerText = "modifier";
                                modifier.addEventListener('click', () => {

                                   window.location.href = '../vues/update.php'
                                   var str = "http://localhost:5000/vues/recuperation.php?id=1";
                                   var url = new URL(str);
                                   var id = url.searchParams.get("id");
                                   console.log(id);
                               })

                               td.appendChild(modifier);

                               // creation btn supprimer
                               var sup = document.createElement("button");
                               sup.classList.add("button");
                               sup.classList.add("is-danger");
                               sup.classList.add("mx-1");
                               sup.innerText = "supprimer";
                               sup.addEventListener("click", () => {
                                   $(document).ready(function() {
                                       $.ajax({
                                           type: "POST",
                                           url: 'http://localhost:5000/services/delete.php',
                                           data: data,
                                           data: {
                                               id: i.id
                                           }
                                       }).done(res => {
                                           data = res.message
                                           console.log(data);
                                           console.log(res)

                                       }).fail(res => {

                                           data = res.message
                                           console.log(data);
                                           console.log(res)

                                       })

                                   });
                                   tr.innerHTML = null
                               });
                               td.appendChild(sup);

                               tr.appendChild(td);
                               tbody.appendChild(tr);
                           });
                       })
                   </script>
               </tbody>
           </table>
           <button class="js-modal-trigger" data-target="modal-js-example">
               modifier
           </button>
       </div>
       <script>
           document.addEventListener('DOMContentLoaded', () => {
               // Functions to open and close a modal
               function openModal($el) {
                   $el.classList.add('is-active');
               }

               function closeModal($el) {
                   $el.classList.remove('is-active');
               }

               function closeAllModals() {
                   (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                       closeModal($modal);
                   });
               }

               // Add a click event on buttons to open a specific modal
               (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                   const modal = $trigger.dataset.target;
                   const $target = document.getElementById(modal);

                   $trigger.addEventListener('click', () => {
                       openModal($target);
                   });
               });

               // Add a click event on various child elements to close the parent modal
               (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
                   const $target = $close.closest('.modal');

                   $close.addEventListener('click', () => {
                       closeModal($target);
                   });
               });

               // Add a keyboard event to close all modals
               document.addEventListener('keydown', (event) => {
                   const e = event || window.event;

                   if (e.keyCode === 27) { // Escape key
                       closeAllModals();
                   }
               });
           });
       </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   </body>

   </html>