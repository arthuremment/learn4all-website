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

function verifyPassword($var){
    if (strlen($var) < 8){ //Verifier la  longueur du mot de passe
        return "Le mot de passe est trop court";
    }
    /*if (!preg_match('/[A-Z]/', $var) || !preg_match('/[a-z]/', $var)){
        return "Le mot de passe doit contenir au moins une lettre majuscule et une lettre minuscule";
    }
    if(!preg_match('/[0-9]/', $var)){
        return "Le mot de passe doit contenir au moins un chiffre";
    }
    if (!preg_match('/[^A-Za-z0-9]/', $var)){
        return "Le mot de passe doit contenir au moins un caractére spécial";
    }*/

    return true;
}

//Récupération des informations envoyées par le formulaire
if (!empty($_POST)) {
    $username = verifyInput($_POST["name"]);
    $email = verifyInput($_POST["email"]);
    $password = verifyInput($_POST["password"]);

    if (isEmail($email)) {

        if (verifyPassword($password) === TRUE){
            
            //hashage du mot de passe $password = md5($password);

            //Vérifions si l'utilisateur est deja inscris ou non
            $sql = "SELECT COUNT(*) as count FROM inscription WHERE email='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $count = $row["count"];
                if ($count > 0) {
                    echo "<script>alert('Vous êtes déja inscris');</script>";
                    header("Location:../pages/connexion.html");
                } else {
                    //Insertion des informations dans la BD
                    $sql = "INSERT INTO inscription (username,email,password) VALUES ('$username','$email','$password')";

                    if ($conn->query($sql) === TRUE) {
                        header("Location:../pages/connexion.html");
                        exit;
                    } else {
                        echo "Erreur: " . $sql . "<br>" . $conn->error;
                    }
                }
            }

        } else {
        echo "<script>alert('Veuillez à bien remplir les champs');</script>";       
        }
    }
}

//Fermeture de la connexion à la BD
$conn->close();


?>