<?php

function formulaire($messageERR)
{
// Formulaire de connexion
echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <style>
  .erreur{text-align: center;font-size: 8px;background-color : lightblue;border: double 1px;border-color: lightblue;padding-left: 1em;padding-right: 1em;margin-top: 2em;border: 5px solid red;animation: blinker 1s linear infinite;}
  @keyframes blinker {50% {border-color: transparent;}}
.container {width: 50%;margin: 0 auto;text-align: left;padding: 30px;border: 1px solid lightgray;box-sizing: border-box;}
.form-group {margin-bottom: 20px;}
label {display: block;font-weight: bold;margin-bottom: 10px;}
input[type="text"],input[type="password"] {width: 100%;padding: 10px;box-sizing: border-box;border: 1px solid lightgray;font-size: 16px;}
input[type="submit"] {width: 100%;padding: 10px;background-color: lightblue;color: white;border: none;cursor: pointer;}

.dropdown-content{color:black;}
.dark-mode {background-color: #131516;color: white;}


  </style>
  <body>
    <div class="container">
      <h1>Connexion</h1>
      <form method="post">
        <div class="form-group">
          <label for="username">Nom d utilisateur</label>
          <input type="text" id="username"  name="username">
        </div>
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password"  name="password">
        </div>
        <input type="submit" name="submit" value="Connexion">
      </form>
      ';
        
        if ($messageERR == 1) {
        echo '<div class="erreur"> <p><h1 style="color:black">Le nom d&apos;utilisateur ou le mot de passe est incorrect<br>(Erreur BDD-29012302-IDMPUS)<h1></p></div>'; 
        }
        if ($messageERR == 2) {
            echo '<div class="erreur"> <p><h1 style="color:black">Impossible d&apos;acceder &agrave; la ressource voulue !<br>(Erreur BDDC-29012301-ID *PERMISSION DENIED*)<h1></p></div>'; 
        }
        
echo'
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




//---------------------------------------------------------------------------------------------------------------------------------//





function eleve($username, $conn)
{	
    

    echo '
    
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
    <div class="container">
    <h1>Liste des devoirs</h1>
    <table>
      <thead>
        <tr>
          <th>Matière</th>
          <th>Devoir</th>
          <th>A faire pour le:</th>
          <th>Donné le :</th>
        </tr>
      </thead>
      <tbody>
        <!-- Renseignez les champs de requêtes SQL ici -->
        <tr>
          <td>Mathématiques</td>
          <td>Résoudre des équations</td>
          <td>2023-02-15</td>
          <td>2023-02-15</td>
        </tr>
        <tr>
          <td>Histoire</td>
          <td>Rédiger un exposé sur la Révolution française</td>
          <td>2023-03-01</td>
          <td>2023-03-01</td>
        </tr>
        <tr>
          <td>Anglais</td>
          <td>Lire et résumér un texte en anglais</td>
          <td>2023-02-28</td>
          <td>2023-02-28</td>
        </tr>
      </tbody>
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
              <div class="profile"><img src="'.$img_grade.'" alt="Grade Image" />
                <div class="dropdown">
                  <p>Mon compte</p>
                    <div class="dropdown-content">
                    <p><button>Paramètres du compte</button></p>
                    <p><button id="toggleDarkMode"><span class="toggle__icon"></span>Paramètres de couleur</button></p>
                    <p>Vous etes connecté en tant que <strong>'.$grade.'</strong> </p>
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

              </script>';
                }
            } else {
            echo "0 results";
            }
}




//---------------------------------------------------------------------------------------------------------------------------------//




function settings()
{
    $link = "https://www.example.com";
    header("Location: $link");
    exit;
}

function infos()
{
    $link = "https://www.example.com";
    header("Location: $link");
    exit;
}

//fonctions a faire



//---------------------------------------------------------------------------------------------------------------------------------//





function panel($username, $conn)
{

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
    
      '.image_grade($username, $conn).'

    </div>
    <div class="container">
      <h1>Ajout de devoirs</h1>
      <form action="submit.php" method="post">
        <label for="subject">Matière :</label>
        <select id="subject" name="subject">
          <option value="maths">Mathématiques</option>
          <option value="history">Physique-appliquée</option>
          <option value="english">Anglais</option>
          <option value="maths">Mathématiques</option>
          <option value="history">Informatique & réseaux</option>
          <option value="english">Culture générale</option>
        </select>
        <label for="task">Devoir :</label>
        <input type="text" id="task" name="task">
        <label for="due_date">A faire pour le:</label>
        <input type="date" id="due_date" name="due_date">
        <label for="due_date">Donné le :</label>
        <input type="date" id="due_date" name="dur_date">
        <input type="submit" value="Envoyer">
      </form>
    </div>
  </body>
</html>
    
    ';
}

?>