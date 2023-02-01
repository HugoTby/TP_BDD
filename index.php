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
    $host = "localhost";                              // Adresse IP //
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

            
            parent($username, $conn);

        } else {
            echo "Votre rôle n'est pas reconnu.
            
            <form action='index.php' method='post'>
            <input type='submit' name='retour' value='Retour'>
            </form>
            ";
            //formulaire();
        }
    } else {
        // Affichage d'un message d'erreur si les informations de connexion sont incorrectes
        //formulaire();
        echo 'erreur
        
        <form action="index.php" method="post">
        <input type="submit" name="retour" value="Retour">
        </form>
        ';
        
        
        
    }

} elseif(isset($_POST['logout'])) {
    // Détruit la session en cours lorsque l'utilisateur clique sur le bouton de déconnexion
    session_destroy();
    echo '<body bgcolor="grey">
    Vous avez été déconnecté.
    <form action="index.php" method="post">
    <input type="submit" name="retour" value="Retour">
    </form>
    </body>';
    
} else {
    formulaire();
}
?>


    </body>
</html>