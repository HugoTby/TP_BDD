<?php

function formulaire($messageERR)
{
// Formulaire de connexion
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="fonts/icomoon/style.css">

<link rel="stylesheet" href="css/owl.carousel.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- Style -->
<link rel="stylesheet" href="css/style.css">
  </head>
  <style>
    .erreur{text-align: center;font-size: 8px;background-color : lightblue;border: double 1px;border-color: lightblue;padding-left: 1em;padding-right: 1em;margin-top: 2em;border: 5px solid red;animation: blinker 1s linear infinite;}
    @keyframes blinker {50% {border-color: transparent;}}
    .dark-mode {background-color: #131516;color: white;}
  </style>
  <body>
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/logo.png');"></div>
    <div class="contents order-2 order-md-1">
    <div class="container">
    <div class="row align-items-center justify-content-center">
          <div class="col-md-7" style="padding: 30px;border: 1px solid lightgray;box-sizing: border-box;background-color:#f5f5f5;">
            <h3>Se connecter a <strong>Pronote2wish</strong></h3>
            <p class="mb-4">PRONOTE est un logiciel de gestion de la scolarité pour les établissements d'enseignement. Il permet de gérer les notes, les absences, les devoirs, les bulletins, les informations sur les élèves et les enseignants, avec une interface conviviale et une communication en temps réel.</p>
            <form method="post">
              <div class="form-group first">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" placeholder="Saisissez votre nom d'utilisateur" id="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="Saisissez votre mot de passe" id="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                
                <span class="ml-auto"><a href="#" class="forgot-pass" id="myButton">Mot de passe oublié ?</a></span> 
              </div>

              <input type="submit" name="submit" value="Connexion" class="btn btn-block btn-primary">

            </form>
<?php
        
        if ($messageERR == 1) {
        echo '<div class="btn-primary" style="border-radius: 0.25rem;background-color: red;"> <p><h1 style="color:white;font-size:15px;border:15px;text-align:center; padding:12px;">Le nom d&apos;utilisateur ou le mot de passe est incorrect<br>(Erreur BDD-29012302-IDMPUS)<h1></p></div>'; 
        }
        if ($messageERR == 2) {
            echo '<div class="btn-primary" style="border-radius: 0.25rem;background-color: red;" > <p><h1 style="color:white;font-size:15px;border:15px;text-align:center; padding:12px;">Impossible d&apos;acceder &agrave; la ressource voulue !<br>(Erreur BDDC-29012301-ID *PERMISSION DENIED*)<h1></p></div>'; 
        }
        
?>
    </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("myButton").addEventListener("click", function() {
      alert("Et bah cheh tu peux pas le récup XD");
    });
  </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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
<?php

}




//---------------------------------------------------------------------------------------------------------------------------------//



//---------------------------------------------------------------------------------------------------------------------------------//

function image_grade($username, $conn)
{
    $sql = "SELECT role, img_grade FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            $grade = $row["role"];
            $img_grade = $row["img_grade"];
            echo '
              <div class="profile"><img src= '. $img_grade .' "alt="Grade Image" />
                <div class="dropdown">
                  <p>Mon compte</p>
                    <div class="dropdown-content">
                    <p><button>Paramètres du compte</button></p>
                    <p><button id="toggleDarkMode"><span class="toggle__icon"></span>Paramètres de couleur</button></p>
                    <p>Vous etes connecté en tant que <strong>'. $grade .'</strong> </p>
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
              </script> ';
                }
            } else {
            echo "0 results";
            }
}




//---------------------------------------------------------------------------------------------------------------------------------//



//---------------------------------------------------------------------------------------------------------------------------------//




?>