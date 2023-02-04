<?php
    //////////////////////////////////////////////////////////////////
    //////////////// Connexion à la base de données //////////////////
    //////////////////////////////////////////////////////////////////
    $host =                "localhost";               // Adresse IP //
    $username =            "root";                    // Username   //
    $password =            "root";                    // Password   //
    $dbname =              "td_bdd";                  // Nom base   //
    //////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////
    $conn = mysqli_connect($host, $username, $password, $dbname);


        if(isset($_POST['logout'])) {
            // Détruit la session en cours lorsque l'utilisateur clique sur le bouton de déconnexion
            
            ?>
            <body bgcolor="grey">
                <div style="display: table; height: 100vh; width: 100%;">
                    <div style="display: table-cell; vertical-align: middle; text-align: center;">
                        <div style="display: inline-block;">Vous avez été déconnecté.</div>
                        <form action="index.php" method="post" style="display: inline-block;">
                        <input type="submit" name="retour" value="Retour" style="margin-left: 10px;">
                        </form>
                    </div>
                </div>
            </body>
        <?php
            
        }
        if (isset($_POST['envoi'])) {
                        // Récupérer les valeurs du formulaire
                        $subject = $_POST['subject'];
                        $title = $_POST['title'];
                        $task = $_POST['task'];
                        $due_date = $_POST['due_date'];
                        $dur_date = $_POST['dur_date'];
            
                        // Préparer une requête SQL d'insertion
                        $sql = "INSERT INTO `devoirs`(`titre`, `dateEmission`, `dateRendu`, `contenu`, `Matiere`) VALUES ('$title','$due_date','$dur_date','$task','$subject')";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
        }
        if(isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $sql = "DELETE FROM `devoirs` WHERE id = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        }
        if(isset($_POST['update'])) {
            $titre = $_POST['titre'];
            $contenu = $_POST['contenu'];
            $emission = $_POST['emission'];
            $rendu = $_POST['rendu'];
            $sql = "UPDATE `devoirs` SET titre = :titre, emission = :emission,rendu = :rendu, contenu = :contenu WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();  
          }
        


                    echo '
                    <!DOCTYPE html>
                    <html>
                        <head>
                        <meta charset="UTF-8">
                        <title>Ajout de devoirs</title>
                        <link rel="stylesheet" type="text/css" href="style.css">
                        </head>
                        <style>
                        .container {width: 50%;margin: 0 auto;text-align: left;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;}
                        .dark-mode {background-color: #131516;color: white;}
                        label {display: block;margin-bottom: 10px;font-weight: bold;}
                        input[type="text"],select,input[type="date"] {padding: 10px;font-size: 16px;width: 100%;box-sizing: border-box;margin-bottom: 20px;}
                        input[type="submit"] {padding: 10px 20px;font-size: 16px;background-color: lightblue;border: none;color: white;cursor: pointer;}
                        .profile {position: absolute;top: 10px;left: 10px;display: flex;align-items: center;}
                        .profile img {width: 50px;height: 50px;border-radius: 25px;margin-right: 10px;}
                        .profile .dropdown {position: relative;display: inline-block;}
                        .dropdown-content{color:black;}
                        .profile .dropdown .dropdown-content {display: none;position: absolute;top: calc(100% + 0px);left: 0;background-color: white;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);padding: 20px;min-width: 150px;}
                        .profile .dropdown:hover .dropdown-content {display: block;}

                        </style>
                        <body>
                        <div class="profile"><img src="default.jpg" "alt="Grade Image" />
                        <div class="dropdown">
                        <p>Mon compte</p>
                            <div class="dropdown-content">
                            <p><button>Paramètres du compte</button></p>
                            <p><button id="toggleDarkMode"><span class="toggle__icon"></span>Paramètres de couleur</button></p>
                            <p>Vous etes connecté en tant que <strong> Administrateur </strong> </p>
                            <p><form action="" method="post"><input type="submit" name="logout" value="Déconnexion"></form></p>
                        </div>
                    </div>
                    <script>
                                const toggleDarkModeButton = document.getElementById("toggleDarkMode");
                                // Vérifie l état initial du bouton en fonction de la valeur enregistrée dans localStorage
                                const initialDarkModeEnabled = localStorage.getItem("darkModeEnabled") === "true";
                                if (initialDarkModeEnabled) {
                                document.body.classList.add("dark-mode");
                                toggleDarkModeButton.innerText = "Désactiver le mode sombre";
                                } else {
                                document.body.classList.remove("dark-mode");
                                toggleDarkModeButton.innerText = "Activer le mode sombre";
                                }
                                // Ajoute un écouteur d événements pour changer l état du bouton et enregistrer le choix de l utilisateur
                                toggleDarkModeButton.addEventListener("click", function() {
                                document.body.classList.toggle("dark-mode");
                                const darkModeEnabled = document.body.classList.contains("dark-mode");
                                localStorage.setItem("darkModeEnabled", darkModeEnabled);
                                toggleDarkModeButton.innerText = darkModeEnabled ? "Désactiver le mode sombre" : "Activer le mode sombre";
                                });
                    </script>

                        </div>
                        <div class="container">
                            <h1>Ajout de devoirs</h1>
                            <form action="" method="post">
                            <label for="subject">Matière :</label>
                            <select id="subject" name="subject">
                                <option value="Mathématiques">Mathématiques</option>
                                <option value="Physique-appliquée">Physique-appliquée</option>
                                <option value="Anglais">Anglais</option>
                                <option value="Informatique & réseaux">Informatique & réseaux</option>
                                <option value="Culture générale">Culture générale</option>
                            </select>
                                <label for="title">Titre :</label>
                            <input type="text" id="title" name="title">
                                <label for="task">Devoir :</label>
                            <input type="text" id="task" name="task">
                                <label for="due_date">A faire pour le:</label>
                            <input type="date" id="due_date" name="due_date">
                                <label for="dur_date">Donné le :</label>
                            <input type="date" id="dur_date" name="dur_date">

                            <input type="submit" name="envoi" value="Confirmer">
                            </form>
                        </div>
                        </body>
                    </html>
                        ';









                        $sql = "SELECT id, Matiere, contenu, dateRendu, dateEmission, titre FROM devoirs";
            $result = mysqli_query($conn, $sql);

            

                echo'

                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="UTF-8">
                    <title>Ajout de devoirs</title>
                    <link rel="stylesheet" type="text/css" href="style.css">
                </head>
                <style>

                            table {width: 100%;border-collapse: collapse;}
                            th,td{border: 1px solid lightgray;padding: 10px;text-align: left;}
                            th{background-color: lightgray;font-weight: bold;}
                            .container {width: 50%;margin: 0 auto;text-align: left;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;}
                            a.delete-button {
                                background-color: red;
                                color: white;
                                padding: 7px 14px;
                                text-decoration: none;
                                border-radius: 5px;
                                font-weight: bold;
                                display: inline-block;
                              }
                              td button {
                                background-color: #2dd61a;
                                color: white;
                                padding: 7px 14px;
                                text-decoration: none;
                                border-radius: 5px;
                                font-weight: bold;
                                display: inline-block;
                              }
                </style>
                <body>
                
                        
                    
                    </div>
                        
                            <div class="container">
                            <h1>Liste des devoirs</h1>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Matière</th>
                                            <th>Titre</th>
                                            <th>Devoir</th>
                                            <th>A faire pour le:</th>
                                            <th>Donné le :</th>
                                        </tr>
                                    </thead>
                        
                    ';
                    
                    
                            while($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            $matiere = $row["Matiere"];
                            $contenu = $row["contenu"];
                            $rendu = $row["dateRendu"];
                            $emission = $row["dateEmission"];
                            $titre = $row["titre"];

                            echo'
                            
                            <tbody>
                                <tr>
                                    <td>'. $id .' <button type="button" onclick="document.getElementById(\'edit-'.$id.'\').style.display=\'block\'">Edit</button>
                                    
                                    <form action="" method="post" id="edit-'. $id .'"style="display:none">
                                    <label for="subject">Matière :</label>
                                    <select id="subject" name="subject">
                                        <option value="Mathématiques">Mathématiques</option>
                                        <option value="Physique-appliquée">Physique-appliquée</option>
                                        <option value="Anglais">Anglais</option>
                                        <option value="Informatique & réseaux">Informatique & réseaux</option>
                                        <option value="Culture générale">Culture générale</option>
                                    </select>
                                        <label for="title">Titre :</label>
                                    <input type="text" id="title" name="'.$titre.'">
                                        <label for="task">Devoir :</label>
                                    <input type="text" id="task" name="'.$contenu.'">
                                        <label for="due_date">A faire pour le:</label>
                                    <input type="date" id="due_date" name="'.$rendu.'">
                                        <label for="dur_date">Donné le :</label>
                                    <input type="date" id="dur_date" name="'.$emission.'">
        
                                    <input type="submit" name="update" value="Modifier">
                                    </form>
                                    
                                    <a href="?delete='. $id .'"class="delete-button">Delete</a> </td>
                                    <td>'. $matiere .' </td>
                                    <td>'. $titre .' </td>
                                    <td>'. $contenu .' </td>
                                    <td>'.  $rendu .' </td>
                                    <td>'. $emission .' </td>
                                </tr>        
                            </tbody>
                            
                            
                            ';
                        } 
                            
                            
                            echo'
                    
                        </table>
                    </div>
                        
                    </body>
                </html>
                ';



                echo '
                    <!DOCTYPE html>
                    <html>
                        <head>
                        <meta charset="UTF-8">
                        <title>Ajout de devoirs</title>
                        <link rel="stylesheet" type="text/css" href="style.css">
                        </head>
                        <style>
                        .container {width: 50%;margin: 0 auto;text-align: left;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;}
                        

                        </style>
                        
                    </div>
                    ';
                    
                            while($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            $matiere = $row["Matiere"];
                            $contenu = $row["contenu"];
                            $rendu = $row["dateRendu"];
                            $emission = $row["dateEmission"];
                            $titre = $row["titre"];

                            echo'
                    

                        </div>
                        <div class="container">
                            <h1>Modification de devoirs</h1>
                            <form action="" method="post" id="edit-'. $id .'"style="display:none">
                            <label for="subject">Matière :</label>
                            <select id="subject" name="subject">
                                <option value="Mathématiques">Mathématiques</option>
                                <option value="Physique-appliquée">Physique-appliquée</option>
                                <option value="Anglais">Anglais</option>
                                <option value="Informatique & réseaux">Informatique & réseaux</option>
                                <option value="Culture générale">Culture générale</option>
                            </select>
                                <label for="id">Id :</label>
                            <input type="hidden" name="id" value="'. $id .'">
                                <label for="title">Titre :</label>
                            <input type="text" id="title" name="'.$titre.'">
                                <label for="task">Devoir :</label>
                            <input type="text" id="task" name="'.$task.'">
                                <label for="due_date">A faire pour le:</label>
                            <input type="date" id="due_date" name="'.$due_date.'">
                                <label for="dur_date">Donné le :</label>
                            <input type="date" id="dur_date" name="'.$dur_date.'">

                            <input type="submit" name="envoi" value="Modifier">
                            </form>
                        </div>
                        </body>
                    </html>
                     
                    ';
                } 
                    
                    
                    
                        


        



?>