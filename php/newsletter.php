<?php

//Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learn4all_database";
$conn = new mysqli($servername, $username, $password, $dbname);

//Vérification de la connexion
if ($conn->connect_error) {
    die("Connnection failed: " . $conn->connect_error);
}

function isEmail($var)
{ //validation de l'email
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

function verifyInput($var)
{ //sécurité du formulaire
    $var = trim($var); //enlever les espaces,tabs,retour à la ligne
    $var = stripslashes($var); //enlever tous les anti-slashs
    $var = htmlspecialchars($var);
    $var != "";
    return $var;
}

//Récupération de l'e-mail envoyé par le formulaire
if (!empty($_POST)) {
    $email = verifyInput($_POST["email"]);

    if (isEmail($email)) {

        //Insertion de l'e-mail dans la BD
        $sql = "INSERT INTO newsletter_members (email) VALUES ('$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Super, vous etes désormais inscris à notre newsletter !";
            $email = "";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
        
    } else {
        echo "Entrez votre e-mail !";
    }
}

//Fermeture de la connexion à la BD
$conn->close();


?>