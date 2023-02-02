<html>
    <head>
    <!--<link rel="stylesheet" href="assets/css/style_admin.css" />-->
    </head>
    <body>

    <?php


include('functions.php');
session_start();

if(isset($_POST['submit'])) {

                // Connexion à la base de données //
    //////////////////////////////////////////////////////////////////
    $host = "192.168.65.92";                          // Adresse IP //
    $username = "root";                               // Username   //
    $password = "root";                               // Password   //
    $dbname = "td_bdd";                               // Nom base   //
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
        
        // Affichage du texte en fonction du rôle de l'utilisateur
        if($role == "Professeur") {

            panel($username, $conn);

        } elseif($role == "Élève") {
            
            eleve($username, $conn);

        } elseif($role == "Parent") {

            
            //eleve($username, $conn);

            eleve($username, $conn);

        } else {
            
            formulaire($messageERR = 2);
        }
    } else {
        // Affichage d'un message d'erreur si les informations de connexion sont incorrectes
        formulaire($messageERR = 1);
        
        
        
        
    }

} elseif(isset($_POST['logout'])) {
    // Détruit la session en cours lorsque l'utilisateur clique sur le bouton de déconnexion
    session_destroy();
    echo '<body bgcolor="grey">
    <div style="display: table; height: 100vh; width: 100%;">
      <div style="display: table-cell; vertical-align: middle; text-align: center;">
        <div style="display: inline-block;">Vous avez été déconnecté.</div>
        <form action="index.php" method="post" style="display: inline-block;">
          <input type="submit" name="retour" value="Retour" style="margin-left: 10px;">
        </form>
      </div>
    </div>
  </body>
  
  
  ';
    
} else {
    formulaire($messageERR = 0);
}
?>


    </body>
</html>