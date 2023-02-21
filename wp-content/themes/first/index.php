<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/style.css"> <!-- cette fontion remplace le chemin vers le dossier des templates  (http://localhost/demo/wp-content/themes/first)-->
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>> <!-- permet de gerer automatiquement une class en fonction de la page actuellement affichée-->
    <header class="bg-primary">
        <nav class="navbar navbar-expand container navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="nav-link">Accueil</a></li>

            </ul>
        </nav>
    </header>  
    <main class="container">
        <div class="row mt-4">
        <?php $i = 0?>
        <?php while (have_posts()) : ?>
    <?php the_post();?>
    <article class="col-4">
                    <div class="card card-<?= $i ?>">
                        <h2 class="card-header">
                            <?php echo $post->post_title ?>
                        </h2>
                        <!-- thumbnail-->
                        <?php echo the_post_thumbnail("large",["class" => "img-fluid"]) ?>
                        <div class="card-body">
                            <?php the_excerpt() // pour pouvoir afficher l'extrait que j'ai saisit dans "extrait"?> 
                        </div>
                        <div>
                            <?= the_date() ?>
                        </div>
                        <?php edit_post_link("modifier") ?>
                    </div>
                </article>
                <?php $i++ ?>
    <!-- <?php var_dump($post) // $post est crée grace a la fonction "the_post()" ?>  -->
    <!-- <?php var_dump($post -> post_title) ?>  -->
    <!-- <?php var_dump($post -> post_author) ?>  -->
    <?php endwhile ?>
        </div>
    </main>




    <?php wp_footer() ?>  
</body>
</html>