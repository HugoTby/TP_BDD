<?php

function formulaire()
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
    .container {
  width: 50%;
  margin: 0 auto;
  text-align: left;
  padding: 30px;
  border: 1px solid lightgray;
  box-sizing: border-box;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 10px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
  border: 1px solid lightgray;
  font-size: 16px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: lightblue;
  color: white;
  border: none;
  cursor: pointer;
}

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
    </div>
  </body>
</html>
';

}




//---------------------------------------------------------------------------------------------------------------------------------//





function eleve()
{	
    echo "test de la fonction eleve";
    echo '<form action="" method="post">';
    echo '<input type="submit" name="logout" value="Déconnexion">';
    echo '</form>';

}

function parent()
{	
    echo "test de la fonction parent";
    echo '<form action="" method="post">';
    echo '<input type="submit" name="logout" value="Déconnexion">';
    echo '</form>';

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
            echo "<div class='profile'><img src='".$img_grade."' alt='Grade Image' />";
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
    .container {
      width: 50%;
      margin: 0 auto;
      text-align: left;
      padding: 30px;
      border: 1px solid lightgray;
      box-sizing: border-box;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"],
    select,
    input[type="date"] {
      padding: 10px;
      font-size: 16px;
      width: 100%;
      box-sizing: border-box;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      padding: 10px 20px;
      font-size: 16px;
      background-color: lightblue;
      border: none;
      color: white;
      cursor: pointer;
    }

    .profile {
      position: absolute;
      top: 10px;
      left: 10px;
      display: flex;
      align-items: center;
    }

    .profile img {
      width: 50px;
      height: 50px;
      border-radius: 25px;
      margin-right: 10px;
    }

    .profile .dropdown {
      position: relative;
      display: inline-block;
    }

    .profile .dropdown .dropdown-content {
      display: none;
      position: absolute;
      top: calc(100% + 0px);
      left: 0;
      background-color: white;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      min-width: 150px;
    }

    .profile .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
  <body>
    
      '.image_grade($username, $conn).'
      <div class="dropdown">
        <p>Mon compte</p>
        <div class="dropdown-content">
          <p><a href="https://www.google.com/">Paramètres du compte</a></p>
          <p><a href="https://www.google.com/">Paramètres de couleur</a></p>
          <p>Vous etes connecté en tant que </p>
          <p><form action="" method="post"><input type="submit" name="logout" value="Déconnexion"></form></p>
        </div>
      </div>
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