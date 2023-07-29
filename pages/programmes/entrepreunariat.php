<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cours d'Entrepreunariat</title>

    <link rel="website icon" type="jpg" href="/images/logo1.jpg">

    <link rel="stylesheet" href="/css/anglais.css">

    <script src="/js/anglais.js" defer></script>
</head>

<body>

    <header>
        <nav>
            <div class="navbar">
                <ul>
                    <li><a href="../../index.html">Accueil</a></li>
                    <li><a href="/pages/programmes.html">Programmes</a></li>
                </ul>
            </div>

            <div class="logo">
                <a href="../../index.html"><img src="/images/logo3.jpg" alt=""></a>
            </div>

            <div class="navbar">
                <ul>
                    <li><a href="/pages/en_savoir_plus.html">HELP</a></li>
                    <button><a href="/pages/connexion.html">Connexion</a></button>
                </ul>
            </div>

            <div class="toggleMenu" onclick="toggleMenu();"></div>
        </nav>
    </header>

    <main>
        <?php
        require '../../admin/admin_entrepreunariat/database.php';

        echo '<aside>
                        <div class="liste">
                        <ul class="tab-list">';
        $db = Database::connect();
        $statement = $db->query('SELECT * FROM entrepreunariat');
        $chapitres = $statement->fetchAll();
        foreach ($chapitres as $chapitre) {
            if ($chapitre['id'] == 1)
                echo '<li data-tab="tab' . $chapitre['id'] . '" class="active">' . $chapitre['chapitre'] . '</li>';
            else
                echo '<li data-tab="tab' . $chapitre['id'] . '">' . $chapitre['chapitre'] . '</li>';
        }
        echo '</ul> 
                    </div>
                </aside>

              <section>
                    <h1 class="titre"> Cours d\'entrepreunariat </h1>';

        foreach ($chapitres as $chapitre) {
            if ($chapitre['id'] == 1) {
                echo '<div data-tab="tab' . $chapitre['id'] . '" class="container active">';
            } else {
                echo '<div data-tab="tab' . $chapitre['id'] . '" class="container">';
            }

            $statement = $db->prepare('SELECT * FROM entrepreunariat WHERE id = ?');
            $statement->execute(array($chapitre['id']));

            while ($cours = $statement->fetch()) {
                echo '<div class="header">
                                        <h1>' . $cours['chapitre'] . '</h1>
                                        <h5>' . $cours['description'] . '</h5>
                                      </div>
                                      <div class="contenu">
                                        <p>' . $cours['contenu'] . '</p>
                                      </div>
                                    </div>';
            }
            echo '</div>';
        }
        echo '</section>';

        Database::disconnect();
        ?>
    </main>

    <!-- footer section -->
    <section class="footer_section">
        <p>
            Copyright &copy; 2023 All Rights Reserved By
            <a href="">LEARN4ALL</a>
        </p>
    </section>
    <!-- footer section -->

</body>

</html>