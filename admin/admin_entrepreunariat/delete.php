<?php

require 'database.php';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

if (!empty($_POST)) {
    $id = $_POST['id'];

    $db = Database::connect();
    $statement = $db->prepare("DELETE FROM entrepreunariat WHERE id = ?");
    $statement->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un chapitre</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <header class="logo">
    <a href="../../index.html"><img src="/images/logo1.jpg" alt="logo"></a>
    </header>

    <main class="insert">
        <div class="header">
            <h1>Supprimer ce Chapitre</h1>
        </div>

        <form action="delete.php" method="post" role="form">

            <input type="hidden" name="id" value=" <?php echo $id; ?>">
            <p class="alerte">Etes-vous sûr de vouloir supprimer ?</p>


            <button class="ajouter"><a href="index.php">
                    < NON</a></button>
            <button type="submit" class="retour" style="color: white;">OUI</button>

        </form>
    </main>

</body>

</html>