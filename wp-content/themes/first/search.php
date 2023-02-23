<?php get_header() ?>

<main class="container">
    <h1>Résultat de votre recherche :</h1>
    <p>Pour le mot : <strong><?= get_search_query() ?></strong>, il y a <?= $wp_query->found_posts ?> résultat(s)</p>
    <ol>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?= the_post() ?>
                <li class="">
                    <h2 class="mb-4"><?= the_title() ?></h2>

                    <?= the_excerpt() ?>
                    <a href="<?= the_permalink() ?>">Lire la suite</a>
                </li>
                <br>
                <hr>
            <?php endwhile ?>
        <?php else : ?>

            <p>Mais voici des articles qui pourraient vous interresser :</p>
            <div style="list-style:none">
                <?php dynamic_sidebar("search") ?>
            </div>

        <?php endif ?>


    </ol>
</main>

<?php get_footer() ?>