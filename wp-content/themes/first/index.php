<?php get_header() //similaire a un "include"?>

<main class="container">
    <div class="row mt-4">
        <?php $i = 0 ?>
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <article class="col-4">
                <div class="card card-<?= $i ?>">
                    <h2 class="card-header">
                        <?php echo $post->post_title ?>
                    </h2>
                    <!-- thumbnail-->
                    <?php echo the_post_thumbnail("large", ["class" => "img-fluid"]) ?>
                    <div class="card-body">
                        <?php the_excerpt() // pour pouvoir afficher l'extrait que j'ai saisit dans "extrait"
                        ?>
                    </div>
                    <div>
                        <?= the_date() ?>
                    </div>
                    <?php edit_post_link("modifier") ?>
                </div>
            </article>
            <?php $i++ ?>
            <!-- <?php var_dump($post) // $post est crée grace a la fonction "the_post()" 
                    ?>  -->
            <!-- <?php var_dump($post->post_title) ?>  -->
            <!-- <?php var_dump($post->post_author) ?>  -->
        <?php endwhile ?>
    </div>
</main>

<?php get_footer() ?>