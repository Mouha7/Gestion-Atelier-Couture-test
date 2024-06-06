<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=WEBROOT?>css/style.css">
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
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active color-honeydew" href="<?=WEBROOT?>?controller=article&action=liste">Lister</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-honeydew" href="<?=WEBROOT?>?controller=categorie&action=liste">Catégorie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-honeydew" href="<?=WEBROOT?>?controller=type&action=liste">Type</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-honeydew" href="#">Approvisionnement</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-honeydew" href="#">Paramètres</a>
                        </li>
                    </ul>
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
</body>

</html>