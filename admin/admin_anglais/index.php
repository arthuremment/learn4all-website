<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Cours d'Anglais</title>

    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <header class="logo">
        <a href="../../index.html"><img src="/images/logo1.jpg" alt="logo"></a>
    </header>

    <main>
        <div class="header">
            <h1>Liste des Chapitres</h1>
            <button><a href="insert.php"> + Ajouter</a></button>
        </div>

        <?php

    echo '<table>

            <thead>
                <tr>
                    <th>Chapitre</th>
                    <th>Description</th>
                    <th>Contenu</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>';

             
                    require 'database.php';
                    $db = Database::connect();
                    $statement = $db->query('SELECT * FROM anglais');

                    while($chapitre = $statement->fetch()){

                       echo '<tr>';
                       echo '<td>' . $chapitre['chapitre'] . '</td>';
                       echo '<td class="light">' . $chapitre['description']. '</td>';
                       echo '<td>'. $chapitre['contenu'] . '</td>';
                       echo '<td width="200">';
                            echo '<button class="modifier"><a href="update.php?id=' . $chapitre['id'] . '"> Modifier</a></button>';
                            echo '  ';
                            echo '<button class="supprimer"><a href="delete.php?id=' . $chapitre['id'] . '"> Supprimer</a></button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                
               

                    echo ' </tbody>
            </table>';

        ?>
    </main>

</body>

</html>