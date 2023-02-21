<?php get_header() ?>

<main class="container mt-3">
    <div class="row">
        <aside class="col-3">
            <h2>Filtrer les résultats</h2>
            <form>
                <select name="order" class="form-select">
                    <option value="">Choisir Ordre</option>
                    <option value="ASC">Titre Croissant</option>
                    <option value="DESC">Titre Décroissant</option>
                </select>
                <input type="submit" class="btn btn-danger mt-3 btn-sm" value="Trier">
            </form>
            <?php $query = get_article_filtered("HTML"); ?>
            <form>
                <select name="date_order" class="form-select mt-3">
                    <option value="">Choisir Ordre Date</option>
                    <option value="DASC">Date Croissant</option>
                    <option value="DDESC">Date Décroissant</option>
                </select>
                <input type="submit" class="btn btn-danger mt-3 btn-sm" value="Trier">
            </form>
            <?php $query = get_article_filtered_by_date("React"); ?>
        </aside>
        <div class="col">
            <div class="row">
                <?php while ($query->have_posts()) : ?>
                    <?php $query->the_post() ?>
                    <div class="col-6">
                        <h2><?php the_title() ?></h2>
                        <p><?php the_date() ?></p>
                        <p><?php the_author() ?></p>
                        <?php the_post_thumbnail("large", ["class" => "img-fluid"]) ?>

                        <div>
                            <?php the_excerpt() ?>
                        </div>
                        <?php the_category() ?>
                    </div>
                    <?php wp_reset_postdata(); // permet de libérer la memoir si on a besoin de faire une requête wp_query supplementaire après 
                    ?>
                <?php endwhile ?>
            </div>

        </div>
    </div>
</main>

<?php get_footer() ?>