<html>
    <head>
    <!--<link rel="stylesheet" href="assets/css/style_admin.css" />-->
    </head>
    <body>

    <?php


include('functions.php');
session_start();

if(isset($_POST['submit'])) {

    //////////////////////////////////////////////////////////////////
    //////////////// Connexion à la base de données //////////////////
    //////////////////////////////////////////////////////////////////
    $host =                "192.168.65.92";           // Adresse IP //
    $username =            "root";                    // Username   //
    $password =            "root";                    // Password   //
    $dbname =              "td_bdd";                  // Nom base   //
    //////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////
    $conn = mysqli_connect($host, $username, $password, $dbname);
    
    // Récupération des données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Vérification des informations de connexion dans la BDD
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    // Si un utilisateur est trouvé avec les informations de connexion données
    if(mysqli_num_rows($result) > 0) {
        // Récupération du rôle de l'utilisateur
        $role = $row['role'];

        // Enregistrement de la session de l'utilisateur
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        
        // Affichage du texte en fonction du rôle de l'utilisateur
        if($role == "Professeur") {

            header('Location: index2.php');

            //panel($username, $conn);


        } elseif($role == "Élève") {
            
            //eleve($username, $conn);

            $sql = "SELECT Matiere, contenu, dateRendu, dateEmission, titre FROM devoirs";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

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
                            th,td{border: 1px solid grey;padding: 10px;text-align: left;}
                            th{background-color: grey;font-weight: bold;}
                            .container {width: 50%;margin: 0 auto;text-align: left;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;}
                            .container2 {width: 50%;margin: 0 auto;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;margin-top: 10%;text-align:center;}
                            .profile {position: absolute;top: 10px;left: 10px;display: flex;align-items: center;}
                            .profile img {width: 50px;height: 50px;border-radius: 25px;margin-right: 10px;}
                            .profile .dropdown {position: relative;display: inline-block;}
                            .dark-mode {background-color: #131516;color: white;}
                            .dropdown-content{color:black;}
                            .profile .dropdown .dropdown-content {display: none;position: absolute;top: calc(100% + 0px);left: 0;background-color: white;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);padding: 20px;min-width: 150px;}
                            .profile .dropdown:hover .dropdown-content {display: block;}
                </style>
                        <body>
                        '.image_grade($username, $conn).'
                    
                    </div>
                    <div class="container2">
                    <h1>Bienvenue dans votre espace élève !</h1>
                    </div>
                        
                            <div class="container">
                            <h1>Liste des devoirs</h1>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Matière</th>
                                            <th>Titre</th>
                                            <th>Devoir</th>
                                            <th>A faire pour le:</th>
                                            <th>Donné le :</th>
                                        </tr>
                                    </thead>
                        
                    ';
                    
                            while($row = mysqli_fetch_assoc($result)) {
                            $matiere = $row["Matiere"];
                            $contenu = $row["contenu"];
                            $rendu = $row["dateRendu"];
                            $emission = $row["dateEmission"];
                            $titre = $row["titre"];

                            echo'
                            
                            <tbody>
                                <tr>
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
                    </body>
                </html>
                ';
            
            }


        } elseif($role == "Parent") {

            
            //eleve($username, $conn);

            $sql = "SELECT Matiere, contenu, dateRendu, dateEmission, titre FROM devoirs";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

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
                            th,td{border: 1px solid grey;padding: 10px;text-align: left;}
                            th{background-color: grey;font-weight: bold;}
                            .container {width: 50%;margin: 0 auto;text-align: left;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;}
                            .container2 {width: 50%;margin: 0 auto;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;margin-top: 10%;text-align:center;}
                            .profile {position: absolute;top: 10px;left: 10px;display: flex;align-items: center;}
                            .profile img {width: 50px;height: 50px;border-radius: 25px;margin-right: 10px;}
                            .profile .dropdown {position: relative;display: inline-block;}
                            .dark-mode {background-color: #131516;color: white;}
                            .dropdown-content{color:black;}
                            .profile .dropdown .dropdown-content {display: none;position: absolute;top: calc(100% + 0px);left: 0;background-color: white;box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);padding: 20px;min-width: 150px;}
                            .profile .dropdown:hover .dropdown-content {display: block;}
                </style>
                        <body>
                        '.image_grade($username, $conn).'
                    
                    </div>
                    <div class="container2">
                    <h1>Bienvenue dans votre espace parent !</h1>
                    </div>
                     
                            <div class="container">
                            <h1>Liste des devoirs</h1>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Matière</th>
                                            <th>Titre</th>
                                            <th>Devoir</th>
                                            <th>A faire pour le:</th>
                                            <th>Donné le :</th>
                                        </tr>
                                    </thead>
                        
                    ';
                    
                            while($row = mysqli_fetch_assoc($result)) {
                            $matiere = $row["Matiere"];
                            $contenu = $row["contenu"];
                            $rendu = $row["dateRendu"];
                            $emission = $row["dateEmission"];
                            $titre = $row["titre"];

                            echo'
                            
                            <tbody>
                                <tr>
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
                    </body>
                </html>
                ';
            
            }

        } else {
            
            formulaire($messageERR = 2);
        }
    } else {
        // Affichage d'un message d'erreur si les informations de connexion sont incorrectes
        formulaire($messageERR = 1);
        
        
        
        
    }

} elseif(isset($_POST['logout'])) {
    // Détruit la session en cours lorsque l'utilisateur clique sur le bouton de déconnexion
    session_unset();
    session_destroy();
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




else {
    formulaire($messageERR = 0);
    //header('Location: connexion/index.php');

}




?>


    </body>
</html>
