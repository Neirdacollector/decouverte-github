<?php get_header() ?>

<main class="container mt-3">
    <div class="row">
        <?php while (have_posts()) : ?>
            <?php the_post() ?>
            <div class>
                <h1><?php the_title() ?></h1>
                <hr>
            </div>
            <div>
                <?php the_content() ?>
            </div>

        <?php endwhile ?>
    </div>

</main>

<?php get_footer() ?>