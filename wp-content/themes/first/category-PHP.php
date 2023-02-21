<?php get_header() ?>

<main class="container mt-3">
    <div class="row">
        <aside class="col-3">
            <h2>Filtrer les résultats</h2>
        </aside>
        <div class="col">
            <div class="row">
                <?php while (have_posts()) : ?>
                    <?php the_post() ?>
                    <div class="col-6">
                        <?php the_post_thumbnail("large", ["class" => "img-fluid"]) ?>
                    </div>
                    <div>
                        <?php the_excerpt() ?>
                    </div>

                <?php endwhile ?>
            </div>

        </div>
    </div>
</main>

<?php get_footer() ?>