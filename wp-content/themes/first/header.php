<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css?v=1"> <!-- cette fontion remplace le chemin vers le dossier des templates  (http://localhost/demo/wp-content/themes/first)-->
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>> <!-- permet de gerer automatiquement une class en fonction de la page actuellement affichée-->
    <header class="bg-danger">
        <nav class="navbar navbar-expand container navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item mt-2">
                    <a class="link" href="<?= get_option("home") ?>">Accueil</a>
                </li>
                <li class="nav-item dropdown"><!-- Permet d'afficher la fleche a coté du mot-->
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="<?= get_page_url("newsletter") ?>">Exemple 1</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_page_url("exemple 2") ?>">Exemple 2</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_page_url("condition générale") ?>">Conditions Générales</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_page_url("contact") ?>">Contact</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Catégories</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <a href="<?= get_category_url("HTML") ?>">HTML</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_category_url("Javascript") ?>">Javascript</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_category_url("PHP") ?>">PHP</a>
                        </li>
                        <li class="dropdown-item">
                            <a href="<?= get_category_url("React") ?>">React</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mt-2">
                    <a class="link" href="<?= get_page_url("contact") ?>">Contact</a>
                </li>
            </ul>
        </nav>
    </header>