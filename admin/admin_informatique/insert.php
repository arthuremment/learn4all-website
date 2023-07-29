<?php

require 'database.php';

$chapitre = $description = $contenu = "";

if (!empty($_POST)) {
    $chapitre = $_POST['chapitre'];
    $description = $_POST['description'];
    $contenu = $_POST['contenu'];
    $isSuccess = true;

    if (empty($chapitre)) {
        $isSuccess = false;
    }
    if ($description = "") {
        $isSuccess = false;
    }
    if (empty($contenu)) {
        $isSuccess = false;
    }

    if ($isSuccess = true) {
        $chapitre = nl2br($chapitre);
        $description = nl2br($description);
        $contenu = nl2br($contenu);
        
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO informatique (chapitre,description,contenu) VALUES (?,?,?)");
        $statement->execute(array($chapitre, $description, $contenu));
        Database::disconnect();
        header("Location: index.php");
    } else {
        echo "Veillez à remplir tous les champs";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un chapitre</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <header class="logo">
    <a href="../../index.html"><img src="/images/logo1.jpg" alt="logo"></a>
    </header>

    <main class="insert">
        <div class="header">
            <h1>Ajouter un Chapitre</h1>
        </div>

        <form action="insert.php" method="post" role="form">
            <div>
                <label>Nom du chapitre:</label>
                <input type="text" id="chapitre" name="chapitre" placeholder="Nom du chapitre" required
                    value="<?php echo $chapitre; ?>">
            </div>
            <div>
                <label>Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"
                    required> <?php echo $description; ?> </textarea>
            </div>
            <div>
                <label>Contenu:</label>
                <textarea name="contenu" id="contenu" cols="30" rows="70" placeholder="Contenu"
                    required> <?php echo $contenu; ?> </textarea>
            </div>

                <button class="retour"><a href="index.php">
                        < Retour</a></button>
                <button type="submit" class="ajouter"> + Ajouter</button>

        </form>
    </main>

</body>

</html>