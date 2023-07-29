<?php   
    $array = array("nom" => "", "email" => "","tel" => "","message" => "", "isSuccess" => false);
    $emailTo = "learn4all@gmail.com";


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $array["nom"] = verifyInput($_POST["nom"]);
      $array["email"] = verifyInput($_POST["email"]);
      $array["tel"] = verifyInput($_POST["tel"]);
      $array["message"] = verifyInput($_POST["message"]);
      $array["isSuccess"] = true;
      $emailText = "";

      // if (empty($array["nom"])) $array["isSuccess"] = false; else $emailText .= "nom: $array["nom"]\n";
      // if (empty($array["message"])) $array["isSuccess"] = false; else $emailText .= "message: $array["message"]\n";
      // if (!isEmail($array["email"])) $array["isSuccess"] = false; else $emailText .= "email: $array["email"]\n";
      // if (!isPhone($array["tel"])) $array["isSuccess"] = false; else $emailText .= "telephone: $array["tel"]\n";
      // if ($array["isSuccess"]){ //envoi du mail
      //   $headers = "From: $array["nom"] <$array["email"]>\r\nReply-To: $array["email"]";
      //   mail($emailTo, "Un message de votre site", $emailText, $headers);
      //   // $array["nom"] = $array["email"] = $array["tel"] = $array["message"] = "";
      // }

      if ($array["nom"]) {
        $array["isSuccess"] = true;
        $emailText .= "nom: {$array["nom"]}\n";
      }
      if ($array["message"]){
        $array["isSuccess"] = true; 
        $emailText .= "message: {$array["message"]}\n";
      }
      if (isEmail($array["email"])){
        $array["isSuccess"] = true;
        $emailText .= "email: {$array["email"]}\n";
      }
      if (isPhone($array["tel"])){
        $array["isSuccess"] = true;
        $emailText .= "telephone: {$array["tel"]}\n";
      }
      if ($array["isSuccess"]){ //envoi du mail
        $headers = "From: {$array["nom"]} <{$array["email"]}>\r\nReply-To: {$array["email"]}";
        mail($emailTo, "Un message de votre site", $emailText, $headers);
        $array["nom"] = $array["email"] = $array["tel"] = $array["message"] = "";
      }

      echo json_encode($array);
    }

    function isPhone($var){ //validation du tel
    //   return preg_match("/^[0-9 ]*$/", $var);
    }

    function isEmail($var){ //validation de l'email
      return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var){ //sécurité du formulaire
      $var = trim($var); //enlever les espaces,tabs,retour à la ligne
      $var = stripslashes($var);  //enlever tous les anti-slashs
      $var = htmlspecialchars($var);
      return $var;
    }

?>