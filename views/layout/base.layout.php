<?php
use Macbook\Core\Session;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= WEBROOT ?>images/Royal Tailor - Favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= WEBROOT ?>css/style.css">
    <link rel="stylesheet" href="<?= WEBROOT ?>css/output.css">
    <title>Gestion Atelier Couture</title>
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Menu à gauche -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar background-color-indigo">
                <div class="sidebar-sticky d-flex flex-column justify-content-between g-5" style="height: 95vh;">
                    <div>
                        <img src="<?= WEBROOT ?>images/Royal Tailor - White.png" alt="Royal Tailor" style="width: 100%">
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active color-honeydew" href="<?= WEBROOT ?>?controller=article&action=liste">Lister</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-honeydew" href="<?= WEBROOT ?>?controller=categorie&action=liste">Catégorie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-honeydew" href="<?= WEBROOT ?>?controller=type&action=liste">Type</a>
                        </li>
                        <li class="nav-item <?=add_class_hidden_lien('Admin')?>">
                            <a class="nav-link color-honeydew " href="#">Approvisionnement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-honeydew" href="#">Paramètres</a>
                        </li>
                    </ul>
                    <div>
                        <a class="nav-link color-honeydew" href="<?= WEBROOT ?>?controller=security&action=logout">Déconnexion</a>
                        <div class="profile d-flex align-items-center g-5 w-full pl-3 nav-link">
                            <img src="<?= WEBROOT ?>images/default.png" alt="Default profile" style="width: 20%; border-radius: 50%;">
                            <p class="color-honeydew mb-0 ml-2"><?= Session::get("userConnect")["nomUser"];?></p>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Contenu principal -->
            <main class="col-md-9 col-lg-10 ml-sm-auto px-md-4 background-color-honeydew color-indigo">
                <?=
                $content_view
                ?>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vc733d5f01de84e3792a4035cd15c58a81717452547180" integrity="sha512-fqEn6JCqkzgyQXZxQOxB9z6GyWybXdsYNuqu0tW/ATUi0uJMKhFfYpk0taNyC90JiX4HZUqEp6nnOyL7/ZvjCA==" data-cf-beacon='{"rayId":"88f9aa8fab58f168","version":"2024.4.1","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>