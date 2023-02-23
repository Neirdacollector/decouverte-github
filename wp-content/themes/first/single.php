<?php get_header() ?>

<main class="container mt-3">
    <div class="row">
        <?php while (have_posts()) : ?>
            <?php the_post() ?>
            <div class>
                <header class="d-flex justify-content-between">
                    <h1><?php the_title() ?></h1>
                    <p>Publié le <?php the_date() ?>
                    </p>
                </header>
                <hr>
                <?php the_post_thumbnail("large", ["class" => "img-fluid"]) ?>
                <hr>
            </div>
            <div>
                <?php the_content() ?>
                <hr>
            </div>
            <div>
                <p>Auteur : <?php the_author() ?></p>
                <p><?= categorie_badge(get_the_ID()) ?></p>
                <hr>
            </div>
            <div class="d-flex justify-content-between">
                <span class="btn btn-dark">
                    <?php previous_post_link() ?>
                </span>
                <span class="btn btn-dark">
                    <?php next_post_link() ?>
                </span>

                <hr>
            </div>

            <hr>
            <?php comment_form() ?>
            <hr>

            <?php $commentaires = get_comments(["post_id" => get_the_ID()]); ?>

            <?php if (count($commentaires) === 0) : ?>
                <p>Aucun commentaire ici pour le moments, soyez le 1er a réagir !</p>
            <?php else : ?>
                <ul class="list-group">
                    <?php foreach ($commentaires as $commentaire) : ?>

                        <li class="list-group-item">

                            <?= $commentaire->comment_author; ?><br>
                            <?= $commentaire->comment_content; ?><br>
                            <?= (new DateTime($commentaire->comment_date))->format("d/m/Y H:i:s"); ?></li>

                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        <?php endwhile ?>
    </div>

</main>

<?php get_footer() ?>