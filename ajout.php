<?php

include('functions.php');


  if (isset($_POST['envoiForm'])) {
    // Récupérer les valeurs du formulaire
    $subject = $_POST['subject'];
    $title = $_POST['title'];
    $task = $_POST['task'];
    $due_date = $_POST['due_date'];
    $dur_date = $_POST['dur_date'];

    // Préparer une requête SQL d'insertion
    $sql = "INSERT INTO `devoirs`(`titre`, `dateEmission`, `dateRendu`, `contenu`, `Matiere`) VALUES ('$title','$due_date','$dur_date','$task','$subject')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':titre', $title);
    $stmt->bindParam(':dateEmission', $due_date);
    $stmt->bindParam(':dateRendu', $dur_date);
    $stmt->bindParam(':contenu', $task);
    $stmt->bindParam(':Matiere', $subject);
    $stmt->execute();
  }


  ?>
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
                  
                    ' <?php image_grade($username, $conn); ?> '

            

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
                        <label for="due_date">Donné le :</label>
                      <input type="date" id="due_date" name="dur_date">

                      <input type="submit" name="envoiForm" value="Confirmer">
                    </form>
                  </div>
                </body>
              </html>
              <?php
            
    

?>