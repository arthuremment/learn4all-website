<?php 
    
    //Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "learn4all_database";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connnection failed: " . $conn->connect_error);
    }


    //Vérifie si l'utilisateur est déja connecté
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === TRUE){
        header("Location:/pages/programmes.html");
        exit;
    }

    //Vérifie si le formulaire de connexion a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = verifyInput($_POST["email"]);
        $password = verifyInput($_POST["password"]);

        //Connexion à l'admin
        if ($email == "admin@admin" & $password == "admin") {
            header("Location:/admin/");
            exit;
        } else {
            
            $sql = "SELECT email,password FROM inscription WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($sql);

            //Vérification du resultat de la requete
            if ($result->num_rows == 1) {
               // $sql = "SELECT password FROM inscription WHERE password = '$password'";
                //$result = $conn->query($sql);

                //if (password_verify($password, $result)){

                    //Démarrage de la session
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;

                    header("Location:/pages/programmes.html");
                    exit;
                } else {
                    //Informations invalides
                    echo "Email ou mot de passe incorrect";
                }
                
            //} else {
                //Informations invalides
                //echo "Email ou mot de passe incorrect";
           // }
        }
    }

    
    function verifyInput($var){ //sécurité du formulaire
        $var = trim($var); //enlever les espaces,tabs,retour à la ligne
        $var = stripslashes($var);  //enlever tous les anti-slashs
        $var = htmlspecialchars($var);
        return $var;
    }
    function isEmail($var){ 
        //validation de l'email
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }
    
    $conn->close();
?>