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
    $host =                "localhost";               // Adresse IP //
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
        
        header('Location: index2.php');


    } else {
        // Affichage d'un message d'erreur si les informations de connexion sont incorrectes
        formulaire($messageERR = 1);
        
        
        
        
    }

} 




else {
    formulaire($messageERR = 0);

}




?>


    </body>
</html>
